@extends('loginlayout')

@section('title', 'Admin Login')

@section('content')
<link rel="stylesheet"  href="{{asset('ecweb/css/nav/login-nav.css')}}">
<h1>Admin Login</h1>
<form action="{{ route('admin.login') }}" method="POST">
    @csrf
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required minlength="6">

    <button type="submit">Login</button>
</form>

@endsection
