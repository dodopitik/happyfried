@extends('admin.layout.master')
@section('title', 'Dashboard')

@section('content')
    <div class="card">
        <div class="card-body text-center">

            <h5 class="mb-3">Scan QRIS untuk Membayar Fee</h5>
            <p class="text-muted">Total Pembayaran: <b>Rp {{ number_format($monthlyFee, 0, ',', '.') }}</b></p>
            <img src="{{ asset('assets/admin/static/images/qr/qr.jpg') }}" alt="QRIS Payment" class="img-fluid mb-3"
                style="max-width: 280px;">


            <p class="text-muted">
                Setelah bayar, kirim bukti pembayaran ke Developer Archana
            </p>

            <a href="/dashboard" class="btn btn-primary btn-lg mt-3">
                Kembali
            </a>
        </div>
    </div>
@endsection
