@extends('layouts.app')

@section('title', 'Edit Kriteria')

@section('contents')
    <div class="container mx-auto bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold mb-6 text-center text-blue-600">Edit Kriteria</h1>
        @if(session('error'))
            <div class="bg-red-500 text-white text-center p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('admin.kriteria.update', $kriteria->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="kode" class="block text-sm font-medium text-gray-700">Kode Kriteria</label>
                <input type="text" name="kode" id="kode" value="{{ $kriteria->kode }}" class="mt-1 p-2 rounded-md border border-gray-300 w-full" required>
            </div>
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama Kriteria</label>
                <input type="text" name="nama" id="nama" value="{{ $kriteria->nama }}" class="mt-1 p-2 rounded-md border border-gray-300 w-full" required>
            </div>
            <div>
                <label for="bobot" class="block text-sm font-medium text-gray-700">Bobot</label>
                <input type="number" name="bobot" id="bobot" value="{{ $kriteria->bobot }}" class="mt-1 p-2 rounded-md border border-gray-300 w-full" required min="0" max="100">
            </div>
            <div>
                <label for="jenis" class="block text-sm font-medium text-gray-700">Jenis</label>
                <select name="jenis" id="jenis" class="mt-1 p-2 rounded-md border border-gray-300 w-full" required>
                    <option value="benefit" {{ $kriteria->jenis == 'benefit' ? 'selected' : '' }}>Benefit</option>
                    <option value="cost" {{ $kriteria->jenis == 'cost' ? 'selected' : '' }}>Cost</option>
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Update</button>
            </div>
        </form>
    </div>
@endsection
