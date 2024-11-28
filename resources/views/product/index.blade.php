@extends('layout')
@section('content')




<link rel="stylesheet"  href="{{asset('ecweb/css/product/product_table.css')}}">
<link rel="stylesheet"  href="{{asset('ecweb/css/input.css')}}">
<link rel="stylesheet"  href="{{asset('ecweb/css/product/product.css')}}">
<div class="filter">



    <a href="{{ url('/product/show') }}" title="Edit Product">
        <button class="custom-btn">
            <i class="fa fa-eye" aria-hidden="true"></i>Edit Product
        </button>
    </a


</div>
<div class="form-container">
    <div class="form-title">Add New Product</div>
    <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <div class="form-group">
            <label>Product Name</label>
            <input type="text" class="form-control" name="productname" placeholder="Enter product name">
        </div>
        <div class="form-group">
            <label>Category</label>
            <select name="cat_id" id="cat_id" class="form-control">
                @foreach ($categories as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control" name="discription" placeholder="Enter product description">
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="text" class="form-control" name="price" placeholder="Enter product price">
        </div>
        <div class="form-group">
            <label>Quantity</label>
            <input type="text" class="form-control" name="quantity" placeholder="Enter product quantity">
        </div>
        <div class="form-group">
            <label>Image</label>
            <input class="form-control" name="photo" type="file" id="photo">
        </div>

        <div class="form-group">
            <input type="submit" class="form-submit" value="Register">
        </div>
    </form>
</div>

<div class="product-table-container">
    <div>
        <table><tr><th>
        <label class="filter-box">Search by ID</label>
        <input id="idSearch" class="filter-product-input"  type="text" placeholder="Search by ID...">
        </th><th>
        <label class="filter-box">Search by Product Name</label>
        <input id="nameSearch" class="filter-product-input"  type="text" placeholder="Search by Name...">
        </th>
        </tr></table>
    </div>

    <div class="table-title">Product Table</div>
    <table class="styled-table">
        <thead>

            <tr>
                <th>#</th>
                <th>Category Name</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Photo</th>

            </tr>
        </thead>
        <tbody id="productTable">
            @foreach($products as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->category->name ?? '' }}</td>
                    <td>{{ $item->productname }}</td>
                    <td>{{ $item->discription }}</td>
                    <td>{{ number_format($item->price, 2) }}</td>
                    <td>{{ number_format($item->quantity) }}</td>
                    <td>
                        <div class="image-container">
                            <img src="{{ asset($item->photo) }}" alt="Product Image" width="150" height="100">
                        </div>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>


<script>
const idSearch = document.getElementById('idSearch');
const nameSearch = document.getElementById('nameSearch');
const rows = document.querySelectorAll('#productTable tr');

function filterTable() {
    const idFilter = idSearch.value.toLowerCase();
    const nameFilter = nameSearch.value.toLowerCase();

    rows.forEach(row => {
        const idCell = row.querySelector('td:nth-child(2)'); // ID is in the 2nd column
        const nameCell = row.querySelector('td:nth-child(3)'); // Name is in the 3rd column

        if (idCell && nameCell) {
            const idText = idCell.textContent || idCell.innerText;
            const nameText = nameCell.textContent || nameCell.innerText;

            // Show the row if it matches either ID or Name filter
            const matchesId = idText.toLowerCase().includes(idFilter);
            const matchesName = nameText.toLowerCase().includes(nameFilter);

            row.style.display = (idFilter && !matchesId) || (nameFilter && !matchesName) ? 'none' : '';
        }
    });
}

idSearch.addEventListener('keyup', filterTable);
nameSearch.addEventListener('keyup', filterTable);
</script>
@endsection
