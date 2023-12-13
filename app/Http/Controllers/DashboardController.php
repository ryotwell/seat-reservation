<?php

namespace App\Http\Controllers;

use App\Models\Chair;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $totalAdmin = Auth::user()->isAdmin() ? User::where('role', 'admin')->count() : 0;
        $totalUser = Auth::user()->isAdmin() ? User::where('role', 'user')->count() : 0;
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
