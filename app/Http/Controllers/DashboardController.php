<?php

namespace App\Http\Controllers;

use App\Models\Chair;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $totalAdmin = User::where('role', 'admin')->count();
        $totalUser = User::where('role', 'user')->count();
        $totalChair = Chair::count();
        $totalOrder = Order::count();
        $totalOrderToday = Order::whereDate('created_at', now()->today())->count();

        $data = [
            'type_menu' => 'dashboard',
            'totalAdmin' => $totalAdmin,
            'totalUser' => $totalUser,
            'totalChair' => $totalChair,
            'totalOrder' => $totalOrder,
            'totalOrderToday' => $totalOrderToday,
        ];

        return view('dashboard', $data);
    }
}
