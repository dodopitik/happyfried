<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    // Total seluruh order & revenue
    $totalOrders = Order::count();
    $totalRevenue = Order::sum('grandtotal');

    // Hari ini
    $today = now()->toDateString();
    $todayOrders = Order::whereDate('created_at', $today)->count();
    $todayRevenue = Order::whereDate('created_at', $today)->sum('grandtotal');

    // Bulan ini
    $year = now()->year;
    $month = now()->month;

    $monthlyOrders = Order::whereYear('created_at', $year)
        ->whereMonth('created_at', $month)
        ->count();

    $monthlyRevenue = Order::whereYear('created_at', $year)
        ->whereMonth('created_at', $month)
        ->sum('grandtotal');
    
    $monthlyFee = $monthlyOrders * 1000;

        // ======================
        // 1) STATUS ORDER
        // ======================
        $pendingCount    = Order::where('status', 'pending')->count();
        $settlementCount = Order::where('status', 'settlement')->count();
        $cookedCount     = Order::where('status', 'cooked')->count();
        // Kalau value-nya beda di DB (misal 'proses', 'selesai', 'batal'),
        // tinggal ganti di atas.

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
        'cookedCount'

    ));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
