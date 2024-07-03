@extends('layouts.user')

@section('content')
    <div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold mb-4">Nilai Preferensi</h2>

        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4 animate-bounce">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-500 text-white p-4 rounded mb-4 animate-shake">
                {{ session('error') }}
            </div>
        @endif

        <p class="mb-4">Nilai preferensi ini diperoleh menggunakan metode SAW (Simple Additive Weighting). Metode SAW digunakan untuk melakukan pemilihan alternatif terbaik dari sejumlah alternatif dengan memberikan pembobotan pada setiap kriteria yang mempengaruhi hasil akhir. Berikut adalah hasil penilaiannya:</p>

        <form method="GET" action="{{ route('penilaian.cari') }}" class="bg-gray-100 p-6 rounded shadow-md">
            <div class="mb-4">
                <label for="kriteria1" class="block text-gray-700 font-semibold mb-2">Popularitas Aplikasi</label>
                <select name="kriteria1" id="kriteria1" class="block w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
                    <option value=">10 juta download">Jumlah unduhan >10 juta download</option>
                    <option value="=10 juta download">Jumlah unduhan =10 juta download</option>
                    <option value="<10 juta download">Jumlah unduhan <10 juta download</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="kriteria2" class="block text-gray-700 font-semibold mb-2">Kemudahan Fitur dan Kelengkapan Aplikasi</label>
                <select name="kriteria2" id="kriteria2" class="block w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
                    <option value="> 4,7">Rating Sangat Tinggi > 4,7</option>
                    <option value="= 4,7">Rating Tinggi = 4,7</option>
                    <option value="< 4,7">Rating Sedang < 4,7</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="kriteria3" class="block text-gray-700 font-semibold mb-2">Top Up Biaya Transaksi yang Mudah dan Murah</label>
                <select name="kriteria3" id="kriteria3" class="block w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
                    <option value="Murah">Biaya Murah</option>
                    <option value="Sedang">Biaya Sedang</option>
                    <option value="Tinggi">Biaya Tinggi</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="kriteria4" class="block text-gray-700 font-semibold mb-2">Keamanan dalam Bertransaksi</label>
                <select name="kriteria4" id="kriteria4" class="block w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
                    <option value="Sangat aman">Sangat aman</option>
                    <option value="Aman">Aman</option>
                    <option value="">Kurang aman</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="kriteria5" class="block text-gray-700 font-semibold mb-2">Promosi dan Diskon yang Lengkap</label>
                <select name="kriteria5" id="kriteria5" class="block w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
                    <option value="30%">Promosi dan diskon 30%</option>
                    <option value="20%">Promosi dan diskon 20%</option>
                    <option value="10%">Promosi dan diskon 10%</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-200">Cari</button>
        </form>

        <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @if(isset($filteredAlternatifs) && count($filteredAlternatifs) > 0)
                @foreach ($filteredAlternatifs as $alternatif)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transform hover:scale-105 transition duration-200">
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-800 flex items-center">
                                <i class="fas fa-wallet text-blue-600 mr-2"></i> {{ $alternatif['nama'] }}
                            </h3>
                            <p class="mt-2 text-gray-600">Kode: {{ $alternatif['kode'] }}</p>
                            <p class="mt-2 text-gray-600">Popularitas Aplikasi: {{ $alternatif['popularitas_aplikasi'] }}</p>
                            <p class="mt-2 text-gray-600">Kemudahan Fitur: {{ $alternatif['kemudahan_fitur'] }}</p>
                            <p class="mt-2 text-gray-600">Top Up Biaya Transaksi: {{ $alternatif['top_up_biaya_transaksi'] }}</p>
                            <p class="mt-2 text-gray-600">Keamanan dalam Bertransaksi: {{ $alternatif['keamanan_bertransaksi'] }}</p>
                            <p class="mt-2 text-gray-600">Promosi dan Diskon: {{ $alternatif['promosi_diskon'] }}</p>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="mt-4 text-gray-700">Tidak ada hasil yang ditemukan untuk kriteria dan nilai yang dipilih.</p>
            @endif
        </div>
    </div>
@endsection
