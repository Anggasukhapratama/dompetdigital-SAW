@extends('layouts.user')

@section('content')
    <div class="container mx-auto py-8">
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
                <label for="kriteria" class="block text-gray-700 font-semibold mb-2">Pilih Kriteria</label>
                <select name="kriteria" id="kriteria" class="block w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
                    <option value="C1">Popularitas Aplikasi</option>
                    <option value="C2">Kemudahan Fitur dan Kelengkapan Aplikasi</option>
                    <option value="C3">Top Up Biaya Transaksi yang Mudah dan Murah</option>
                    <option value="C4">Keamanan dalam Bertransaksi</option>
                    <option value="C5">Promosi dan Diskon yang Lengkap</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="nilai" class="block text-gray-700 font-semibold mb-2">Pilih Nilai</label>
                <select name="nilai" id="nilai" class="block w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-200">Cari</button>
        </form>

        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
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

    <script>
        document.getElementById('kriteria').addEventListener('change', function() {
            var kriteria = this.value;
            var nilaiSelect = document.getElementById('nilai');
            nilaiSelect.innerHTML = '';

            var options = {
                C1: [
                    { value: 10, text: 'Jumlah unduhan = 10 juta download' },
                    { value: 50, text: 'Jumlah unduhan > 10 juta download' },
                    { value: 1, text: 'Jumlah unduhan < 10 juta download' }
                ],
                C2: [
                    { value: 4.7, text: 'Rating = 4.7' },
                    { value: 4.0, text: 'Rating = 4.0' },
                    { value: 3.6, text: 'Rating = 3.6' },
                    { value: 4.8, text: 'Rating = 4.8' }
                ],
                C3: [
                    { value: 25, text: 'Biaya Murah' },
                    { value: 45, text: 'Biaya Sedang' },
                    { value: 65, text: 'Biaya Tinggi' }
                ],
                C4: [
                    { value: 3, text: 'Sangat aman' },
                    { value: 2, text: 'Aman' }
                ],
                C5: [
                    { value: 10, text: 'Promosi dan diskon 10%' },
                    { value: 20, text: 'Promosi dan diskon 20%' },
                    { value: 30, text: 'Promosi dan diskon 30%' }
                ]
            };

            options[kriteria].forEach(function(option) {
                var opt = document.createElement('option');
                opt.value = option.value;
                opt.innerHTML = option.text;
                nilaiSelect.appendChild(opt);
            });
        });
          //kenapa tidak mau masuk 
        // Trigger change event on page load to populate the nilai select based on the default kriteria value
        document.getElementById('kriteria').dispatchEvent(new Event('change'));
    </script>
@endsection
