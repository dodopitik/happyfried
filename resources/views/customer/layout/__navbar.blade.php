<!-- Navbar start -->
<div class="container-fluid fixed-top shadow-sm">
    <div class="container px-0">
        <nav class="navbar navbar-light bg-black text-white navbar-expand-xl  "> <a href="{{ route('menu') }}"
                class="navbar-brand">
                <h1 class="text-happy display-6 ">Archana Order</h1>
            </a>
            {{-- @php
                    $cart = session('cart', []);
                    $count = $cart ? array_sum(array_column($cart, 'qty')) : 0;
                @endphp
                <div class="d-flex m-3 me-0">
                    <a href="{{ route('cart') }}" class="position-relative me-4 my-auto">
                        <i class="fa fa-shopping-bag fa-2x text-happy"></i>
                        <span id="cartBadge"
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                            style="min-width:20px;font-size:.7rem;padding:.25em .45em;{{ $count ? '' : 'display:none;' }}">
                            {{ $count }}
                        </span> </a>
                </div> --}}
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-happy"></span>
            </button>
            <div class="collapse navbar-collapse bg-white " id="navbarCollapse">

                <div class="navbar-nav mx-auto ">
                    <a href="{{ route('menu') }}" class="nav-item nav-link">Home</a>
                    <a href="{{ route('menu') }}" class="nav-item nav-link active">Menu</a>
                    <a href="https://wa.me/62895363076706" class="nav-item nav-link">Kontak</a>
                </div>
            </div>

        </nav>
    </div>
</div>
