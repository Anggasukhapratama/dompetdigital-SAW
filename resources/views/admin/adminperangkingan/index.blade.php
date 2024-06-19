@extends('layouts.app')

@section('title', 'Perangkingan Alternatif')

@section('contents')
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-center text-blue-600">Hasil Perangkingan</h1>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="w-full whitespace-nowrap">
                <thead>
                    <tr class="bg-blue-500 text-white">
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Rank</th>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Nama Alternatif</th>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Nilai SAW</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($sortedAlternatifs as $index => $data)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $data['alternatif']->nama }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ number_format($data['nilai_saw'], 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
