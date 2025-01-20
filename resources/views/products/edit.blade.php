@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Edit Product</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="slug">Slug:</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $product->slug) }}">
        </div>

        <div class="form-group">
            <label for="stock">Stock:</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock', $product->stock) }}">
        </div>

        <div class="form-group">
            <label for="category_id">Category:</label>
            <select class="form-control" id="category_id" name="category_id">
                <option value="">Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="image_url">Image:</label>
            <input type="file" class="form-control" id="image_url" name="image_url">
            @if ($product->image_url)
                <div class="mt-2">
                    <p>Current Image:</p>
                    <img src="{{ Storage::url($product->image_url) }}" alt="Product Image" style="max-width: 200px;">
                </div>
            @endif
        </div>

        <h2 class="mt-4">Translations</h2>

        <!-- English -->
        <div class="translations-section">
            <div class="form-group">
                <label for="translations[en][name]">Name (English):</label>
                <input type="text" class="form-control" name="translations[en][name]" 
                    value="{{ old('translations.en.name', $product->translations->where('language_code', 'en')->first()->name ?? '') }}">
                <input type="hidden" name="translations[en][language_code]" value="en">
            </div>

            <div class="form-group">
                <label for="translations[en][description]">Description (English):</label>
                <textarea class="form-control" name="translations[en][description]" rows="3">{{ old('translations.en.description', $product->translations->where('language_code', 'en')->first()->description ?? '') }}</textarea>
            </div>
        </div>

        <!-- French -->
        <div class="translations-section">
            <div class="form-group">
                <label for="translations[fr][name]">Name (French):</label>
                <input type="text" class="form-control" name="translations[fr][name]" 
                    value="{{ old('translations.fr.name', $product->translations->where('language_code', 'fr')->first()->name ?? '') }}">
                <input type="hidden" name="translations[fr][language_code]" value="fr">
            </div>

            <div class="form-group">
                <label for="translations[fr][description]">Description (French):</label>
                <textarea class="form-control" name="translations[fr][description]" rows="3">{{ old('translations.fr.description', $product->translations->where('language_code', 'fr')->first()->description ?? '') }}</textarea>
            </div>
        </div>

        <!-- Spanish -->
        <div class="translations-section">
            <div class="form-group">
                <label for="translations[es][name]">Name (Spanish):</label>
                <input type="text" class="form-control" name="translations[es][name]" 
                    value="{{ old('translations.es.name', $product->translations->where('language_code', 'es')->first()->name ?? '') }}">
                <input type="hidden" name="translations[es][language_code]" value="es">
            </div>

            <div class="form-group">
                <label for="translations[es][description]">Description (Spanish):</label>
                <textarea class="form-control" name="translations[es][description]" rows="3">{{ old('translations.es.description', $product->translations->where('language_code', 'es')->first()->description ?? '') }}</textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Product</button>
    </form>
</div>
@endsection