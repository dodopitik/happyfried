@extends('customer.layout.master')
@section('title', 'Pesanan Berhasil')
@section('content')
    <div class="container-fluid py-5 d-flex justify-content-center">
        <div class="receipt border p-4 bg-white shadow" style="width: 450px; margin-top:5rem">
            <h5 class="text-center mb-2"> Pesanan berhasil dibuat </h5>
            @if ($order->payment_method == 'cash' && $order->status == 'pending')
                <p class="text-center"> <span class="badge bg-danger"> Silahkan bayar pesanan anda secara tunai kepada
                        kasir.</span></p>
            @elseif($order->payment_method == 'qris' && $order->status == 'pending')
                <p class="text-center"><span class="badge bg-danger"> Silahkan lakukan pembayaran dengan scan QRIS di bawah
                        ini.</span> </p>
            @else
                <p class="text-center"><span class="badge bg-success">Pembayaran berhasil !</span></p>
            @endif
            <hr>
            <h4 class="fw-bold text-center"> Kode bayar: <br> <span class="text-primary">{{ $order->order_code }}</span>
            </h4>
            <hr>
            <h5 class="mb-3 text-center">Detail Pesanan</h5>
            <table class="table table-borderless">
                <tbody>
                    @foreach ($orderItems as $orderItem)
                        <tr>
                            <td>{{ Str::limit($orderItem->item->name, 25) }} (x{{ $orderItem->quantity }})</td>
                            <td class="text-end">
                                Rp{{ number_format($orderItem->price, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td>Sub Total</td>
                        <td class="text-end">Rp{{ number_format($order->subtotal, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td>Tax 11%</td>
                        <td class="text-end">Rp{{ number_format($order->tax, 0, ',', '.') }}</td>
                    </tr>
                    <tr class="border-top">
                        <th>Total</th>
                        <th class="text-end">Rp{{ number_format($order->grandtotal, 0, ',', '.') }}</th>
                    </tr>
                </tbody>
            </table>

            @if ($order->payment_method == 'cash')
                <p class="small text-center"> Tunjukkan kode bayar ini ke kasir untuk menyelesaikan pesanan , terimakasih
                    sudah mengunjungi happyfried semoga sehat selalu :) !!</p>
            @elseif($order->payment_method == 'qris')
                <p class="small text-center"> Pesananmu sedang di buat, mohon untuk menunggu. terimakasih
                    sudah mengunjungi happyfried semoga sehat selalu :) !!</p>
            @endif
            <hr>
            <a href="{{ route('menu') }}?meja={{ $order->table_number }}" class="btn btn-primary w-100"> Kembali ke
                Menu</a>


        </div>
    </div>
@endsection
