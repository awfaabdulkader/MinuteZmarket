<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
</head>
<body>
    <h1>Product Details</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <p><strong>ID:</strong> {{ $product->id }}</p>
    <p><strong>Slug:</strong> {{ $product->slug }}</p>
    <p><strong>Stock:</strong> {{ $product->stock }}</p>
    <p><strong>Category:</strong> {{ $product->category_id }}</p>
    <p><strong>Image:</strong></p>
    @if($product->image_url)
        <img src="{{ asset('storage/' . $product->image_url) }}" alt="Product Image" width="200">
    @endif

    <h3>Translations:</h3>
    <ul>
        @foreach($product->translations as $translation)
            <li>
                <strong>{{ $translation->language_code }}:</strong> {{ $translation->name }} - {{ $translation->description }}
                <form action="{{ route('products.destroyTranslation', [$product->id, $translation->language_code]) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete Translation</button>
                </form>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('products.index') }}">Back to List</a>
</body>
</html>
