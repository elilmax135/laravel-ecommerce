@extends('layout')
@section('content')



<div class="main-title">
<h2>Dashboard</h2>
</div>
<div class="main-cards">
<div class="card">
<div class="card-inner">
    <h3>PRODUCTS</h3>
    <span class="material-icons-outlined">inventory_2</span>
</div>
<h1>{{ $productCount }}</h1>
</div>

<div class="card">
<div class="card-inner">
    <h3>CATERGORIES</h3>
    <span class="material-icons-outlined">category</span>
</div>
<h1>{{ $categoryCount }}</h1>
</div>

<div class="card">
<div class="card-inner">
    <h3>CUSTOMERS</h3>
    <span class="material-icons-outlined">group </span>
</div>
<h1>{{ $userCount }}</h1>
</div>

<div class="card">
<div class="card-inner">
    <h3>ALERTS</h3>
    <span class="material-icons-outlined"> notification_important</span>
<h1>0</h1>
</div>

</div>
<div class="notepad-container">
    <h3>NOTES</h3>
    <span class="material-icons-outlined">note</span>

    <!-- Simple Notepad -->
    <textarea id="notepad" placeholder="Write your notes here..." rows="10" cols="30"></textarea>

    <button onclick="saveNote()" class="back-btn">Save Note</button>
</div>



</div>
<script>
    // Function to save the note to local storage
    function saveNote() {
        const noteContent = document.getElementById('notepad').value;
        localStorage.setItem('userNote', noteContent);
        alert('Note saved successfully!');
    }

    // Load the saved note when the page loads
    window.onload = function() {
        const savedNote = localStorage.getItem('userNote');
        if (savedNote) {
            document.getElementById('notepad').value = savedNote;
        }
    };
</script>

@endsection
