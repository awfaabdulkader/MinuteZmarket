<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected $defaultLanguage = 'fr';

    public function bord()
    {
        $products = Product::with(['category', 'translations'])->get();
        return view('dash.index', compact('products')); 
    }

    public function index()
    {
        $products = Product::with(['translations', 'category.translations'])->get();
        $languageCode = app()->getLocale();
        $categories = Category::with('translations')->get();
        
        return view('dash.products', compact('products', 'languageCode', 'categories'));
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
        return view('dash.index', compact('products'));
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

        return view('dash.products', compact('products', 'languageCode'));
    }

    public function create()
    {
        $categories = Category::with('translations')->get();
        return view('dash.add-product', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $validatedData = $request->validated();
        
        if ($request->hasFile('image_url')) {
            $validatedData['image_url'] = $this->handleImageUpload($request->file('image_url'));
        }

        $product = Product::create([
            'slug' => $validatedData['slug'],
            'prix'=>$validatedData['prix'],
            'stock' => $validatedData['stock'],
            'category_id' => $validatedData['category_id'],
            'image_url' => $validatedData['image_url'] ?? null,
        ]);

        $this->handleTranslations($product, $validatedData['translations'] ?? []);

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    public function show(Product $product)
    {
        return view('products.show', ['product' => $product->load('translations')]);
    }

    public function edit(Product $product)
    {
        $categories = Category::with('translations')->get();
        return view('dash.edit-product', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $validatedData = $request->validated();
    
        // Update main product data
        $product->update([
            'slug' => $validatedData['slug'],
            'prix'=>$validatedData['prix'],
            'stock' => $validatedData['stock'],
            'category_id' => $validatedData['category_id'],
        ]);
    
        // Handle image if present
        if ($request->hasFile('image_url')) {
            $this->deleteExistingImage($product);
            $product->update([
                'image_url' => $this->handleImageUpload($request->file('image_url'))
            ]);
        }
    
        // Update translations
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
    
        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        $this->deleteExistingImage($product);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
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
    private function handleImageUpload($image)
    {
        return $image->store('products', 'public');
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
}