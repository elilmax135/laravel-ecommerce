@extends('layout')
@section('content')

<link rel="stylesheet"  href="{{asset('ecweb/css/table.css')}}">
<link rel="stylesheet"  href="{{asset('ecweb/css/input.css')}}">
<div class="filter">

    <div>
        <table><tr><th>
        <label class="filter-box">Search by ID</label>
        <input id="idSearch" class="filter-input"  type="text" placeholder="Search by ID...">
        </th><th>
        <label class="filter-box">Search by Name</label>
        <input id="nameSearch" class="filter-input"  type="text" placeholder="Search by Name...">
        </th>
        </tr></table>
    </div>

    <a href="{{ url('/category/create') }}" title="ADD Category">
        <button class="custom-btn">
            <i class="fa fa-eye" aria-hidden="true"></i>Add New Category
        </button>
    </a>

    <a href="{{ url('/category/show') }}" title="Edit Category">
        <button class="custom-btn">
            <i class="fa fa-eye" aria-hidden="true"></i>Edit Category
        </button>
    </a>

    <div class="table-heading">Category Table</div>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody id="categoryTable">
            @foreach($categories as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>      @if ($item->status == 1)
                        <span class="status true-status">
                            <i class="fa fa-check-circle" aria-hidden="true"></i> True
                        </span>
                    @else
                        <span class="status false-status">
                            <i class="fa fa-times-circle" aria-hidden="true"></i> False
                        </span>
                    @endif</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>






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
@endsection
