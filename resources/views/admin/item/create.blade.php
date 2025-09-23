@extends('admin.layout.master')

@section('title', 'Tambah Menu')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Daftar Menu</h3>
                <p class="text-subtitle text-muted"> Disini halaman untuk menambahkan daftar menu makanan dan minuman</p>
            </div>
            <div class="card">
                <div class="card-body">
                    <form class="form" action="{{ route('items.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-body">
                            <div class="row ">
                                <div class=" ">
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Masukkan Gambar Menu</label>
                                        <input class="form-control" type="file" id="image" required name="image">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Nama Menu</label>
                                        <input type="text" class="form-control" id="name" placeholder=""
                                            name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Deskripsi Menu</label>
                                        <textarea type="text" class="form-control" id="description" placeholder="" name="description" required
                                            rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Harga</label>

                                        <input type="number" class="form-control" id="price" placeholder=""
                                            name="price" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Kategori</label>
                                        <select class="form-select" id="category" name="category_id" required>
                                            <option value="" disabled selected> Pilih Menu</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="is_available">Status</label>
                                        <div class="form-check form-switch mt-1">
                                            <input type="hidden" name="is_available" value="0">
                                            <input type="checkbox" class="form-check-input" id="flexSwitchCheckChecked"
                                                name="is_available" value="1" checked> Aktif / Tidak Aktif
                                        </div>
                                    </div>

                                    <div class="form-group d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        <a href="{{ route('items.index') }}" type="submit"
                                            class="btn btn-light-danger me-1 mb-1">Batal</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
