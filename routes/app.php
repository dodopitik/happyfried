<?php

use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewOrderNotificationMail;


Route::get('/', function () {
    return redirect()->route('menu');
});

Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/cart', [MenuController::class, 'cart'])->name('cart');
Route::post('/cart/add', [MenuController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/clear', [MenuController::class, 'clearCart'])->name('cart.clear');
Route::post('/cart/update', [MenuController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/remove', [MenuController::class, 'removeCart'])->name('cart.remove');


Route::get('/checkout', [MenuController::class, 'checkout'])->name('checkout');
Route::post('/checkout/store', [MenuController::class, 'storeOrder'])->name('checkout.store');
Route::get('/checkout/success/{orderId}', [MenuController::class, 'checkoutSuccess'])->name('checkout.success');
// Route::get('/test-email', function () {
//     $order = \App\Models\Order::latest()->first();

//     if (!$order) {
//         return 'Tidak ada order di database. Buat order dulu lalu coba lagi.';
//     }

//     $items = \App\Models\OrderItem::where('order_id', $order->id)->get();

//     Mail::to(env('ORDER_NOTIFICATION_EMAIL'))->send(
//         new NewOrderNotificationMail($order, $items)
//     );

//     return 'Email test dikirim ke ' . env('ORDER_NOTIFICATION_EMAIL');
// });

// adminroutes

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
Route::get('/admin/pay-qris', [PaymentController::class, 'qris'])
    ->name('admin.pay.qris');

    // Kalau ada aksi Item/Category yang benar-benar khusus admin, atur via policy/gate
});

Route::middleware(['auth', 'role:admin|cashier'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('items', ItemController::class);
});

Route::middleware(['auth', 'role:admin|cashier|chef'])->group(function () {
    Route::post('orders/{order}', [OrderController::class, 'settlement'])->name('orders.settlement');
    Route::post('orders/{order}/cooked', [OrderController::class, 'cooked'])->name('orders.cooked');

    // ➕ tambahkan ini
    Route::get('orders/check-new', [OrderController::class, 'checkNew'])
        ->name('orders.checkNew');

    Route::get('orders/poll', [OrderController::class, 'poll'])
        ->name('orders.poll');

    Route::resource('orders', OrderController::class);
    Route::get('orders/{order}/print', [OrderController::class, 'print'])->name('orders.print');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});



