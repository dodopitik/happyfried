<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Total seluruh order & revenue
        $totalOrders   = Order::count();
        $totalRevenue  = Order::sum('grandtotal');

        // Hari ini
        $today         = now()->toDateString();
        $todayOrders   = Order::whereDate('created_at', $today)->count();
        $todayRevenue  = Order::whereDate('created_at', $today)->sum('grandtotal');

        // Bulan ini
        $year  = now()->year;
        $month = now()->month;

        // Bulan lalu
        $lastMonthDate = now()->subMonth();   // ✅ BUKAN Order::now()
        $lastYear      = $lastMonthDate->year;
        $lastMonth     = $lastMonthDate->month;

        // ====== DATA BULAN INI ======
        $monthlyOrders = Order::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->count();

        $monthlyRevenue = Order::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->sum('grandtotal');

        $monthlyFee = $monthlyOrders * 1000;

        // ====== DATA BULAN LALU ======
        $lastMonthlyOrders = Order::whereYear('created_at', $lastYear)
            ->whereMonth('created_at', $lastMonth)
            ->count();

        $lastMonthlyRevenue = Order::whereYear('created_at', $lastYear)
            ->whereMonth('created_at', $lastMonth)
            ->sum('grandtotal');

        $lastMonthlyFee = $lastMonthlyOrders * 1000;

        // ======================
        // 1) STATUS ORDER
        // ======================
        $pendingCount    = Order::where('status', 'pending')->count();
        $settlementCount = Order::where('status', 'settlement')->count();
        $cookedCount     = Order::where('status', 'cooked')->count();

        return view('admin.dashboard', compact(
            'totalOrders',
            'totalRevenue',
            'todayOrders',
            'todayRevenue',
            'monthlyOrders',
            'monthlyRevenue',
            'monthlyFee',
            'pendingCount',
            'settlementCount',
            'cookedCount',
            'lastMonthlyOrders',
            'lastMonthlyRevenue',
            'lastMonthlyFee'
        ));
    }
}
