<?php


namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class LanguageProductController extends Controller
{
    // Display the products based on the selected language
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
}

