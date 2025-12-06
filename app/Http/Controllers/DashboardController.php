<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

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

    $topMenus = \DB::table('order_items')
    ->join('items', 'order_items.item_id', '=', 'items.id')
    ->select(
        'items.name as menu_name',
        \DB::raw('SUM(order_items.quantity) as total_qty')
    )
    ->groupBy('order_items.item_id', 'items.name')
    ->orderByDesc('total_qty')
    ->limit(5)
    ->get();

$topMenuNames = $topMenus->pluck('menu_name')->toArray();
$topMenuQty   = $topMenus->pluck('total_qty')->toArray();

// ======================
// Trend Penjualan 7 Hari
// ======================
$trendLabels = [];
$trendData   = [];

for ($i = 6; $i >= 0; $i--) {
    $date = Carbon::now()->subDays($i);

    // label tanggal
    $trendLabels[] = $date->format('d M');

    // total order per tanggal
    $trendData[] = Order::whereDate('created_at', $date->toDateString())->count();
}
// ======================
// Trend Revenue 7 Hari
// ======================
$revenueLabels = [];
$revenueData   = [];

for ($i = 6; $i >= 0; $i--) {
    $date = Carbon::now()->subDays($i);

    // label tanggal
    $revenueLabels[] = $date->format('d M');

    // total revenue
    $revenueData[] = Order::whereDate('created_at', $date->toDateString())
        ->sum('grandtotal');
}
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
            'lastMonthlyFee',
            'topMenuNames',
            'topMenuQty',
            'trendLabels',
            'trendData',
            'revenueLabels',
            'revenueData'
        ));
    }
}
