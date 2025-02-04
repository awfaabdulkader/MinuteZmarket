<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\Categoryrequest;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{


    public function index()
    {
        $categories = Category::with(['translations' => function ($query) {
            $query->whereIn('language_code', ['en', 'fr', 'es']);
        }])->paginate(10);

        foreach ($categories as $category) {
            \Log::info('Category ID: ' . $category->id);
            \Log::info('Translations: ', $category->translations->toArray());
        }
        return view('AdminSide.categories', compact('categories'));
    }



    public function create()
    {
        $availableLanguages = ['en' => 'English', 'fr' => 'French', 'es' => 'Spanish'];
        return view('AdminSide.add-product', compact('availableLanguages'));
    }



    public function store(Categoryrequest $request)
    {
        $category = new Category();
    
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('categories', 'public');
            $category->image = $path;
        }
        
        $category->save();

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

        return view('AdminSide.edit-category', compact('category', 'translations', 'availableLanguages'));
    }

    public function update(Categoryrequest $request, Category $category)
    {
        try {
            // Handle image upload if present
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($category->image) {
                    Storage::disk('public')->delete($category->image);
                }
                
                $path = $request->file('image')->store('categories', 'public');
                $category->image = $path;
            }
            
            // Save category regardless of image update
            $category->save();
    
            // Handle translations
            if ($request->has('translations')) {
                foreach ($request->translations as $translationData) {
                    $translation = $category->translations()
                        ->where('language_code', $translationData['language_code'])
                        ->first();
    
                    if ($translation) {
                        $translation->update([
                            'name' => $translationData['name'],
                            'description' => $translationData['description'] ?? null
                        ]);
                    } else {
                        $category->translations()->create([
                            'language_code' => $translationData['language_code'],
                            'name' => $translationData['name'],
                            'description' => $translationData['description'] ?? null
                        ]);
                    }
                }
            }
    
            return redirect()->route('categories.index')
                ->with('success', 'Category updated successfully!');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error updating category: ' . $e->getMessage());
        }
    }


    public function destroy(Category $category)
    {
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }
        
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