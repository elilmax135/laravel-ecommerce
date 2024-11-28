<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Dashboard</title>

<!--custom css -->
    <link rel="stylesheet"  href="{{asset('ecweb/css/ecom.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">


    <!--materail icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"
      rel="stylesheet">

   <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=account_circle" /> -->
</head>
<body>
<div class="grid-container">
<!-- Header-->
<header class="header">

<div class="menu-icon" onclick="openSidebar()">
    <span class="material-icons-outlined">menu</span>
</div>

<div class="header-left">
    <span class="material-icons-outlined"> search</span>

</div>

<div class="header-right">

    <span class="material-icons-outlined">   notifications </span>
    <span class="material-icons-outlined">   mail  </span>
    <span class="material-icons-outlined">account_circle</span>
</div>

</header>
<!-- End Header-->


<!-- Sidebar-->
<aside id="sidebar">
<div class="sidebar-title">
    <div class="sidebar-brand">
        <span class="material-icons-outlined"> shopping_cart</span>
    </div>
    <span class="material-icons-outlined" onclick="closeSidebar()"> close</span>
</div>



<ul class="sidebar-list">

    <li class="sidebar-list-item" onclick="navigateToPage('order')">
        <span class="material-icons-outlined">  inventory_2  </span>Products
    </li>

    <li class="sidebar-list-item">
        <span class="material-icons-outlined">    report </span>Reports
    </li>

    <li class="sidebar-list-item" onclick="navigateToPage('user/login')">
        <span class="material-icons-outlined">    logout </span> logout
    </li>
</ul>
</aside>
<!--end sidebar-->


<!--Main-->
<main class="main-container">
    <div>
    @yield('content')
    </div>
</main>
<!--end Main-->


</div>

<!-- script -->

<!-- apexchart -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/4.0.0/apexcharts.min.js"></script>
    <!-- custom js  -->
    <script src="{{asset('ecweb/js/ecom.js')}}"> </script>



</body>
</html>
