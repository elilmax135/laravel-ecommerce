@extends('layout')
@section('content')

<link rel="stylesheet"  href="{{asset('ecweb/css/table.css')}}">
<link rel="stylesheet"  href="{{asset('ecweb/css/product/edit.css')}}">

<link rel="stylesheet"  href="{{asset('ecweb/css/input.css')}}">

    <div>
        <!-- Back Button -->
        <a href="{{ url()->previous() }}" class="back-btn">Back</a>
    </div>


<form method="post" action="{{ route('product.update', $products->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- Use the PUT method for updates -->

    <div class="form-group">
        <label>Product Name</label>
        <input
            type="text"
            class="form-control"
            name="productname"
            value="{{ $products->productname }}"
            placeholder="Enter product name">
    </div>

    <div class="form-group">
        <label>Category</label>
        <select name="cat_id" id="cat_id" class="form-control">
            @foreach ($categories as $id => $name)
                <option value="{{ $id }}" {{ $products->cat_id == $id ? 'selected' : '' }}>
                    {{ $name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Description</label>
        <input
            type="text"
            class="form-control"
            name="discription"
            value="{{ $products->discription }}"
            placeholder="Enter product description">
    </div>

    <div class="form-group">
        <label>Price</label>
        <input
            type="text"
            class="form-control"
            name="price"
            value="{{ $products->price }}"
            placeholder="Enter product price">
    </div>
    <div class="form-group">

        <label>Quantity</label>
        <input
            type="text"
            class="form-control"
            name="quantity"
            value="{{ $products->quantity }}"
            placeholder="Enter product quantity">
    </div>
    <div class="form-group">
        <label>Image</label>
        <input
            class="form-control"
            name="photo"
            type="file"
            id="photo">
        @if ($products->photo)
            <img src="{{ asset($products->photo) }}" alt="Product Image" style="max-width: 150px; margin-top: 10px;">
        @endif
    </div>

    <div class="form-group">
        <input type="submit" class="form-submit" value="Update">
    </div>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/4.0.0/apexcharts.min.js"></script>
    <!-- custom js  -->
    <script src="{{asset('ecweb/js/ecom.js')}}"> </script>




@stop
