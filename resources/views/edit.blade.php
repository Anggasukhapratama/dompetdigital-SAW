<!-- resources/views/profile/edit.blade.php -->
@extends('layouts.admin')

@section('title', 'Edit Profile')

@section('contents')
<div class="max-w-lg mx-auto bg-white p-6 rounded-md shadow-md">
    <h2 class="text-lg font-semibold mb-4">Edit Profile</h2>
    @if(session('success'))
        <div class="bg-green-200 text-green-800 px-4 py-2 rounded-md mb-4">{{ session('success') }}</div>
    @endif
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="mt-1 p-2 block w-full border rounded-md">
            @error('name')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="mt-1 p-2 block w-full border rounded-md">
            @error('email')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" id="password" class="mt-1 p-2 block w-full border rounded-md">
            @error('password')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 p-2 block w-full border rounded-md">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Update Profile</button>
    </form>
</div>
@endsection
