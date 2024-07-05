@extends('layouts.app')

@section('title', 'Penilaian')

@section('contents')
<div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-6 text-center text-blue-600">Penilaian</h1>

    <!-- Tabel Hasil Penilaian -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <h2 class="text-xl font-bold bg-blue-500 text-white py-2 px-4">Tabel Penilaian</h2>
        <div class="overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border-b-2 border-gray-300 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alternatif</th>
                        <th class="border-b-2 border-gray-300 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hasil SAW</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($alternatifs as $alternatif)
                        <tr>
                            <td class="border-b border-gray-300 px-6 py-4 whitespace-nowrap">{{ $alternatif->nama }}</td>
                            <td class="border-b border-gray-300 px-6 py-4 whitespace-nowrap">{{ number_format($hasilSaw[$alternatif->id], 10) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
