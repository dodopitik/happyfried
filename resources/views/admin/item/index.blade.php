@extends('admin.layout.master')
@section('title', 'Dashboard')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

@endsection

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Daftar Menu</h3>
                    <p class="text-subtitle text-muted"> Disini halaman untuk menambahkan daftar menu makanan dan minuman</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar Menu</li>
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
                                    <a href="{{ route('items.create') }}" class="btn btn-primary "> + Tambah Menu </a>
                                </div>
                                <thead class="">
                                    <tr class="">
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Nama Menu</th>
                                        <th>Deskripsi</th>
                                        <th>Harga</th>
                                        <th>Kategori</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td> {{ $loop->iteration }}</td>
                                            <td> <img src="{{ asset('img_item_upload/' . $item['image']) }}" width="60"
                                                    class="img-fluid rounded-circle" style="width: 80px; height: 80px;"
                                                    alt="{{ $item['name'] }}"
                                                    onerror="this.onerror=null;this.src='{{ $item['image'] }}';"></td>
                                            <td> {{ $item['name'] }}</td>
                                            <td> {{ Str::limit($item->description, 15) }}</td>
                                            <td> Rp. {{ number_format($item['price'], 0, ',', '.') }}</td>
                                            <td>
                                                @php
                                                    $labels = [
                                                        1 => 'Makanan',
                                                        2 => 'Minuman',
                                                        6 => 'Snack',
                                                    ];

                                                    $colors = [
                                                        1 => 'bg-warning',
                                                        2 => 'bg-info',
                                                        6 => 'bg-orange',
                                                    ];
                                                @endphp
                                             <span class="badge {{ $colors[$item->category_id] ?? 'bg-secondary' }}">
                                                    {{ $labels[$item->category_id] ?? 'Unknown' }}
                                                </span>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge {{ $item->is_available == 1 ? 'bg-success' : 'bg-danger' }}">
                                                    {{ $item->is_available == 1 ? 'Aktif' : 'Tidak Aktif' }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('items.edit', $item->id) }}"
                                                    class="btn btn-warning btn-sm"> <i class="bi bi-pencil">Edit</i></a>


                                                <form action="{{ route('items.destroy', $item->id) }}" method="POST"
                                                    class="d-inline form-delete" data-name="{{ $item->name }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="bi bi-trash"></i> Hapus
                                                    </button>
                                                </form>

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
