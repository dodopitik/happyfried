@extends('admin.layout.master')

@section('title', 'Edit User')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="col-md-6 col-12">
                <h3>Edit User Karyawan</h3>
                <p class="text-subtitle text-muted"> Disini adalah form untuk mengedit User karyawan</p>
            </div>
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="form" action="{{ route('users.update', $users->id) }}" id="userForm" method="POST"
                        novalidate>
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row ">
                                <div class=" ">
                                    <div class="col-md-6 col-12">
                                        <div class="card">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <form class="form form-horizontal">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label for="first-name-horizontal-icon">Username</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="form-group has-icon-left">
                                                                        <div class="position-relative">
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Username" id="username"
                                                                                name="username"
                                                                                value="{{ old('username', $users->username) }}">
                                                                            <div class="form-control-icon">
                                                                                <i class="bi bi-person"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="first-name-horizontal-icon">Fullname</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="form-group has-icon-left">
                                                                        <div class="position-relative">
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Fullname" id="fullname"
                                                                                name="fullname"
                                                                                value="{{ old('fullname', $users->fullname) }}">
                                                                            <div class="form-control-icon">
                                                                                <i class="bi bi-person"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="email-horizontal-icon">Email</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="form-group has-icon-left">
                                                                        <div class="position-relative">
                                                                            <input type="email" class="form-control"
                                                                                placeholder="Email" id="email"
                                                                                name="email"
                                                                                value="{{ old('email', $users->email) }}">
                                                                            <div class="form-control-icon">
                                                                                <i class="bi bi-envelope"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="contact-info-horizontal-icon">Phone</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="form-group has-icon-left">
                                                                        <div class="position-relative">
                                                                            <input type="tel"
                                                                                class="form-control @error('role_id') is-invalid @enderror"
                                                                                placeholder="Phone" id="phone"
                                                                                name="phone"
                                                                                value="{{ old('phone', $users->phone) }}">
                                                                            <div class="form-control-icon">
                                                                                <i class="bi bi-phone"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="contact-info-horizontal-icon">Role</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="form-group">
                                                                        <select
                                                                            class="form-select @error('role_id') is-invalid @enderror"
                                                                            id="role_id" name="role_id" required>
                                                                            <option value="" disabled selected>
                                                                                Pilih Role
                                                                            </option>
                                                                            @foreach ($roles as $role)
                                                                                <option value="{{ $role->id }}"
                                                                                    {{ old('role_id', $users->role_id) == $role->id ? 'selected' : '' }}>
                                                                                    {{ $role->role_name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="password-horizontal-icon">Password</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="form-group has-icon-left">
                                                                        <div class="position-relative">
                                                                            <input type="password" class="form-control"
                                                                                placeholder="Password" id="password"
                                                                                name="password" value="*********" disabled>

                                                                            {{-- ikon kiri (gembok) --}}
                                                                            <div class="form-control-icon">
                                                                                <i class="bi bi-lock"></i>
                                                                            </div>

                                                                            {{-- tombol show/hide di kanan --}}
                                                                            <button type="button" id="#togglePassword"
                                                                                class="btn btn-link text-secondary p-0 position-absolute top-50 end-0 translate-middle-y me-3"
                                                                                aria-label="Tampilkan password"
                                                                                aria-pressed="false">
                                                                                <i class="bi bi-eye"
                                                                                    id="togglePasswordIcon"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group d-flex justify-content-end">
                                                                    <button type="button"
                                                                        class="btn btn-primary me-1 mb-1"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#saveModal">
                                                                        Simpan
                                                                    </button>
                                                                    <button type="reset"
                                                                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                                    <button type="button"
                                                                        class="btn btn-light-danger me-1 mb-1"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#cancelModal">
                                                                        Batal
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- Modal Konfirmasi Simpan -->
    <div class="modal fade" id="saveModal" tabindex="-1" aria-labelledby="saveModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="saveModalLabel">Konfirmasi Simpan</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menyimpan data menu ini?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" form="userForm">Ya, Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Batal -->
    <div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="cancelModalLabel">Konfirmasi Pembatalan</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin membatalkan perubahan ini? Semua data yang belum disimpan akan hilang.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <a href="{{ route('users.index') }}" class="btn btn-danger">Ya, Batalkan</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('confirmSave').addEventListener('click', function() {
            document.querySelector('form').submit();
        });
    </script>
    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const input = document.getElementById('password');
            const icon = document.getElementById('togglePasswordIcon');
            const isHidden = input.type === 'password';

            input.type = isHidden ? 'text' : 'password';
            this.setAttribute('aria-pressed', isHidden ? 'true' : 'false');

            // ganti ikon eye <-> eye-slash
            icon.classList.toggle('bi-eye', !isHidden);
            icon.classList.toggle('bi-eye-slash', isHidden);
        });
    </script>
@endsection
