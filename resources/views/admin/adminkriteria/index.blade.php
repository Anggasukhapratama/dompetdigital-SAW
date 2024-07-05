@extends('layouts.app')

@section('title', 'Kriteria')

@section('contents')
    <div class="container mx-auto">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Kriteria</h1>
            <a href="{{ route('admin.kriteria.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Tambah Kriteria</a>
        </div>

        <!-- Form pencarian -->
        <form action="{{ route('admin.kriteria.index') }}" method="GET" class="mb-4">
            <div class="flex">
                <input type="text" name="search" class="border rounded-l px-4 py-2 w-1/2" placeholder="Cari kode atau nama kriteria...">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r hover:bg-blue-600">Cari</button>
            </div>
        </form>

        <!-- Tabel kriteria -->
        <div class="bg-white shadow-md rounded my-6">
            <table class="w-full table-auto">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">Nomor</th>
                        <th class="border px-4 py-2">Kode Kriteria</th>
                        <th class="border px-4 py-2">Nama Kriteria</th>
                        <th class="border px-4 py-2">Bobot</th>
                        <th class="border px-4 py-2">Jenis</th>
                        <th class="border px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kriterias as $kriteria)
                        <tr>
                            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ $kriteria->kode }}</td>
                            <td class="border px-4 py-2">{{ $kriteria->nama }}</td>
                            <td class="border px-4 py-2">{{ number_format($kriteria->bobot / 100, 2) }}</td>
                            <td class="border px-4 py-2">{{ $kriteria->jenis }}</td>
                            <td class="border px-4 py-2">
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.kriteria.edit', $kriteria->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600">Edit</a>
                                    <form action="{{ route('admin.kriteria.destroy', $kriteria->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kriteria ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="border px-4 py-2" colspan="6">Tidak ada data kriteria.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
