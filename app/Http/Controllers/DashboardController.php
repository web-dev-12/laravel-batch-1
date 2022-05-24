<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.superadmin_dashboard');
    }
    public function userindex(){
        return view('dashboard.user_dashboard');
    }
}
