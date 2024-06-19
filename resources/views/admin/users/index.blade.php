@extends('layouts.app')

@section('title', 'Daftar Pengguna')

@section('contents')
<div class="container mx-auto">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="px-6 py-4">
            <h2 class="text-3xl font-bold mb-4 text-center">Daftar Pengguna</h2>
            <div class="flex justify-end mb-4">
                <a href="{{ route('admin.users.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Tambah Pengguna
                </a>
            </div>
            <div class="-mx-4 overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr class="bg-gray-800 text-white">
                            <th class="px-6 py-3 text-left text-sm font-medium uppercase">Nama</th>
                            <th class="px-6 py-3 text-left text-sm font-medium uppercase">Email</th>
                            <th class="px-6 py-3 text-left text-sm font-medium uppercase">Tipe</th>
                            <th class="px-6 py-3 text-left text-sm font-medium uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($users as $user)
                            <tr>
                                <td class="border px-6 py-4">{{ $user->name }}</td>
                                <td class="border px-6 py-4">{{ $user->email }}</td>
                                <td class="border px-6 py-4">{{ $user->type }}</td>
                                <td class="border px-6 py-4">
                                    <div class="flex">
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
