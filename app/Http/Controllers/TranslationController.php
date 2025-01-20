<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Translation;
use Illuminate\Http\Request;
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
        return view('dash.products', [
            'products' => $products,
            'languageCode' => $languageCode,
        ]);
    }

    // Switch the language and store it in the session
    public function switchLanguage(Request $request, $languageCode)
    {
        // Store the selected language in the session
        session(['admin_language' => $languageCode]);

        // Redirect back to the product list with the new language
        return redirect()->route('products.index', ['languageCode' => $languageCode]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Translationrequest $request)
    {
        $validatedData = $request->validated();
    
        // Create the translation record
        $translation = Translation::create($validatedData);
    
        return response()->json($translation, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Translation $translation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Translation $translation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Translation $translation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Translation $translation)
    {
        //
    }
}
