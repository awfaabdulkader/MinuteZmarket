@extends('layouts.app')

@section('content')
    <h2>Create Product</h2>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="slug">Slug:</label>
        <input type="text" name="slug" id="slug" required><br>

        <label for="stock">Stock:</label>
        <input type="number" name="stock" id="stock" required><br>

        
        <label for="category_id">Category ID:</label>
        <input type="number" name="category_id" id="category_id" required><br>

        <label for="image_url">Image:</label>
        <input type="file" name="image_url" id="image_url"><br>

        <!-- Translations -->
        <div id="translations">
            <h3>Translations</h3>
<!-- English Translation -->
<input type="hidden" name="translations[0][language_code]" value="en">
<div>
    <label for="translations[0][name]">Name (EN):</label>
    <input type="text" name="translations[0][name]" required>
</div>
<div>
    <label for="translations[0][description]">Description (EN):</label>
    <textarea name="translations[0][description]"></textarea>
</div>

<!-- French Translation -->
<input type="hidden" name="translations[1][language_code]" value="fr">
<div>
    <label for="translations[1][name]">Name (FR):</label>
    <input type="text" name="translations[1][name]" required>
</div>
<div>
    <label for="translations[1][description]">Description (FR):</label>
    <textarea name="translations[1][description]"></textarea>
</div>

<!-- Spanish Translation -->
<input type="hidden" name="translations[2][language_code]" value="es">
<div>
    <label for="translations[2][name]">Name (ES):</label>
    <input type="text" name="translations[2][name]" required>
</div>
<div>
    <label for="translations[2][description]">Description (ES):</label>
    <textarea name="translations[2][description]"></textarea>
</div>

        </div>

        <button type="submit">Create Product</button>
    </form>
@endsection
