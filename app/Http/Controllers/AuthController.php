<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show User Login Form
    public function showUserLogin()
    {
        return view('user.login');
    }

    // Handle User Login
    public function userLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(array_merge($credentials, ['role' => 'user']))) {
            $request->session()->regenerate();
            return redirect('/userdashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Show User Register Form
    public function showUserRegister()
    {
        return view('user.register');
    }

    // Handle User Registration
    public function userRegister(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'user',
        ]);

        return redirect('/user/login');
    }

    // Show Admin Login Form
    public function showAdminLogin()
    {
        return view('admin.login');
    }

    // Handle Admin Login
    public function adminLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(array_merge($credentials, ['role' => 'admin']))) {
            $request->session()->regenerate();
            return redirect('/admindashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Show Admin Register Form
    public function showAdminRegister()
    {
        return view('admin.register');
    }

    // Handle Admin Registration
    public function adminRegister(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'admin',
        ]);

        return redirect('/admin/login');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/user/login');
    }
}
