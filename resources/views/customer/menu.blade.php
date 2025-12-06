@extends('customer.layout.master')

@section('content')
    <div class="container-fluid fruite py-5">
        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Menu Kami</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item active text-light">Silakan pilih menu favorit anda</li>
            </ol>
        </div>
        <!-- Single Page Header End -->
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="row g-4">
                        <div class="col-lg">
                            <div class="row g-4 justify-content-center ">
                                <div class="mb-4 py-2 overflow-auto" id="categoryFilters">
                                    <div class="d-flex flex-nowrap gap-2">
                                        <span
                                            class="badge bg-primary border border-dark text-white px-3 py-2 filter-btn active cursor-pointer"
                                            data-category="all">
                                            Semua
                                        </span>
                                        <span
                                            class="badge bg-kuning border border-dark text-white px-3 py-2 filter-btn cursor-pointer"
                                            data-category="Makanan">
                                            Makanan
                                        </span>
                                        <span
                                            class="badge bg-happy border border-dark text-white px-3 py-2 filter-btn cursor-pointer"
                                            data-category="Minuman">
                                            Minuman
                                        </span>
                                        <span
                                            class="badge bg-orange border border-dark text-white px-3 py-2 filter-btn cursor-pointer"
                                            data-category="Snack">
                                            Snack
                                        </span>
                                    </div>
                                </div>
                                @foreach ($items as $item)
                                    <div class="col-6 col-md-6 col-lg-6 col-xl-4 menu-card mb-4"
                                        data-category="{{ $item->category->category_name }}">

                                        {{-- CARD UTAMA FLEX COLUMN & FULL HEIGHT --}}
                                        <div
                                            class="rounded position-relative fruite-item border border-happy border-top-0 rounded-bottom h-100 d-flex flex-column">

                                            {{-- GAMBAR (TIDAK BOLEH MENGECIL) --}}
                                            <div class="fruite-img flex-shrink-0">
                                                <img src="{{ asset('img_item_upload/' . $item->image) }}"
                                                    class="img-fluid w-100 rounded-top" alt="{{ $item->name }}"
                                                    onerror="this.onerror=null;this.src='{{ asset('images/default.png') }}';">
                                            </div>

                                            {{-- LABEL KATEGORI --}}
                                            <div class="text-white px-3 py-1 rounded position-absolute 
                @if ($item->category->category_name == 'Makanan') bg-warning
                @elseif ($item->category->category_name == 'Minuman') bg-happy
                @elseif ($item->category->category_name == 'Snack') bg-orange
                @else bg-green @endif"
                                                style="top: 10px; left: 10px;">
                                                {{ $item->category->category_name }}
                                            </div>

                                            {{-- KONTEN BAWAH FLEX COLUMN + GROW --}}
                                            <div class="p-4 d-flex flex-column flex-grow-1">
                                                <h4>{{ $item->name }}</h4>
                                                <p class="text-dark fs-5 fw-bold mb-3">
                                                    {{ 'Rp' . number_format($item->price, 0, ',', '.') }}
                                                </p>

                                                {{-- TOMBOL DITORONG KE PALING BAWAH --}}
                                                <a href="#"
                                                    onclick="event.preventDefault(); addToCart({{ $item->id }})"
                                                    class="btn border border-secondary rounded-pill px-3 py-2 text-happy w-100 d-flex justify-content-center align-items-center mt-auto">
                                                    <i class="fa fa-shopping-bag me-2 text-happy"></i>
                                                    Add
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @php
            $cart = session('cart', []);
            $count = $cart ? array_sum(array_column($cart, 'qty')) : 0;
        @endphp

        <div id="stickyCartBar" class="sticky-cart-bar" style="{{ $count > 0 ? '' : 'display:none;' }}">
            <div class="sticky-cart-inner">
                <div class="sticky-cart-info">
                    <i class="fa fa-shopping-cart text-happy" style="font-size: 2rem;"></i>
                    <div>
                        <div>Barang di keranjang</div>
                        <div class="sticky-cart-count">
                            <span id="stickyCartCount">{{ $count }}</span> item
                        </div>
                    </div>
                </div>

                <a href="{{ route('cart') }}" class="sticky-cart-btn">
                    Checkout
                </a>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script>
        // Mixin toast biar konsisten
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1600,
            timerProgressBar: true
        });

        function addToCart(menuId) {
            fetch("/cart/add", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        id: menuId
                    })
                })
                .then(async (response) => {
                    const data = await response.json();

                    if (!response.ok) {
                        // contoh: 404 Menu tidak ditemukan
                        Toast.fire({
                            icon: 'error',
                            title: data.success || 'Gagal menambahkan.'
                        });
                        return;
                    }

                    // hitung total qty dari cart (server kirim data.cart)
                    const cart = data.cart || {};
                    const count = Object.values(cart).reduce(
                        (sum, item) => sum + (item.qty || 0),
                        0
                    );

                    // 🔹 update badge di icon cart atas
                    const badge = document.getElementById("cartBadge");
                    if (badge) {
                        badge.textContent = count;
                        badge.style.display = count > 0 ? "inline-block" : "none";
                        badge.animate(
                            [{
                                    transform: 'scale(1)'
                                },
                                {
                                    transform: 'scale(1.15)'
                                },
                                {
                                    transform: 'scale(1)'
                                }
                            ], {
                                duration: 200,
                                easing: 'ease-out'
                            }
                        );
                    }

                    // 🔹 update sticky checkout bar bawah (REALTIME)
                    const stickyBar = document.getElementById("stickyCartBar");
                    const stickyCount = document.getElementById("stickyCartCount");

                    if (stickyBar && stickyCount) {
                        stickyCount.textContent = count;

                        if (count > 0) {
                            // kalau awalnya hidden, tampilkan
                            stickyBar.style.display = "block";
                            stickyBar.animate(
                                [{
                                        transform: 'translateY(100%)',
                                        opacity: 0
                                    },
                                    {
                                        transform: 'translateY(0)',
                                        opacity: 1
                                    }
                                ], {
                                    duration: 200,
                                    easing: 'ease-out'
                                }
                            );
                        } else {
                            // kalau kosong lagi, sembunyikan
                            stickyBar.style.display = "none";
                        }
                    }

                    // ✅ toast sukses
                    Toast.fire({
                        icon: 'success',
                        title: data.success || 'Berhasil ditambahkan ke keranjang!'
                    });
                })
                .catch(err => {
                    console.error("Error:", err);
                    // ❌ toast error jaringan
                    Toast.fire({
                        icon: 'error',
                        title: err.message || 'Terjadi kesalahan.'
                    });
                });
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const cards = document.querySelectorAll('.menu-card');

            filterButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    const category = btn.getAttribute('data-category');

                    // styling aktif badge
                    filterButtons.forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');

                    // show/hide item
                    cards.forEach(card => {
                        const cardCat = card.getAttribute('data-category');

                        if (category === 'all' || cardCat === category) {
                            card.style.display = '';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
    <script>
        // Ambil semua elemen dengan class .filter-btn
        const filterButtons = document.querySelectorAll('.filter-btn');

        // Loop setiap tombol kategori
        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Hapus class 'active' dari semua tombol
                filterButtons.forEach(btn => btn.classList.remove('active'));

                // Tambahkan class 'active' ke tombol yang diklik
                button.classList.add('active');

                // (Opsional) Ambil kategori yang diklik
                const category = button.getAttribute('data-category');
                console.log("Kategori aktif:", category);

                // (Opsional) kamu bisa panggil fungsi filter di sini
                // filterItems(category);
            });
        });
    </script>
@endsection
