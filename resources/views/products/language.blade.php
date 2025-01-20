@extends('layouts.app')

@section('content')
    <h1>Products in {{ strtoupper($languageCode) }}</h1>

    @if($products->isEmpty())
        <p>No products available in {{ strtoupper($languageCode) }}.</p>
    @else
        <div class="product-grid">
            @foreach ($products as $product)
                <div class="product-item">
                    <h3>{{ $product->slug }}</h3>
                    @foreach ($product->translations as $translation)
                        <div>
                            <h4>{{ $translation->name }}</h4>
                            <p>{{ $translation->description }}</p>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    @endif
@endsection
