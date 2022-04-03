<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
//        $data = request()->session()->all();
//        request()->session()->forget('subscribe_not_show');
        return view('users.dashboard');
    }
}
