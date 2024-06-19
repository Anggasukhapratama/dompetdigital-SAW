@extends('layouts.app')

@section('title', 'Daftar Alternatif')

@section('contents')
    <div class="container mx-auto py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Daftar Alternatif</h1>
            <a href="{{ route('admin.alternatif.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 flex items-center shadow">
                <i class="bi bi-plus mr-2"></i> Tambah Alternatif
            </a>
        </div>

        <!-- Form Pencarian -->
        <form method="GET" action="{{ route('admin.alternatif.index') }}" class="mb-6">
            <input type="text" name="search" placeholder="Cari berdasarkan kode atau nama" class="border p-2 rounded-md w-full" value="{{ request()->input('search') }}">
        </form>
        
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach($alternatifs as $alternatif)
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="bg-gray-100 p-4 rounded-lg mb-4">
                        <div class="flex items-center justify-between mb-2">
                            <h2 class="text-xl font-bold text-gray-800">{{ $alternatif->nama }}</h2>
                            <span class="text-sm text-gray-600">Kode: {{ $alternatif->kode }}</span>
                        </div>
                    </div>
                    <div class="flex space-x-4">
                        <a href="{{ route('admin.alternatif.edit', $alternatif->id) }}" class="flex items-center bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 shadow">
                            <i class="bi bi-pencil-fill mr-2"></i> Edit
                        </a>
                        <form action="{{ route('admin.alternatif.destroy', $alternatif->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus alternatif ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="flex items-center bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 shadow">
                                <i class="bi bi-trash-fill mr-2"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
