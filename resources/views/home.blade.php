@extends('layouts.user')

@section('title', 'Home')

@section('content')
<!-- Hero Section -->
<header class="bg-gradient-to-r from-blue-500 to-blue-700 h-screen flex items-center">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-white leading-tight">
                <span class="block"><i class="fas fa-wallet text-yellow-300"></i> 
                @auth
                    Selamat Datang Kembali, <span class="text-blue-200">{{ Auth::user()->name }}</span>!
                @endauth
                </span>
                <span class="block text-white-300 mt-2">Temukan Dompet Digital Terbaik untuk Anda</span>
            </h1>
            <p class="mt-4 text-xl md:text-lg lg:text-xl text-blue-100 leading-relaxed max-w-2xl mx-auto">
                Pilihlah dompet digital yang paling cocok untuk kebutuhan finansial Anda dari berbagai pilihan yang tersedia.
            </p>
            <div class="mt-8 flex justify-center">
                <div class="rounded-md shadow">
                    @guest
                    <a href="{{ route('register') }}" class="w-full flex items-center justify-center px-6 py-3 border border-transparent text-base font-semibold rounded-md text-blue-600 bg-white hover:bg-gray-200 transition duration-300 ease-in-out md:py-4 md:text-lg md:px-8">
                        <i class="fas fa-user-plus mr-2"></i> Mulai Sekarang
                    </a>
                    @endguest
                    @auth
                    <a href="#" class="w-full flex items-center justify-center px-6 py-3 border border-transparent text-base font-semibold rounded-md text-blue-600 bg-white hover:bg-gray-200 transition duration-300 ease-in-out md:py-4 md:text-lg md:px-8">
                        <i class="fas fa-wallet mr-2"></i> Akses Dompet Digital
                    </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Dashboard Section -->
<section class="bg-gray-100 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-extrabold text-gray-800">
                <span class="block">Temukan Dompet Digital Terbaik untuk Anda</span>
                <span class="mt-4 text-xl md:text-lg lg:text-xl text-black-100 leading-relaxed max-w-2xl mx-auto">Pilihlah yang sesuai dengan kebutuhan finansial Anda.</span>
            </h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Example Card for Dana -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-6">
                    <h3 class="text-lg text-gray-800 flex items-center">
                        <i class="fab fa-cc-paypal text-blue-600 mr-2"></i> Dana
                    </h3>
                    <p class="mt-2 text-gray-600">Dompet Digital yang menyediakan berbagai kemudahan dalam melakukan transaksi harian seperti pembayaran tagihan dan transfer uang.</p>
                    <div class="mt-4 flex justify-between items-center">
                        <a href="{{ route('dana.detail') }}" class="text-blue-600 font-semibold hover:underline" onclick="showAlertIfNotAuthenticated(event)">Lihat Detail</a>
                        <span class="text-yellow-500"><i class="fas fa-star"></i> 4.5</span>
                    </div>
                </div>
            </div>
            
            <!-- Example Card for GoPay -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-800 flex items-center">
                        <i class="fas fa-wallet text-blue-600 mr-2"></i> GoPay
                    </h3>
                    <p class="mt-2 text-gray-600">Dompet Digital dari aplikasi Gojek yang menyediakan berbagai fitur untuk memudahkan transaksi sehari-hari Anda.</p>
                    <div class="mt-4 flex justify-between items-center">
                        <a href="{{ route('gopay.detail') }}" class="text-blue-600 font-semibold hover:underline" onclick="showAlertIfNotAuthenticated(event)">Lihat Detail</a>
                        <span class="text-yellow-500"><i class="fas fa-star"></i> 4.7</span>
                    </div>
                </div>
            </div>
            
            <!-- Example Card for Shopee Pay -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-800 flex items-center">
                        <i class="fas fa-store-alt text-blue-600 mr-2"></i> Shopee Pay
                    </h3>
                    <p class="mt-2 text-gray-600">Dompet Digital yang terintegrasi dengan aplikasi Shopee, mempermudah pengguna untuk melakukan pembayaran dan manajemen keuangan.</p>
                    <div class="mt-4 flex justify-between items-center">
                        <a href="{{ route('shopee-pay.detail') }}" class="text-blue-600 font-semibold hover:underline" onclick="showAlertIfNotAuthenticated(event)">Lihat Detail</a>
                        <span class="text-yellow-500"><i class="fas fa-star"></i> 4.3</span>
                    </div>
                </div>
            </div>
            
            <!-- Example Card for LinkAja -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-800 flex items-center">
                        <i class="fas fa-link text-blue-600 mr-2"></i> LinkAja
                    </h3>
                    <p class="mt-2 text-gray-600">Solusi dompet digital dari Telkomsel yang memungkinkan pengguna untuk bertransaksi seperti pembelian pulsa, pembayaran tagihan, dan transfer uang dengan mudah.</p>
                    <div class="mt-4 flex justify-between items-center">
                        <a href="{{ route('linkaja.detail') }}" class="text-blue-600 font-semibold hover:underline" onclick="showAlertIfNotAuthenticated(event)">Lihat Detail</a>
                        <span class="text-yellow-500"><i class="fas fa-star"></i> 4.4</span>
                    </div>
                </div>
            </div>
            
            <!-- Example Card for OVO -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-800 flex items-center">
                        <i class="fas fa-money-bill-wave text-blue-600 mr-2"></i> OVO
                    </h3>
                    <p class="mt-2 text-gray-600">Dompet digital dengan fitur lengkap untuk melakukan pembayaran online, pembelian pulsa, transfer uang, dan lainnya dengan praktis.</p>
                    <div class="mt-4 flex justify-between items-center">
                        <a href="{{ route('ovo.detail') }}" class="text-blue-600 font-semibold hover:underline" onclick="showAlertIfNotAuthenticated(event)">Lihat Detail</a>
                        <span class="text-yellow-500"><i class="fas fa-star"></i> 4.6</span>
                    </div>
                </div>
            </div>
            
            <!-- Add more cards as needed for other wallets -->
        </div>
    </div>
</section>

<script>
function showAlertIfNotAuthenticated(event) {
    @guest
    event.preventDefault();
    Swal.fire({
        icon: 'warning',
        title: 'Akses Terbatas',
        text: 'Silakan login terlebih dahulu untuk melihat detail.',
        confirmButtonText: 'Login',
        showCancelButton: true,
        cancelButtonText: 'Batal',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "{{ route('login') }}";
        }
    });
    @endguest
}
</script>

@endsection
