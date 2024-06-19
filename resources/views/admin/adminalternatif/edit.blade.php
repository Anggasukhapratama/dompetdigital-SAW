@extends('layouts.app')

@section('title', 'Edit Alternatif')

@section('contents')
    <div class="container mx-auto">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4 text-center text-blue-600">Edit Alternatif</h1>
            @if(session('error'))
                <div class="bg-red-500 text-white text-center p-4 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif
            <form action="{{ route('admin.alternatif.update', $alternatif->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label for="kode" class="block text-sm font-medium text-gray-700">Kode Alternatif:</label>
                    <input type="text" name="kode" id="kode" class="form-input w-full bg-white border border-gray-300 rounded-md p-2 @error('kode') border-red-500 @enderror" value="{{ old('kode', $alternatif->kode) }}" required>
                    @error('kode')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Alternatif:</label>
                    <input type="text" name="nama" id="nama" class="form-input w-full bg-white border border-gray-300 rounded-md p-2 @error('nama') border-red-500 @enderror" value="{{ old('nama', $alternatif->nama) }}" required>
                    @error('nama')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
