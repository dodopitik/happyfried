@extends('customer.layout.master')
@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Keranjang Anda</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item active text-primary">Silakan konfirmasi kembali pesanan anda</li>
        </ol>
    </div>
    <!-- Single Page Header End -->
    <!-- Cart Page Start -->
    <div class="container-fluid py-5 bg-black">
        <div class="container py-5">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (empty($cart))
                <div class="alert alert-info" role="alert">
                    Keranjang Anda kosong. Silakan tambahkan item ke keranjang.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Gambar</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Total</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $subtotal = 0;
                            @endphp
                            @foreach ($cart as $item)
                                @php
                                    $itemTotal = $item['price'] * $item['qty'];
                                    $subtotal += $itemTotal;
                                @endphp
                                <tr class="align-middle">
                                    <td>
                                        <img src="{{ asset('img_item_upload/' . $item['image']) }}"
                                            class="img-fluid rounded-circle" style="width: 80px; height: 80px;"
                                            alt="{{ $item['name'] }}"
                                            onerror="this.onerror=null;this.src='{{ $item['image'] }}';">
                                    </td>
                                    <td>{{ $item['name'] }}</td>
                                    <td>Rp{{ number_format($item['price'], 0, ',', '.') }}</td>
                                    {{-- <td>{{ $item['qty'] }}</td> --}}
                                    <td>
                                        <div class="input-group quantity mt-4" style="width: 100px;">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-minus rounded-circle bg-light border"
                                                    onclick="updateQuantity({{ $item['id'] }}, -1)">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input id="qty-{{ $item['id'] }}" type="text"
                                                class="form-control form-control-sm text-center border-0 bg-transparent"
                                                value="{{ $item['qty'] }}" readonly>
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-plus rounded-circle bg-light border"
                                                    onclick="updateQuantity({{ $item['id'] }}, 1)">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Rp{{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#confirmDeleteModal" data-item-id="{{ $item['id'] }}">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @php
                    $tax = $subtotal * 0.11;
                    $total = $subtotal + $tax;
                @endphp

                <div class="d-flex justify-content-end">
                    <a href="{{ route('cart.clear') }}" class="btn btn-danger"
                        onclick="return confirm('Apakah Anda yakin ingin mengosongkan keranjang?')">Kosongkan Keranjang</a>
                </div>
                <div class="row g-4 justify-content-end mt-1">
                    <div class="col-8"></div>
                    <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                        <div class="bg-light rounded">
                            <div class="p-4">
                                <h3 class="fw-bold mb-4">Total <span class="fw-normal">Pesanan</span></h3>
                                <div class="d-flex justify-content-between mb-4">
                                    <h5 class="mb-0 me-4">Subtotal</h5>
                                    <p class="mb-0">Rp{{ number_format($subtotal, 0, ',', '.') }}</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="mb-0 me-4">PPN (11%)</p>
                                    <div class="">
                                        <p class="mb-0">Rp{{ number_format($tax, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="py-4 mb-4 border-top d-flex justify-content-between">
                                <h4 class="mb-0 ps-4 me-4">Total</h4>
                                <h5 class="mb-0 pe-4">Rp{{ number_format($total, 0, ',', '.') }}</h5>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <div class="mb-0">
                                <a href="{{ route('checkout') }}"
                                    class="btn border-secondary py-3 text-primary text-uppercase mb-4" type="button">Lanjut
                                    ke Pembayaran</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- Cart Page End -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title text-white" id="confirmDeleteLabel">Hapus Item</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Tutup"></button>
                </div>

                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus item ini dari keranjang?
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">
                        Ya, hapus
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function updateQuantity(itemId, change) {
            var qtyInput = document.getElementById('qty-' + itemId);
            var currentQty = parseInt(qtyInput.value);
            var newQty = currentQty + change;

            if (newQty <= 0) {
                // Simpan ID item yang mau dihapus
                itemToDelete = itemId;

                // Tampilkan modal hapus
                const deleteModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
                deleteModal.show();

                // Hentikan fungsi sampai user konfirmasi
                return;
            }
            fetch("{{ route('cart.update') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        id: itemId,
                        qty: newQty
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        qtyInput.value = newQty;
                        location.reload();
                    } else {
                        alert('Gagal memperbarui jumlah item.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat mengupdate item.');
                });
        }

        function removeItemFromCart(itemId, newQty) {
            fetch("{{ route('cart.remove') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        id: itemId,
                        qty: newQty,
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert('Gagal menghapus item dari keranjang.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat menghapus item.');
                });
        }
    </script>
    <script>
        // id item yang mau dihapus, kita simpan sementara di sini
        let itemToDelete = null;

        // Saat modal mau ditampilkan
        const deleteModal = document.getElementById('confirmDeleteModal');
        deleteModal.addEventListener('show.bs.modal', function(event) {
            // button yang diklik user
            const button = event.relatedTarget;
            // ambil data-id dari tombol
            itemToDelete = button.getAttribute('data-item-id');
        });

        // Saat user klik "Ya, hapus"
        const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
        confirmDeleteBtn.addEventListener('click', function() {
            if (itemToDelete) {
                removeItemFromCart(itemToDelete); // fungsi kamu yang sudah ada
            }

            // Tutup modal setelah aksi
            const modal = bootstrap.Modal.getInstance(deleteModal);
            modal.hide();
        });
    </script>
@endsection
