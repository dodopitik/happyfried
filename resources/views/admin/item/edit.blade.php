@extends('admin.layout.master')

@section('title', 'Tambah Menu')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Daftar Menu</h3>
                <p class="text-subtitle text-muted"> Disini halaman untuk mengedit daftar menu makanan dan minuman</p>
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
                    <form class="form" action="{{ route('items.update', $item->id) }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row ">
                                <div class=" ">
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Gambar Menu</label>
                                        <input class="form-control  @error('image') is-invalid @enderror" type="file"
                                            id="image" name="image" accept="image/*">

                                        {{-- Gambar lama --}}
                                        @if ($item->image)
                                            <div class="mt-2">
                                                <p>Gambar saat ini:</p>
                                                <img src="{{ asset('img_item_upload/' . $item->image) }}"
                                                    alt="{{ $item->name }}" style="max-height: 120px;">
                                            </div>
                                        @endif

                                        {{-- Preview gambar baru --}}
                                        <div class="mt-2" id="preview-container" style="display: none;">
                                            <p>Preview gambar baru:</p>
                                            <img id="preview-image" src="" style="max-height: 120px;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Nama Menu</label>
                                        <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                            id="name" placeholder="" name="name" required
                                            value="{{ old('name', $item->name) }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Deskripsi Menu</label>
                                        <textarea type="text" class="form-control  @error('description') is-invalid @enderror" id="description"
                                            placeholder="" name="description" required rows="3">{{ old('description', $item->description) }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Harga</label>
                                        <input type="number" class="form-control  @error('price') is-invalid @enderror"
                                            id="price" placeholder="" name="price" required
                                            value="{{ old('price', $item->price) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Kategori</label>
                                        <select class="form-select @error('category_id') is-invalid @enderror"
                                            id="category" name="category_id" required>
                                            <option value="" disabled selected> Pilih Menu</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id', $item->category_id) == $category->id ? 'selected' : '' }}>
                                                    {{ $category->category_name }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="is_available">Status</label>
                                        <div class="form-check form-switch mt-1">
                                            <input type="hidden" name="is_available" value="0">
                                            <input type="checkbox" class="form-check-input" id="flexSwitchCheckChecked"
                                                name="is_available" value="1"
                                                {{ old('is_available', $item->is_available) ? 'checked' : '' }}> Aktif /
                                            Tidak Aktif
                                        </div>
                                    </div>

                                    <div class="form-group d-flex justify-content-end">
                                        <button type="button" class="btn btn-primary me-1 mb-1" data-bs-toggle="modal"
                                            data-bs-target="#saveModal">
                                            Simpan
                                        </button>

                                        <button type="button" class="btn btn-light-danger me-1 mb-1" data-bs-toggle="modal"
                                            data-bs-target="#cancelModal">
                                            Batal
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>

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
                    <a href="{{ route('items.index') }}" class="btn btn-danger">Ya, Batalkan</a>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="confirmSave">Ya, Simpan</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.getElementById('confirmSave').addEventListener('click', function() {
            document.querySelector('form').submit();
        });

        document.getElementById('image').addEventListener('change', function(event) {
            const previewContainer = document.getElementById('preview-container');
            const previewImage = document.getElementById('preview-image');

            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewContainer.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                previewContainer.style.display = 'none';
                previewImage.src = '';
            }
        });
    </script>

@endsection
