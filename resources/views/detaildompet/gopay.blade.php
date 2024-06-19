@extends('layouts.user')

@section('title', 'Detail Dompet Digital GoPay')

@section('content')
<div class="min-h-screen bg-white flex items-center justify-center">
    <div class="max-w-4xl bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="px-6 py-8">
            <div class="flex justify-between items-center">
                <h2 class="text-3xl font-bold text-gray-800">Detail Dompet Digital GoPay</h2>
                <span class="text-yellow-500"><i class="fas fa-star"></i> 4.7</span>
            </div>
            <p class="mt-4 text-gray-600 leading-relaxed">
                GoPay adalah dompet digital yang disediakan oleh Gojek. Diluncurkan pada tahun 2016, GoPay menawarkan berbagai kemudahan dalam melakukan pembayaran, transfer uang, pembelian pulsa dan paket data, hingga pembayaran di merchant-partner Gojek.
            </p>
            <div class="mt-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Keunggulan GoPay:</h3>
                <ul class="list-disc list-inside text-gray-600 leading-relaxed">
                    <li>Kemudahan dalam transaksi harian</li>
                    <li>Integrasi yang luas dengan layanan Gojek</li>
                    <li>Program cashback dan promo yang menarik</li>
                </ul>
            </div>
            <div class="mt-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Kekurangan GoPay:</h3>
                <p class="text-gray-600 leading-relaxed">- Tidak tersedia untuk transaksi internasional.</p>
            </div>
            <div class="mt-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Pencipta GoPay:</h3>
                <p class="text-gray-600 leading-relaxed">GoPay dikembangkan oleh PT Gojek Indonesia.</p>
            </div>
        </div>
        <div class="px-6 py-4 bg-gray-100 text-right">
            <a href="https://play.google.com/store/apps/details?id=com.gojek.app" class="text-blue-600 font-semibold hover:underline" target="_blank">Download di Play Store</a>
            <a href="https://www.gojek.com/gopay/" class="ml-4 text-blue-600 font-semibold hover:underline" target="_blank">Kunjungi Website</a>
            <a href="/" class="ml-4 text-blue-600 font-semibold hover:underline">Kembali</a>
        </div>
    </div>
</div>
@endsection
