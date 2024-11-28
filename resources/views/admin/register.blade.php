@extends('loginlayout')

@section('title', 'Admin Register')

@section('content')
<link rel="stylesheet"  href="{{asset('ecweb/css/nav/login-nav.css')}}">
<h1>Admin Register</h1>
<form action="{{ route('admin.register') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required minlength="6">

    <button type="submit">Register</button>
</form>

@endsection
