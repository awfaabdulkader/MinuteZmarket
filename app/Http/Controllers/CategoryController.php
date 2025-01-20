<?php

namespace App\Http\Controllers;

use App\Http\Requests\Categoryrequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function index()
    {
        $categories = Category::with(['translations' => function ($query) {
            $query->whereIn('language_code', ['en', 'fr', 'es']);
        }])->get();

        foreach ($categories as $category) {
            \Log::info('Category ID: ' . $category->id);
            \Log::info('Translations: ', $category->translations->toArray());
        }
        return view('dash.categories', compact('categories'));
    }



    public function create()
    {
        $availableLanguages = ['en' => 'English', 'fr' => 'French', 'es' => 'Spanish'];
        return view('dash.add-product', compact('availableLanguages'));
    }



    public function store(Categoryrequest $request)
    {
        $category = Category::create([]); // Empty array since no direct columns
    
        if ($request->has('translations')) {
            foreach ($request->translations as $translation) {
                $category->translations()->create([
                    'language_code' => $translation['language_code'],
                    'name' => $translation['name'],
                    'description' => $translation['description'] ?? null
                ]);
            }
        }
    
        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully!');
    }



    public function show(Category $category)
    {
        $translations = $category->translations
            ->whereIn('language_code', ['en', 'fr', 'es']);

        return view('categories.show', compact('category', 'translations'));
    }



    public function edit(Category $category)
    {
        $availableLanguages = ['en' => 'English', 'fr' => 'French', 'es' => 'Spanish'];
        $translations = $category->translations
            ->whereIn('language_code', ['en', 'fr', 'es'])
            ->keyBy('language_code');

        return view('dash.edit-category', compact('category', 'translations', 'availableLanguages'));
    }



    public function update(Categoryrequest $request, Category $category)
    {
        $validatedData = $request->validated();
        
        foreach($validatedData['translations'] as $translationData) {
            $translation = $category->translations()
                ->where('language_code', $translationData['language_code'])
                ->first();

            if($translation) {
                $translation->update(['name' => $translationData['name']]);
            } else {
                $category->translations()->create($translationData);
            }
        }

        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully!');
    }



    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully!');
    }



    public function destroyTranslation(Category $category, $languageCode)
    {
        $translation = $category->translations()
            ->where('language_code', $languageCode)
            ->first();

        if ($translation) {
            $translation->delete();
            return redirect()->back()->with('success', 'Translation deleted successfully!');
        }

        return redirect()->back()->with('error', 'Translation not found!');
    }




    public function getByLanguage($languageCode)
    {
        $categories = Category::with(['translations' => function ($query) use ($languageCode) {
            $query->where('language_code', $languageCode);
        }])->get();

        return view('categories.language', compact('categories', 'languageCode'));
    }
}