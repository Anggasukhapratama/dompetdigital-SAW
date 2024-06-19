@extends('layouts.user')

@section('title', 'Detail Dompet Digital Shopee Pay')

@section('content')
<div class="min-h-screen bg-white flex items-center justify-center">
    <div class="max-w-4xl bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="px-6 py-8">
            <div class="flex justify-between items-center">
                <h2 class="text-3xl font-bold text-gray-800">Detail Dompet Digital Shopee Pay</h2>
                <span class="text-yellow-500"><i class="fas fa-star"></i> 4.6</span>
            </div>
            <p class="mt-4 text-gray-600 leading-relaxed">
                Shopee Pay adalah dompet digital yang disediakan oleh Shopee. Diluncurkan pada tahun 2015, Shopee Pay memudahkan penggunanya untuk melakukan pembayaran, transfer uang, pembelian voucher, dan transaksi online lainnya di platform Shopee.
            </p>
            <div class="mt-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Keunggulan Shopee Pay:</h3>
                <ul class="list-disc list-inside text-gray-600 leading-relaxed">
                    <li>Integrasi langsung dengan platform e-commerce Shopee</li>
                    <li>Program promo dan diskon yang menarik</li>
                    <li>Kemudahan dalam pengelolaan transaksi online</li>
                </ul>
            </div>
            <div class="mt-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Kekurangan Shopee Pay:</h3>
                <p class="text-gray-600 leading-relaxed">- Terbatas dalam ekosistem Shopee, belum terintegrasi dengan layanan lain.</p>
            </div>
            <div class="mt-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Pencipta Shopee Pay:</h3>
                <p class="text-gray-600 leading-relaxed">Shopee Pay dikembangkan oleh PT Shopee International Indonesia.</p>
            </div>
        </div>
        <div class="px-6 py-4 bg-gray-100 text-right">
            <a href="https://play.google.com/store/apps/details?id=com.shopee.id" class="text-blue-600 font-semibold hover:underline" target="_blank">Download di Play Store</a>
            <a href="https://shopee.co.id/m/shopee-pay" class="ml-4 text-blue-600 font-semibold hover:underline" target="_blank">Kunjungi Website</a>
            <a href="/" class="ml-4 text-blue-600 font-semibold hover:underline">Kembali</a>
        </div>
    </div>
</div>
@endsection
