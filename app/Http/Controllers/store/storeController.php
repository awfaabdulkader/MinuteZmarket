<?php

namespace App\Http\Controllers\store;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use View;

class StoreController extends Controller
{
    protected $defaultLanguage = 'fr';

    private function getBaseProductQuery($languageCode)
    {
        return Product::with([
            'translations',
            'category',
            'category.translations',
            'discounts'
        ])->whereHas('translations', function($query) use ($languageCode) {
            $query->where('language_code', $languageCode);
        });
    }


    public function showAbout()
    {
        $languageCode = session('user_language', 'fr');
        $categories = $this->getCategories($languageCode);
        
        return view('HomeStore.page-about', compact('categories', 'languageCode'));
    }


    public function showContact()
    {
        $languageCode = session('user_language' , 'fr');
        $categories = $this->getCategories($languageCode);

        return view('HomeStore.page-contact', compact('categories', 'languageCode'));
    }

    private function getSortOptions()
    {
        return [
            'featured' => ['column' => 'created_at', 'direction' => 'desc'],
            'price_asc' => ['column' => 'sale_price', 'direction' => 'asc'],
            'price_desc' => ['column' => 'sale_price', 'direction' => 'desc'],
            'release_date' => ['column' => 'created_at', 'direction' => 'desc'],
        ];
    }

    private function getCategories($languageCode)
    {
        return Category::withCount([
            'product' => function($query) use ($languageCode) {
                $query->whereHas('translations', function($q) use ($languageCode) {
                    $q->where('language_code', $languageCode);
                });
            }
        ])
        ->with(['translations'])
        ->get();
    }

    public function home()
    {
        $languageCode = session('user_language', 'fr');

        $products = $this->getBaseProductQuery($languageCode)
            ->latest()
            ->take(4)
            ->get()
            ->each(function($product) {
                $product->calculateDiscountedPrice();
            });

        $categories = $this->getCategories($languageCode);
        
        return view('HomeStore.index', compact('products', 'languageCode', 'categories'));
    }

    public function index(Request $request, $categoryId = null)
    {
        $languageCode = session('user_language', 'fr');
        $sortOptions = $this->getSortOptions();
        $sort = $request->input('sort', 'featured');
    
        $query = $this->getBaseProductQuery($languageCode);
        
        $currentCategory = null;
    
        if ($categoryId) {
            $currentCategory = Category::with('translations')->find($categoryId);
            $query->where('category_id', $categoryId);
        }
    
        if (isset($sortOptions[$sort])) {
            $query->orderBy(
                $sortOptions[$sort]['column'], 
                $sortOptions[$sort]['direction']
            );
        }
    
        // Simple pagination with 2 items per page
        $products = $query->paginate(20);
        $categoryTranslation = $currentCategory ? $currentCategory->getTranslation($languageCode) : null;
        $categories = $this->getCategories($languageCode);
        
        return view('HomeStore.shop', [
            'products' => $products, 
            'categories' => $categories, 
            'languageCode' => $languageCode, 
            'currentCategory' => $currentCategory,
            'categoryTranslation' => $categoryTranslation,
            'selectedSort' => $sort,
            'selectedPerPage' => 2, // Reflecting the pagination change
            'sortOptions' => $sortOptions
        ]);
    }
    

    public function getAllProducts(Request $request)
    {
        $languageCode = session('user_language', 'fr');
        $sortOptions = $this->getSortOptions();
        $sort = $request->input('sort', 'featured');

        $query = $this->getBaseProductQuery($languageCode);

        if (isset($sortOptions[$sort])) {
            $query->orderBy(
                $sortOptions[$sort]['column'], 
                $sortOptions[$sort]['direction']
            );
        }

        $products = $query->paginate(20);

       $products->each(function($product) {
        $product->calculateDiscountedPrice();
    });

        $categories = $this->getCategories($languageCode);

        return view('HomeStore.allproduct', [
            'products' => $products,
            'categories' => $categories,
            'languageCode' => $languageCode,
            'selectedSort' => $sort,
            'sortOptions' => $sortOptions
        ]);
    }
}