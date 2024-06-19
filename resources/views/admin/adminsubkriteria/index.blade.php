<!-- resources/views/admin/adminsubkriteria/index.blade.php -->

@extends('layouts.app')

@section('title', 'Criteria and Subcriteria')

@section('contents')
    <div class="grid grid-cols-1 gap-4">
        @foreach ($kriteria as $kriteriaItem)
            <div class="bg-white shadow-md rounded-lg p-4">
                <h2 class="text-xl font-semibold mb-2">{{ $kriteriaItem->nama }}</h2>
                <a href="{{ route('admin.subkriteria.create', ['kriteria_id' => $kriteriaItem->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block mb-2">
                    Add New Subcriteria
                </a>
                <table class="min-w-full bg-white border-collapse border border-gray-200 mt-4">
                    <thead>
                        <tr class="bg-gray-100 border-b border-gray-200">
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">No</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Nama Subcriteria</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Nilai</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kriteriaItem->subkriteria as $index => $subkriteriaItem)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-4">{{ $index + 1 }}</td>
                                <td class="py-3 px-4">{{ $subkriteriaItem->nama }}</td>
                                <td class="py-3 px-4">{{ $subkriteriaItem->nilai }}</td>
                                <td class="py-3 px-4">
                                    <a href="{{ route('admin.subkriteria.edit', $subkriteriaItem->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600">Edit</a>
                                    <form action="{{ route('admin.subkriteria.destroy', $subkriteriaItem->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="py-3 px-4 text-center" colspan="4">No subcriteria found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>
@endsection
