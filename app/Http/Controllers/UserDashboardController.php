<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        return view('userdashboard.index');
    }
}
