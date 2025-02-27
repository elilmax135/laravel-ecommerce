@extends('loginlayout')

@section('title', 'User Login')

@section('content')
<link rel="stylesheet"  href="{{asset('ecweb/css/nav/login-nav.css')}}">
<h1>User Login</h1>
<form action="{{ route('userLogin') }}" method="POST">
    @csrf
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required minlength="6">

    <button type="submit">Login</button>
</form>

@endsection
