<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
</head>
<body>
    <h1>Product List</h1>
    
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('products.create') }}">Create New Product</a>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Slug</th>
                <th>Stock</th>
                <th>Category</th>
                <th>Image</th>
                <th>Translations</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->slug }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->category_id }}</td>
                    <td>
                        @if($product->image_url)
                            <img src="{{ asset('storage/' . $product->image_url) }}" alt="Product Image" width="100">
                        @endif
                    </td>
                    <td>
                        <ul>
                            @foreach($product->translations as $translation)
                                <li>{{ $translation->language_code }}: {{ $translation->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}">View</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
