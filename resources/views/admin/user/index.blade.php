@extends('admin.layout.master')
@section('title', 'User')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endsection

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Manajemen User</h3>
                    <p class="text-subtitle text-muted"> Disini halaman untuk menambahkan User Karyawan</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">User</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body ">
                    <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                        <div class="dataTable-container">
                            <table class="table table-striped" id="table1">
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('users.create') }}" class="btn btn-primary "> + Tambah User </a>
                                </div>
                                <thead class="">
                                    <tr class="">
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Fullname</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td> {{ $loop->iteration }}</td>
                                            <td> {{ $user['username'] }}</td>
                                            <td> {{ $user['password'] }} </td>
                                            <td> {{ $user['fullname'] }} </td>
                                            <td> {{ $user['phone'] }} </td>
                                            <td> {{ $user['email'] }} </td>
                                            <td>{{ $user->role->role_name ?? '-' }}</td>
                                            <td>
                                                <a href="{{ route('users.edit', $user->id) }}"
                                                    class="btn btn-warning btn-sm"> <i class="bi bi-pencil">Edit</i></a>


                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                    class="d-inline form-delete" data-name="{{ $user->name }}">
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
