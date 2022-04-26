<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Subscribe;
use App\Models\User;
use App\Models\UserBook;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $ordersCount = Order::count();
        $ordersTodayCount = Order::whereDate('created_at', Carbon::today())->count();

        $userBookingsCount = UserBook::count();
        $userBookingsTodayCount = UserBook::whereDate('created_at', Carbon::today())->count();

        $subscribesCount = UserBook::count();
        $subscribesTodayCount = UserBook::whereDate('created_at', Carbon::today())->count();

        $productsCount = Product::count();

        $users = User::count();
        $subscribes = Subscribe::count();

        return view('admins.dashboard' , compact('ordersCount', 'ordersTodayCount', 'userBookingsCount',
        'userBookingsTodayCount', 'subscribesCount', 'subscribesTodayCount', 'productsCount', 'users', 'subscribes'));
    }
}
