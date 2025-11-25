<?php

namespace App\Http\Controllers;

use App\Models\Order;

class PaymentController extends Controller
{
    public function qris()
    {
        $year  = now()->year;
        $month = now()->month;

        $monthlyOrders = Order::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->count();

        $monthlyFee = $monthlyOrders * 1000;

        return view('admin.pay-qris', compact('monthlyOrders', 'monthlyFee'));
    }
}
