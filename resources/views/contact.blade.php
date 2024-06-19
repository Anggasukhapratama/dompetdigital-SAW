@extends('layouts.user')

@section('title', 'Contact Me')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
        <h1 class="text-3xl font-bold mb-8">Contact Me</h1>
        @guest
        <p class="text-lg text-gray-600 mb-8">
            Untuk mengirim pesan, silakan <a href="{{ route('login') }}" class="text-blue-600 hover:underline">login</a> terlebih dahulu.
            Jika Anda memiliki pertanyaan atau ada yang ingin Anda sampaikan, silakan masuk terlebih dahulu.
        </p>
        @endguest
        @auth
        <form action="{{ route('send.email') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                <input type="text" name="subject" id="subject" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
            </div>
            <div>
                <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                <textarea name="message" id="message" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required></textarea>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Kirim Pesan
                </button>
            </div>
        </form>
        @endauth
        @if (session('success'))
        <div class="mt-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md">
            <p class="text-lg font-semibold">Pesan terkirim!</p>
            <p class="mt-2">{{ session('success') }}</p>
        </div>
        @endif
        <div class="mt-8 text-gray-600 text-center">
            Terima kasih telah mengunjungi website kami. Ikuti kami di media sosial:
            <div class="mt-4">
                <a href="https://facebook.com/yourpage" target="_blank" class="text-blue-600 hover:underline mx-2">
                    <i class="fab fa-facebook-square"></i> Facebook
                </a>
                <a href="https://twitter.com/yourpage" target="_blank" class="text-blue-600 hover:underline mx-2">
                    <i class="fab fa-twitter-square"></i> Twitter
                </a>
                <a href="https://instagram.com/yourpage" target="_blank" class="text-blue-600 hover:underline mx-2">
                    <i class="fab fa-instagram-square"></i> Instagram
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
