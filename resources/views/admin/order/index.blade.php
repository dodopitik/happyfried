@extends('admin.layout.master')
@section('title', 'Dashboard')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endsection

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Daftar Pesanan</h3>
                    <p class="text-subtitle text-muted"> Disini adalah halaman daftar pesanan </p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Daftar Pesanan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                        <div class="dataTable-container">
                            <table class="table table-striped" id="table1">
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('orders.create') }}" class="btn btn-primary "> + Tambah Menu </a>
                                </div>
                                <thead class="">
                                    <tr class="">
                                        <th>No</th>
                                        <th>Kode Pesanan</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Total</th>
                                        <th>No.Kamar</th>
                                        <th>Metode Pembayaran</th>
                                        <th>Catatan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td> {{ $loop->iteration }}</td>

                                            <td> {{ $order['order_code'] }}</td>
                                            <td> {{ $order->user->fullname }}</td>
                                            <td> Rp. {{ number_format($order['grandtotal'], 0, ',', '.') }}</td>
                                            <td> {{ $order['table_number'] }}</td>
                                            <td> {{ $order['payment_method'] }}</td>
                                            <td> {{ $order['notes'] }}</td>
                                            <td>
                                                @if ($order['status'] === 'settlement')
                                                    <span class="badge bg-success">Settlement</span>
                                                @elseif ($order['status'] === 'pending')
                                                    <span class="badge bg-warning text-dark">Pending</span>
                                                @elseif ($order['status'] === 'coocked')
                                                    <span class="badge bg-info text-dark">Coocked</span>
                                                @else
                                                    <span class="badge bg-secondary">{{ ucfirst($order['status']) }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="badge bg-primary">
                                                    <a href="{{ route('orders.show', $order->id) }}" class="text-white">
                                                        <i class="bi bi-eye"></i> Lihat
                                                    </a>
                                                </span>


                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/admin/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // init datatable (opsional)
            const t = document.querySelector('#table1');
            if (t) new simpleDatatables.DataTable(t);

            // intercept delete
            document.querySelectorAll('.form-delete').forEach(function(form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const name = form.dataset.name || 'item ini';
                    Swal.fire({
                        title: 'Hapus data?',
                        html: `Apakah Anda yakin ingin menghapus <b>${name}</b>?`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, hapus',
                        cancelButtonText: 'Batal',
                        reverseButtons: true,
                    }).then((r) => {
                        if (r.isConfirmed) {
                            // submit native; method DELETE dikirim via spoofing _method
                            HTMLFormElement.prototype.submit.call(form);
                        }
                    });
                });
            });
        });
    </script>
@endsection
