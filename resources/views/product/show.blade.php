@extends('layout')
@section('content')

<link rel="stylesheet"  href="{{asset('ecweb/css/product/product_table.css')}}">
<link rel="stylesheet"  href="{{asset('ecweb/css/input.css')}}">
<link rel="stylesheet"  href="{{asset('ecweb/css/product/product.css')}}">
<div class="filter">

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
    <div>
        <a href="{{ route('product.index') }}" class="back-btn">Back to Product</a>
    </div>

    <div class="table-heading">Product Table</div>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Category</th>
                <th>Name</th>
             <th>Discription</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="categoryTable">
            @foreach($products as $item)
                <tr>
                    <td>{{ $item->iteration }}</td>
                    <td>{{ $item->category->name ?? '' }}</td>
                    <td>{{ $item->productname }}</td>
                    <td>{{ $item->discription }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>   <div class="image-container">
                        <img src="{{ asset($item->photo) }}" alt="Product Image" width="150" height="100">
                    </div></td>
                    <td>               <a href="{{ url('/product/' . $item->id . '/edit') }}" title="Delete Category"><button class="edit-btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                             <form method="POST" action="{{ url('/product' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="delete-btn" title="Delete category" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Delete</button>
                    </form></td>

                </tr>
                @endforeach
        </tbody>
    </table>




</div>


<div class="details">
</div>


<script>
const idSearch = document.getElementById('idSearch');
const nameSearch = document.getElementById('nameSearch');
const rows = document.querySelectorAll('#categoryTable tr');

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/4.0.0/apexcharts.min.js"></script>
    <!-- custom js  -->
    <script src="{{asset('ecweb/js/ecom.js')}}"> </script>



@endsection
