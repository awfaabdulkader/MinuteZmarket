<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\Translation;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\Translationrequest;

class TranslationController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index($languageCode = 'fr')
    {
        // Fetch products with translations for the specified language
        $products = Product::with(['translations' => function($query) use ($languageCode) {
            $query->where('language_code', $languageCode);
        }])->paginate(10);

        // Return the view with the products and selected language code
        return view('AdminSide.products', [
            'products' => $products,
            'languageCode' => $languageCode,
        ]);
    }



    public function userHomeTranslation($languageCode = 'fr')
    {
        $languageCode = $languageCode ?? session('user_language', 'fr');

        $homeContent = Translation::where('language_code', $languageCode)
            ->where('translatable_type', 'home')
            ->get();
    
        $products = Product::with(['translations' => function($query) use ($languageCode) {
            $query->where('language_code', $languageCode);
        }])->get();
    
        $categories = Category::with(['translations' => function($query) use ($languageCode) {
            $query->where('language_code', $languageCode);
        }])->get();

        return view('HomeStore.index', [
            'homeContent' => $homeContent,
            'products' => $products,
            'categories'=>$categories,
            'languageCode' => $languageCode,
        ]);
    }
    



    public function switchLanguage(Request $request, $languageCode)
    {
        session(['admin_language' => $languageCode]);
        
        return redirect()->route('products.index', ['languageCode' => $languageCode]);
    }




    public function switchUserLanguage(Request $request, $languageCode)
    {
        session(['user_language' => $languageCode]);
    
        return redirect()->route('home.language', ['languageCode' => $languageCode]);
    }
    

   
    public function store(Translationrequest $request)
    {
        $validatedData = $request->validated();
    
        // Create the translation record
        $translation = Translation::create($validatedData);
    
        return response()->json($translation, 201);
 }

}