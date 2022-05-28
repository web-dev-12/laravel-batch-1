<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('isWallet')->except(['index']);
    }
    public function index(){
        return view('dashboard.superadmin_dashboard');
    }
    public function userindex(){
        return view('dashboard.user_dashboard');
    }
}
