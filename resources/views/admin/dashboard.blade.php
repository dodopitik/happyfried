@extends('admin.layout.master')
@section('title', 'Dashboard')

@section('content')
    <div class="page-heading">
        <h3>Selamat Datang, {{ Auth::user()->fullname }}!</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon purple mb-2">
                                            <i class="iconly-boldWallet"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Pesanan Hari Ini</h6>
                                        <h6 class="font-extrabold mb-0">{{ $todayOrders }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon blue">
                                            <i class="iconly-boldBuy"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Pendapatan Hari Ini</h6>
                                        <h6 class="font-extrabold mb-0">
                                            {{ 'Rp ' . number_format($todayRevenue, 0, ',', '.') }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon blue">
                                            <i class="iconly-boldBuy"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Jumlah pesanan</h6>
                                        <h6 class="font-extrabold mb-0">{{ $totalOrders }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon green mb-2">
                                            <i class="iconly-boldFolder"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Total Pendapatan</h6>
                                        <h6 class="font-extrabold mb-0">
                                            {{ 'Rp ' . number_format($totalRevenue, 0, ',', '.') }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon purple mb-2">
                                            <i class="iconly-boldCalendar"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Pesanan Bulan Ini</h6>
                                        <h6 class="font-extrabold mb-0">{{ $monthlyOrders }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon red mb-2">
                                            <i class="iconly-boldDownload"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Pesanan Pending</h6>
                                        <h6 class="font-extrabold mb-0">{{ $pendingCount }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon purple mb-2">
                                            <i class="iconly-boldCalendar"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Tagihan Fee Bulan lalu</h6>
                                        <h6 class="font-extrabold mb-1">
                                            {{ $lastMonthlyOrders }} x 1000 =
                                            Rp {{ number_format($lastMonthlyFee, 0, ',', '.') }}
                                        </h6>
                                        {{-- Tombol bayar --}}
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon purple mb-2">
                                            <i class="iconly-boldCalendar"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Tagihan Fee Bulan Ini</h6>
                                        <h6 class="font-extrabold mb-1">
                                            {{ $monthlyOrders }} x 1000 =
                                            Rp {{ number_format($monthlyFee, 0, ',', '.') }}
                                        </h6>
                                        {{-- Tombol bayar --}}
                                        <a href="{{ route('admin.pay.qris') }}" class="btn btn-primary btn-sm mt-2 w-80">
                                            Bayar Sekarang
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3">
                        <div class="card">
                            <div class="card-header">
                                <h4>Status Pesanan</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="statusChart" height="220"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="card">
                            <div class="card-header">
                                <h4>Trend Penjualan 7 Hari Terakhir</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="trendChart" height="220"></canvas>
                            </div>
                        </div>
                    </div>
                    {{-- (Opsional) Nanti bisa isi col-6 lainnya untuk chart lain --}}

                    <div class="col-6 col-lg-3">
                        <div class="card">
                            <div class="card-header">
                                <h4>Menu Terlaris (Top 5)</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="topMenuChart" height="220"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="card">
                            <div class="card-header">
                                <h4>Revenue 7 Hari Terakhir</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="revenueChart" height="220"></canvas>
                            </div>
                        </div>
                    </div>





                </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script>
        // Pendapatan harian
        const revenueLabels = {!! json_encode($revenueLabels) !!};
        const revenueData = {!! json_encode($revenueData) !!};

        new Chart(document.getElementById('revenueChart'), {
            type: 'bar',
            data: {
                labels: revenueLabels,
                datasets: [{
                    label: 'Pendapatan (Rp)',
                    data: revenueData,
                    borderWidth: 2,
                    backgroundColor: 'rgba(255, 171, 64, 0.8)', // gold-ish
                    borderColor: 'rgba(255, 171, 64, 1)'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let value = context.raw;
                                return new Intl.NumberFormat('id-ID', {
                                    style: 'currency',
                                    currency: 'IDR',
                                    minimumFractionDigits: 0
                                }).format(value);
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value, index, values) {
                                return 'Rp ' + value.toLocaleString('id-ID');
                            }
                        }
                    }
                }
            }
        });
    </script>
    <script>
        const trendLabels = {!! json_encode($trendLabels) !!};
        const trendData = {!! json_encode($trendData) !!};

        new Chart(document.getElementById('trendChart'), {
            type: 'line',
            data: {
                labels: trendLabels,
                datasets: [{
                    label: 'Jumlah Order',
                    data: trendData,
                    borderWidth: 3,
                    borderColor: '#435ebe',
                    backgroundColor: 'rgba(67, 94, 190, 0.20)',
                    tension: 0.4, // garis smooth
                    pointBackgroundColor: '#435ebe',
                    pointBorderColor: '#fff',
                    pointRadius: 5
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    </script>
    <script>
        // Data status dari controller
        const statusLabels = ['Pending', 'Settlement', 'Cooked'];
        const statusData = [
            {{ $pendingCount }},
            {{ $settlementCount }},
            {{ $cookedCount }}
        ];

        const ctxStatus = document.getElementById('statusChart');

        new Chart(ctxStatus, {
            type: 'doughnut',
            data: {
                labels: statusLabels,
                datasets: [{
                    data: statusData,
                    backgroundColor: [
                        '#ff7976', // Pending
                        '#435ebe', // Settlement
                        '#4caf50', // Cooked
                    ],
                    borderColor: '#ffffff',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                cutout: '60%', // bikin jadi donut, bukan pie full
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.raw || 0;
                                return `${label}: ${value} pesanan`;
                            }
                        }
                    }
                }
            }
        });
    </script>
    <script>
        // Pastikan datanya ada, kalau tidak, kita fallback ke array kosong
        const topMenuLabels = {!! json_encode($topMenuNames ?? []) !!};
        const topMenuData = {!! json_encode($topMenuQty ?? []) !!};

        const ctxTopMenu = document.getElementById('topMenuChart').getContext('2d');

        if (topMenuLabels.length > 0) {
            new Chart(ctxTopMenu, {
                type: 'bar',
                data: {
                    labels: topMenuLabels,
                    datasets: [{
                        label: 'Jumlah Terjual',
                        data: topMenuData,
                        borderWidth: 1,
                        backgroundColor: 'rgba(67, 94, 190, 0.7)', // biru mazer-ish
                        borderColor: 'rgba(67, 94, 190, 1)'
                    }]
                },
                options: {
                    indexAxis: 'y', // <-- ini yang bikin horizontal bar
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: true
                        }
                    },
                    scales: {
                        x: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        }
                    }
                }
            });
        } else {
            // Kalau belum ada data, bisa kamu tulis info di console:
            console.log('Belum ada data menu terlaris.');
        }
    </script>

@endsection
