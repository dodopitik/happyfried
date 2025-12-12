<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $orders = Order::orderByDesc('created_at')->get(); // lebih rapi dari all()->sortByDesc()

    $lastOrder = Order::latest('id')->first();

    return view('admin.order.index', [
        'orders'          => $orders,
        'lastOrderId'     => $lastOrder?->id ?? 0,
        'lastOrderStatus' => $lastOrder?->status ?? '',
    ]);
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
        $orders = Order::findOrFail($id);
        $orderItems = OrderItem::where('order_id', $orders->id)->get();
        return view('admin.order.show', compact('orders', 'orderItems'));
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

    public function settlement($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'settlement';
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Order telah diselesaikan.');
    }

    public function cooked($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'cooked';
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Order telah diselesaikan.');
    }

 public function print(Order $order)
{
    $order->load(['user', 'orderItems.item']); // eager load YANG BENAR

    return view('admin.order.print', [
        'order' => $order,
        'orderItems' => $order->orderItems, // benar
    ]);
}

public function checkNew(Request $request)
{
    $lastId     = (int) $request->query('last_id', 0);
    $lastStatus = (string) $request->query('last_status', '');

    $latestOrder = Order::latest('id')->first();

    $latestId     = $latestOrder?->id ?? 0;
    $latestStatus = $latestOrder?->status ?? '';

    return response()->json([
        'has_new'        => $latestId > $lastId,
        'status_changed' => $latestStatus !== '' && $lastStatus !== '' && $latestStatus !== $lastStatus,
        'latest_id'      => $latestId,
        'latest_status'  => $latestStatus,
    ]);
}

}
