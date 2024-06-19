@extends('layouts.user')

@section('title', 'Detail Dompet Digital LinkAja')

@section('content')
<div class="min-h-screen bg-white flex items-center justify-center">
    <div class="max-w-4xl bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="px-6 py-8">
            <div class="flex justify-between items-center">
                <h2 class="text-3xl font-bold text-gray-800">Detail Dompet Digital LinkAja</h2>
                <span class="text-yellow-500"><i class="fas fa-star"></i> 4.4</span>
            </div>
            <p class="mt-4 text-gray-600 leading-relaxed">
                LinkAja adalah dompet digital yang dikembangkan oleh PT Fintek Karya Nusantara. Diluncurkan pada tahun 2017, LinkAja menawarkan kemudahan dalam melakukan pembayaran, transfer uang, pembelian pulsa, hingga penggunaan di berbagai merchant mitra.
            </p>
            <div class="mt-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Keunggulan LinkAja:</h3>
                <ul class="list-disc list-inside text-gray-600 leading-relaxed">
                    <li>Integrasi dengan berbagai merchant dan aplikasi mitra</li>
                    <li>Fitur pengelolaan keuangan yang lengkap</li>
                    <li>Kemudahan dalam transfer uang dan pembayaran online</li>
                </ul>
            </div>
            <div class="mt-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Kekurangan LinkAja:</h3>
                <p class="text-gray-600 leading-relaxed">- Belum sepenuhnya terintegrasi dengan beberapa sistem e-commerce besar.</p>
            </div>
            <div class="mt-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Pencipta LinkAja:</h3>
                <p class="text-gray-600 leading-relaxed">LinkAja dikembangkan oleh PT Fintek Karya Nusantara.</p>
            </div>
        </div>
        <div class="px-6 py-4 bg-gray-100 text-right">
            <a href="https://play.google.com/store/apps/details?id=pt.finaccel.kreditkita" class="text-blue-600 font-semibold hover:underline" target="_blank">Download di Play Store</a>
            <a href="https://www.linkaja.id" class="ml-4 text-blue-600 font-semibold hover:underline" target="_blank">Kunjungi Website</a>
            <a href="/" class="ml-4 text-blue-600 font-semibold hover:underline">Kembali</a>
        </div>
    </div>
</div>
@endsection
