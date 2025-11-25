@include('customer.layout.__header')


<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    {{-- navbar start --}}
    @include('customer.layout.__navbar')
    {{-- navbar end --}}



    <!-- Fruits Shop Start-->
    @yield('content')
    <!-- Fruits Shop End-->


    <!-- Copyright Start -->
    <div class="container-fluid copyright bg-happy py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <span class="text-light"><a href="#" class="text-info"><i
                                class="fas fa-copyright text-light me-2 text-info"></i>Happy Living</a> <span
                            id="currentYear"></span>. All right reserved.</span>
                </div>
                <div class="col-md-6 my-auto text-center text-md-end text-white">
                    <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                    <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                    <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                    Designed By <a class="border-bottom text-happy" href="https://www.instagram.com/braditamaa/" target="_blank" 
   rel="noopener noreferrer">Braditams</a> Distributed By <a
                        class="border-bottom text-happy" href="https://archana.co.id" target="_blank" 
   rel="noopener noreferrer">Archana Order APP</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->

    {{-- footer --}}
    {{-- @include('customer.layout.__footer') --}}
    {{-- footer end --}}

    <!-- Back to Top -->
    {{-- <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i
            class="fa fa-arrow-up"></i></a> --}}



    <!-- JavaScript Libraries -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/customer/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/customer/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/customer/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('assets/customer/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets/customer/js/main.js') }}"></script>

    <script>
        document.getElementById('currentYear').textContent = new Date().getFullYear();
    </script>
    @yield('scripts')
</body>

</html>
