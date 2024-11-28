@extends('customerlayout')

<link rel="stylesheet"  href="{{asset('ecweb/cart/add-cart.css')}}">
@section('content')
<div class="cart-container">
    <h1>Your Cart</h1>
    @if($cartItems->isEmpty())
        <p class="empty-cart-message">Your cart is empty.</p>
    @else
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $grandTotal = 0; // Initialize total variable
                @endphp

                @foreach($cartItems as $item)
                @php
                    $itemTotal = $item->product->price * $item->quantity; // Calculate item total
                    $grandTotal += $itemTotal; // Add to grand total
                @endphp
                <tr>
                    <td>
                        <img src="{{ asset($item->product->photo) }}" alt="{{ $item->product->productname }}" class="cart-product-image">
                    </td>
                    <td>{{ $item->product->productname }}</td>
                    <td>${{ number_format($item->product->price, 2) }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ number_format($itemTotal, 2) }}</td>
                    <td>
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST" class="remove-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="remove-button">Remove</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Display the grand total -->
        <div class="cart-summary">
            <h3>Grand Total: ${{ number_format($grandTotal, 2) }}</h3>
            <a href="{{ route('cart.pdf') }}" >Download Invoice</a>
        </div>
    @endif
</div>
@endsection

