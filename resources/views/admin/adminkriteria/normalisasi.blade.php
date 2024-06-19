@extends('layouts.app')

@section('title', 'Normalisasi')

@section('contents')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4 text-center text-blue-600">Normalisasi</h1>

    <!-- Check if $alternatifs is empty -->
    @if ($alternatifs->isEmpty())
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 my-4">
            No data available. Please add alternatives first.
        </div>
    @else
        <!-- Form Input Nilai Kriteria-Alternatif -->
        <form action="{{ route('admin.normalisasi.store') }}" method="POST" id="normalisasiForm" class="mb-6">
            @csrf
            <div class="bg-white shadow-md rounded-lg p-4">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border px-4 py-2">Alternatif</th>
                            @foreach($kriterias as $kriteria)
                                <th class="border px-4 py-2">{{ $kriteria->nama }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alternatifs as $alternatif)
                            <tr>
                                <td class="border px-4 py-2 font-medium">{{ $alternatif->nama }}</td>
                                @foreach($kriterias as $kriteria)
                                    <td class="border px-4 py-2">
                                        <input type="text" name="nilai[{{ $alternatif->id }}][{{ $kriteria->id }}]" value="{{ $nilaiKriterias->where('alternatif_id', $alternatif->id)->where('kriteria_id', $kriteria->id)->first()->nilai ?? 0 }}" class="w-full p-2 border border-gray-300 rounded-md text-center focus:outline-none focus:border-blue-500">
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4 text-center">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Simpan Nilai</button>
                </div>
            </div>
        </form>

        <!-- Tabel Hasil Normalisasi -->
        <div class="bg-white shadow-md rounded-lg p-4">
            <h2 class="text-xl font-bold mb-4 text-center text-blue-600">Tabel Normalisasi</h2>
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2">Alternatif</th>
                        @foreach($kriterias as $kriteria)
                            <th class="border px-4 py-2">{{ $kriteria->nama }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($alternatifs as $alternatif)
                        <tr>
                            <td class="border px-4 py-2 font-medium">{{ $alternatif->nama }}</td>
                            @foreach($kriterias as $kriteria)
                                <td class="border px-4 py-2">{{ number_format($normalisasi[$alternatif->id][$kriteria->id], 2) }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

<script>
    // Script untuk mengubah koma menjadi titik sebelum submit form
    document.getElementById('normalisasiForm').addEventListener('submit', function(e) {
        var inputs = document.querySelectorAll('.number-input');
        inputs.forEach(function(input) {
            input.value = input.value.replace(',', '.');
        });
    });
</script>
@endsection
