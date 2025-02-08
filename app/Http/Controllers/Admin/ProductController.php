<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected $defaultLanguage = 'fr';
    
    public function bord()
    {
        $products = Product::with(['category', 'translations'])->get();
        return view('AdminSide.index', compact('products')); 
    }

    
    public function index()
    {
        // Start the query and apply pagination
        $products = Product::with(['translations', 'category.translations', 'discounts'])
            ->latest()
            ->paginate(10);
    
        // After pagination, apply transformation to the paginated collection
        $products->getCollection()->transform(function ($product) {
            $product->calculateDiscountedPrice();
            return $product;
        });
    
        // Fetch language code and categories
        $languageCode = app()->getLocale();
        $categories = Category::with('translations')->get();
    
        // Return the view with paginated products
        return view('AdminSide.products', compact('products', 'languageCode', 'categories'));
    }
    
    
    

    public function filter(Request $request)
    {
        $query = Product::with(['category', 'translations']);

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('name')) {
            $query->whereHas('translations', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->name . '%')
                  ->where('language_code', $request->get('language_code', $this->defaultLanguage));
            });
        }

        if ($request->filled('sort_by')) {
            $this->applySorting($query, $request->sort_by);
        }

        $products = $query->paginate(10);
        return view('AdminSide.index', compact('products'));
    }

    public function getByLanguage($languageCode = null)
    {
        $languageCode = $languageCode ?? $this->defaultLanguage;

        $products = Product::whereHas('translations', function ($query) use ($languageCode) {
            $query->where('language_code', $languageCode);
        })
        ->with(['translations' => function ($query) use ($languageCode) {
            $query->where('language_code', $languageCode);
        }])
        ->paginate(10);

        return view('AdminSide.products', compact('products', 'languageCode'));
    }

    public function create()
    {
        $categories = Category::with('translations')->get();
        return view('AdminSide.add-product', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $validatedData = $request->validated();
        
        if ($request->hasFile('image_url')) {
            $validatedData['image_url'] = $this->handleImageUpload($request->file('image_url'));
        }

        $product = Product::create([
            'slug' => $validatedData['slug'],
            'base_price' => $validatedData['base_price'],
            'stock' => $validatedData['stock'],
            'category_id' => $validatedData['category_id'],
            'image_url' => $validatedData['image_url'] ?? null,
        ]);

        //add v.1 calculate initial discount 
        $product->calculateDiscountedPrice();
        $product->save();
        $this->handleTranslations($product, $validatedData['translations'] ?? []);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully!');
    }

    public function show(Product $product)
    {
        return view('HomeStore.showproduct', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::with('translations')->get();
        return view('AdminSide.edit-product', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $validatedData = $request->validated();
    
        // Update main product data
        $product->update([
            'slug' => $validatedData['slug'],
            'base_price' => $validatedData['base_price'],
            'stock' => $validatedData['stock'],
            'category_id' => $validatedData['category_id'],
        ]);
    
        //v.1 Recalculate discounted price
        $product->calculateDiscountedPrice();
        $product->save();

        // Handle image if present
        if ($request->hasFile('image_url')) {
            $this->deleteExistingImage($product);
            $product->update([
                'image_url' => $this->handleImageUpload($request->file('image_url'))
            ]);
        }
    
        // v.2 Update translations
        foreach (['en', 'fr', 'es'] as $langCode) {
            if (isset($validatedData['translations'][$langCode])) {
                $translation = $product->translations()
                    ->where('language_code', $langCode)
                    ->first();
    
                $translationData = [
                    'name' => $validatedData['translations'][$langCode]['name'],
                    'description' => $validatedData['translations'][$langCode]['description'],
                    'language_code' => $langCode
                ];
    
                if ($translation) {
                    $translation->update($translationData);
                } else {
                    $product->translations()->create($translationData);
                }
            }
        }
    
        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        $this->deleteExistingImage($product);
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
    }

    public function destroyTranslation(Product $product, $languageCode)
    {
        $translation = $product->translations()
            ->where('language_code', $languageCode)
            ->first();

        if ($translation) {
            $translation->delete();
            return back()->with('success', 'Translation deleted successfully!');
        }

        return back()->with('error', 'Translation not found!');
    }

    // Private helper methods
  // 2. Update ProductController upload method
public function handleImageUpload($image)
{
    try {
        if (!$image->isValid()) {
            throw new \Exception('Invalid image file');
        }

        // Ensure the directory exists
        $path = 'products/' . date('Y/m');
        if (!Storage::disk('public')->exists($path)) {
            Storage::disk('public')->makeDirectory($path);
        }

        // Store with original filename
        $filename = $image->getClientOriginalName();
        $safeName = time() . '_' . preg_replace('/[^A-Za-z0-9\-\.]/', '', $filename);
        $fullPath = $image->storeAs($path, $safeName, 'public');

        if (!$fullPath) {
            throw new \Exception('Failed to store image');
        }

        return $fullPath;
    } catch (\Exception $e) {
        \Log::error('Image upload failed: ' . $e->getMessage());
        throw $e;
    }
}

    private function deleteExistingImage(Product $product)
    {
        if ($product->image_url) {
            Storage::disk('public')->delete($product->image_url);
        }
    }

    private function handleTranslations(Product $product, array $translations)
    {
        foreach (['en', 'fr', 'es'] as $langCode) {
            if (isset($translations[$langCode])) {
                $translation = $product->translations()
                    ->where('language_code', $langCode)
                    ->first();

                $translationData = [
                    'name' => $translations[$langCode]['name'],
                    'description' => $translations[$langCode]['description'],
                    'language_code' => $langCode
                ];

                if ($translation) {
                    $translation->update($translationData);
                } else {
                    $product->translations()->create($translationData);
                }
            }
        }
    }

    private function applySorting($query, $sortBy)
    {
        switch ($sortBy) {
            case 'name_asc':
                $query->orderBy('slug', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('slug', 'desc');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'popular':
                $query->orderBy('popularity', 'desc');
                break;
        }


    }
      //method manually efresh product prices

      public function refreshPrices()
    {
        $products = Product::all();
        foreach ($products as $product) {
            $product->calculateDiscountedPrice();
            $product->save();
        }

        return redirect()->route('admin.products.index')
            ->with('success', 'All product prices refreshed!');
    }
    public function testDiscounts()
{
    // Create a global discount
    $globalDiscount = Discount::create([
        'name' => 'Test Global Discount',
        'percentage' => 10,
        'type' => 'percentage',
        'start_date' => now(),
        'end_date' => now()->addDays(30),
        'is_active' => true,
        'applies_to' => 'all'
    ]);

    // Fetch some products
    $products = Product::all();

    return view('AdminSide.test-discounts', compact('products'));
}

  }
