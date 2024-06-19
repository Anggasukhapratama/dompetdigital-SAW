@extends('layouts.app')

@section('title', 'Tambah Kriteria')

@section('contents')
    <div class="container mx-auto bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold mb-6 text-center text-blue-600">Tambah Kriteria</h1>
        @if(session('error'))
            <div class="bg-red-500 text-white text-center p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('admin.kriteria.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="kode" class="block text-sm font-medium text-gray-700">Kode Kriteria</label>
                <input type="text" name="kode" id="kode" class="mt-1 p-2 rounded-md border border-gray-300 w-full" required>
            </div>
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama Kriteria</label>
                <input type="text" name="nama" id="nama" class="mt-1 p-2 rounded-md border border-gray-300 w-full" required>
            </div>
            <div>
                <label for="bobot" class="block text-sm font-medium text-gray-700">Bobot</label>
                <input type="number" name="bobot" id="bobot" class="mt-1 p-2 rounded-md border border-gray-300 w-full" required min="0" max="100">
            </div>
            <div>
                <label for="jenis" class="block text-sm font-medium text-gray-700">Jenis</label>
                <select name="jenis" id="jenis" class="mt-1 p-2 rounded-md border border-gray-300 w-full" required>
                    <option value="benefit">Benefit</option>
                    <option value="cost">Cost</option>
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Tambah</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
<script>
    document.querySelector('create').addEventListener('submit', function(e) {
        var bobotInput = document.getElementById('bobot');
        bobotInput.value = parseInt(bobotInput.value); // Convert to integer
    });
</script>
@endsection
