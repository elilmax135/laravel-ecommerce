@extends('customerlayout')
<link rel="stylesheet"  href="{{asset('ecweb/cart/cart.css')}}">
@section('content')
<h1 style="text-align: center; margin-bottom: 20px;">Products</h1>
<div class="product-grid">
    @foreach($products as $product)
    <div class="product-card">
        <img src="{{ asset($product->photo) }}" alt="{{ $product->productname }}" class="product-image">
        <h3 class="product-name">{{ $product->productname }}</h3>
        <p class="product-price">Price: ${{ $product->price }}</p>
        <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="number"
            name="quantity"
            value="1"
            min="1"
            max="{{ $product->quantity }}"
            class="quantity-input">
            <button type="submit" class="add-to-cart-button">Add to Cart</button>
        </form>
    </div>
    @endforeach
</div>
<script>document.querySelectorAll('.quantity-input').forEach(input => {
    input.addEventListener('input', function () {
        const max = parseInt(this.getAttribute('max'));
        const value = parseInt(this.value);

        if (value > max) {
            alert('Quantity exceeds available stock!');
            this.value = max; // Reset to max value
        }
    });
});

    </script>
@endsection
