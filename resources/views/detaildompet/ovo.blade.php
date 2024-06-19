@extends('layouts.user')

@section('title', 'Detail Dompet Digital OVO')

@section('content')
<div class="min-h-screen bg-white flex items-center justify-center">
    <div class="max-w-4xl bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="px-6 py-8">
            <div class="flex justify-between items-center">
                <h2 class="text-3xl font-bold text-gray-800">Detail Dompet Digital OVO</h2>
                <span class="text-yellow-500"><i class="fas fa-star"></i> 4.6</span>
            </div>
            <p class="mt-4 text-gray-600 leading-relaxed">
                OVO adalah salah satu dompet digital terkemuka di Indonesia yang didirikan pada tahun 2017. OVO menawarkan berbagai kemudahan dalam melakukan pembayaran, transfer uang, pembelian voucher, hingga transaksi di merchant mitra OVO.
            </p>
            <div class="mt-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Keunggulan OVO:</h3>
                <ul class="list-disc list-inside text-gray-600 leading-relaxed">
                    <li>Program cashback dan promo yang menarik</li>
                    <li>Kemudahan dalam penggunaan aplikasi</li>
                    <li>Integrasi yang luas dengan merchant dan aplikasi lainnya</li>
                </ul>
            </div>
            <div class="mt-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Kekurangan OVO:</h3>
                <p class="text-gray-600 leading-relaxed">- Tidak tersedia untuk transaksi internasional.</p>
            </div>
            <div class="mt-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Pencipta OVO:</h3>
                <p class="text-gray-600 leading-relaxed">OVO dikembangkan oleh PT Visionet Internasional.</p>
            </div>
        </div>
        <div class="px-6 py-4 bg-gray-100 text-right">
            <a href="https://play.google.com/store/apps/details?id=ovo.id" class="text-blue-600 font-semibold hover:underline" target="_blank">Download di Play Store</a>
            <a href="https://www.ovo.id" class="ml-4 text-blue-600 font-semibold hover:underline" target="_blank">Kunjungi Website</a>
            <a href="/" class="ml-4 text-blue-600 font-semibold hover:underline">Kembali</a>
        </div>
    </div>
</div>
@endsection
