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
<h1>249</h1>
</div>

<div class="card">
<div class="card-inner">
    <h3>CATERGORIES</h3>
    <span class="material-icons-outlined">category</span>
</div>
<h1>25</h1>
</div>

<div class="card">
<div class="card-inner">
    <h3>CUSTOMERS</h3>
    <span class="material-icons-outlined">group </span>
</div>
<h1>1500</h1>
</div>

<div class="card">
<div class="card-inner">
    <h3>ALERTS</h3>
    <span class="material-icons-outlined"> notification_important</span>
<h1>56</h1>
</div>
</div>
 <div class="charts">
    <div class="charts-card">
        <h2 class="chart-title">Top 5 Products </h2>
   <div id="bar-chart"></div>
</div>



   <div class="charts-card">
    <h2 class="chart-title">Purchase and sales Orders </h2>
   <div id="area-chart"></div>
</div>


</div>
</div>

@endsection
