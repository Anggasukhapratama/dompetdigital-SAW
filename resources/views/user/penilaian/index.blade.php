<!-- resources/views/user/penilaian/index.blade.php -->

@extends('layouts.user')

@section('content')
    <div class="container mx-auto py-8">
        <h2 class="text-2xl font-semibold mb-4">Nilai Preferensi</h2>
        
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <p class="mb-4">Nilai preferensi ini diperoleh menggunakan metode SAW (Simple Additive Weighting). Metode SAW digunakan untuk melakukan pemilihan alternatif terbaik dari sejumlah alternatif dengan memberikan pembobotan pada setiap kriteria yang mempengaruhi hasil akhir. Berikut adalah hasil penilaiannya:</p>

        <table class="min-w-full bg-white mb-8">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b border-gray-200">Peringkat</th>
                    <th class="py-2 px-4 border-b border-gray-200">Alternatif</th>
                    <th class="py-2 px-4 border-b border-gray-200">Nilai SAW</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sortedAlternatifs as $index => $item)
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $index + 1 }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $item['alternatif']->nama }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">{{ number_format($item['nilai_saw'], 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-8">
            <h3 class="text-xl font-semibold mb-2">Sumber Data dan Kriteria Penilaian</h3>
            <p class="mb-4">Penilaian ini dilakukan berdasarkan beberapa kriteria yang telah ditentukan. Berikut adalah sumber data dan kriteria yang digunakan dalam penilaian ini:</p>
            <ul class="list-disc list-inside mb-4">
                <li><strong>Kriteria 1 (C1):</strong> Popularitas Aplikasi, Bobot: 20, Jenis: Benefit</li>
                <li><strong>Kriteria 2 (C2):</strong> Kemudahan fitur dan kelengkapan aplikasi, Bobot: 20, Jenis: Benefit</li>
                <li><strong>Kriteria 3 (C3):</strong> Top Up biaya transaksi yang mudah dan murah, Bobot: 20, Jenis: Cost</li>
                <li><strong>Kriteria 4 (C4):</strong> Keamanan dalam bertransaksi, Bobot: 10, Jenis: Benefit
                    <ul class="ml-6 list-disc list-inside">
                        <li><strong>Subcriteria:</strong></li>
                        <li>Sangat aman - Nilai: 3</li>
                        <li>Aman - Nilai: 2</li>
                        <li>Kurang Aman - Nilai: 1</li>
                    </ul>
                </li>
                <li><strong>Kriteria 5 (C5):</strong> Promosi dan diskon yang lengkap, Bobot: 30, Jenis: Benefit</li>
            </ul>
            <p class="mb-4">Data dikumpulkan dari berbagai sumber terpercaya dan diolah menggunakan metode SAW untuk menghasilkan nilai preferensi yang akurat.</p>
        </div>

        <div class="mt-8">
            <h3 class="text-xl font-semibold mb-2">Normalisasi Data</h3>
            <p class="mb-4">Normalisasi dilakukan untuk mengubah berbagai skala data asli menjadi skala yang bisa dibandingkan satu sama lain. Ini penting karena setiap kriteria mungkin memiliki unit atau skala yang berbeda. Berikut adalah tabel data asli dan tabel data setelah dinormalisasi:</p>

            <h4 class="text-lg font-semibold mb-2">Data Asli</h4>
            <table class="min-w-full bg-white mb-4">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-200">Alternatif</th>
                        <th class="py-2 px-4 border-b border-gray-200">Popularitas Aplikasi</th>
                        <th class="py-2 px-4 border-b border-gray-200">Kemudahan fitur dan kelengkapan aplikasi</th>
                        <th class="py-2 px-4 border-b border-gray-200">Top Up biaya transaksi yang mudah dan murah</th>
                        <th class="py-2 px-4 border-b border-gray-200">Keamanan dalam bertransaksi</th>
                        <th class="py-2 px-4 border-b border-gray-200">Promosi dan diskon yang lengkap</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200">dana</td>
                        <td class="py-2 px-4 border-b border-gray-200">10</td>
                        <td class="py-2 px-4 border-b border-gray-200">47</td>
                        <td class="py-2 px-4 border-b border-gray-200">45</td>
                        <td class="py-2 px-4 border-b border-gray-200">3</td>
                        <td class="py-2 px-4 border-b border-gray-200">10</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200">OVO</td>
                        <td class="py-2 px-4 border-b border-gray-200">50</td>
                        <td class="py-2 px-4 border-b border-gray-200">40</td>
                        <td class="py-2 px-4 border-b border-gray-200">25</td>
                        <td class="py-2 px-4 border-b border-gray-200">3</td>
                        <td class="py-2 px-4 border-b border-gray-200">20</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200">gopay</td>
                        <td class="py-2 px-4 border-b border-gray-200">10</td>
                        <td class="py-2 px-4 border-b border-gray-200">47</td>
                        <td class="py-2 px-4 border-b border-gray-200">25</td>
                        <td class="py-2 px-4 border-b border-gray-200">3</td>
                        <td class="py-2 px-4 border-b border-gray-200">30</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200">Link Aja</td>
                        <td class="py-2 px-4 border-b border-gray-200">10</td>
                        <td class="py-2 px-4 border-b border-gray-200">36</td>
                        <td class="py-2 px-4 border-b border-gray-200">65</td>
                        <td class="py-2 px-4 border-b border-gray-200">2</td>
                        <td class="py-2 px-4 border-b border-gray-200">10</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200">ShopeePay</td>
                        <td class="py-2 px-4 border-b border-gray-200">1</td>
                        <td class="py-2 px-4 border-b border-gray-200">48</td>
                        <td class="py-2 px-4 border-b border-gray-200">25</td>
                        <td class="py-2 px-4 border-b border-gray-200">3</td>
                        <td class="py-2 px-4 border-b border-gray-200">20</td>
                    </tr>
                </tbody>
            </table>

            <h4 class="text-lg font-semibold mb-2">Data Setelah Normalisasi</h4>
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-200">Alternatif</th>
                        <th class="py-2 px-4 border-b border-gray-200">Popularitas Aplikasi</th>
                        <th class="py-2 px-4 border-b border-gray-200">Kemudahan fitur dan kelengkapan aplikasi</th>
                        <th class="py-2 px-4 border-b border-gray-200">Top Up biaya transaksi yang mudah dan murah</th>
                        <th class="py-2 px-4 border-b border-gray-200">Keamanan dalam bertransaksi</th>
                        <th class="py-2 px-4 border-b border-gray-200">Promosi dan diskon yang lengkap</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200">dana</td>
                        <td class="py-2 px-4 border-b border-gray-200">0.20</td>
                        <td class="py-2 px-4 border-b border-gray-200">0.98</td>
                        <td class="py-2 px-4 border-b border-gray-200">1.80</td>
                        <td class="py-2 px-4 border-b border-gray-200">1.00</td>
                        <td class="py-2 px-4 border-b border-gray-200">0.33</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200">OVO</td>
                        <td class="py-2 px-4 border-b border-gray-200">1.00</td>
                        <td class="py-2 px-4 border-b border-gray-200">0.83</td>
                        <td class="py-2 px-4 border-b border-gray-200">1.00</td>
                        <td class="py-2 px-4 border-b border-gray-200">1.00</td>
                        <td class="py-2 px-4 border-b border-gray-200">0.67</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200">gopay</td>
                        <td class="py-2 px-4 border-b border-gray-200">0.20</td>
                        <td class="py-2 px-4 border-b border-gray-200">0.98</td>
                        <td class="py-2 px-4 border-b border-gray-200">1.00</td>
                        <td class="py-2 px-4 border-b border-gray-200">1.00</td>
                        <td class="py-2 px-4 border-b border-gray-200">1.00</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200">Link Aja</td>
                        <td class="py-2 px-4 border-b border-gray-200">0.20</td>
                        <td class="py-2 px-4 border-b border-gray-200">0.75</td>
                        <td class="py-2 px-4 border-b border-gray-200">2.60</td>
                        <td class="py-2 px-4 border-b border-gray-200">0.67</td>
                        <td class="py-2 px-4 border-b border-gray-200">0.33</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200">ShopeePay</td>
                        <td class="py-2 px-4 border-b border-gray-200">0.02</td>
                        <td class="py-2 px-4 border-b border-gray-200">1.00</td>
                        <td class="py-2 px-4 border-b border-gray-200">1.00</td>
                        <td class="py-2 px-4 border-b border-gray-200">1.00</td>
                        <td class="py-2 px-4 border-b border-gray-200">0.67</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
