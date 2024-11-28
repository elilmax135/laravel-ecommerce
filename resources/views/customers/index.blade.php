@extends('customers.customerlayout')
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

    <h2>Customer Products</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer Product Name</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customer_products as $item)
                <tr>
                    <td>{{ $item->product->id }}</td>
                    <td>{{ $item->product->productname }}</td>
                    <td>{{ $item->product->description }}</td>
                    <td>{{ $item->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Products</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Photo</th>
            </tr>
        </thead>

    </table>


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
