@extends('layouts.user')

@section('title', 'Detail Dompet Digital Dana')

@section('content')
<div class="min-h-screen bg-white flex items-center justify-center">
    <div class="max-w-4xl bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="px-6 py-8">
            <div class="flex justify-between items-center">
                <h2 class="text-3xl font-bold text-gray-800">Detail Dompet Digital Dana</h2>
                <span class="text-yellow-500"><i class="fas fa-star"></i> 4.5</span>
            </div>
            <p class="mt-4 text-gray-600 leading-relaxed">
                Dana adalah salah satu dompet digital terkemuka di Indonesia yang didirikan pada tahun 2017. Dana menawarkan berbagai kemudahan dalam melakukan transaksi keuangan sehari-hari. Dengan Dana, pengguna dapat melakukan pembayaran tagihan, transfer uang, pembelian pulsa dan paket data, serta transaksi online lainnya dengan cepat dan aman.
            </p>
            <div class="mt-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Keunggulan Dana:</h3>
                <ul class="list-disc list-inside text-gray-600 leading-relaxed">
                    <li>Kemudahan dalam proses transaksi harian</li>
                    <li>Keamanan yang terjamin</li>
                    <li>Integrasi dengan berbagai layanan digital lainnya</li>
                </ul>
            </div>
            <div class="mt-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Kekurangan Dana:</h3>
                <p class="text-gray-600 leading-relaxed">- Belum mendukung beberapa fitur lanjutan seperti investasi atau kartu kredit.</p>
            </div>
            <div class="mt-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Pencipta Dana:</h3>
                <p class="text-gray-600 leading-relaxed">Dana didirikan oleh PT Espay Debit Indonesia Koe pada tahun 2017.</p>
            </div>
        </div>
        <div class="px-6 py-4 bg-gray-100 text-right">
            <a href="https://play.google.com/store/apps/details?id=id.dana" class="text-blue-600 font-semibold hover:underline" target="_blank">Download di Play Store</a>
            <a href="https://www.dana.id" class="ml-4 text-blue-600 font-semibold hover:underline" target="_blank">Kunjungi Website</a>
            <a href="/" class="ml-4 text-blue-600 font-semibold hover:underline">Kembali</a>
        </div>
    </div>
</div>
@endsection
