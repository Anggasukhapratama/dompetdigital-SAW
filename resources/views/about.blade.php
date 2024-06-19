@extends('layouts.user')

@section('title', 'Tentang Kami')

@section('content')
<!-- About Section -->
<section class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:text-center">
            <h2 class="text-base text-blue-600 font-semibold tracking-wide uppercase">Tentang Dompet Digital</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Memudahkan Pengelolaan Keuangan Anda
            </p>
            <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                Dompet Digital kami dirancang untuk menawarkan berbagai fitur yang mempermudah hidup Anda. Dengan teknologi Simple Additive Weighting (SAW), kami membantu Anda memilih dompet digital terbaik berdasarkan preferensi Anda.
            </p>
        </div>

        <!-- Features Section -->
        <div class="mt-12 grid gap-8 md:grid-cols-3">
            <!-- Fitur 1: Aman -->
            <div class="flex items-center bg-white rounded-lg shadow-lg p-6">
                <div class="flex-shrink-0">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                        <i class="bi bi-shield-lock-fill text-2xl"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Aman</h3>
                    <p class="mt-2 text-base text-gray-500">
                        Keamanan Anda adalah prioritas utama kami. Kami menggunakan enkripsi canggih untuk melindungi data Anda.
                    </p>
                </div>
            </div>

            <!-- Fitur 2: Ramah Mobile -->
            <div class="flex items-center bg-white rounded-lg shadow-lg p-6">
                <div class="flex-shrink-0">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                        <i class="bi bi-phone-fill text-2xl"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Ramah Mobile</h3>
                    <p class="mt-2 text-base text-gray-500">
                        Akses dompet Anda di mana saja dengan antarmuka yang ramah mobile.
                    </p>
                </div>
            </div>

            <!-- Fitur 3: Analitik -->
            <div class="flex items-center bg-white rounded-lg shadow-lg p-6">
                <div class="flex-shrink-0">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                        <i class="bi bi-bar-chart-line text-2xl"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Analitik</h3>
                    <p class="mt-2 text-base text-gray-500">
                        Lacak pengeluaran dan tabungan Anda dengan alat analitik komprehensif kami.
                    </p>
                </div>
            </div>
        </div>

        <!-- Mission, Vision, and Team Section -->
        <div class="mt-12">
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Misi Kami -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Misi</h3>
                    <p class="text-lg text-gray-500 leading-relaxed">
                        Memberikan solusi keuangan digital yang aman, mudah digunakan, dan terpercaya untuk mempermudah kehidupan finansial masyarakat.
                    </p>
                </div>

                <!-- Visi Kami -->
                <div class="bg-white rounded-lg shadow-lg p-6 md:col-span-2">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Visi</h3>
                    <p class="text-lg text-gray-500 leading-relaxed">
                        Menjadi platform dompet digital terdepan di Indonesia yang mendukung inklusi keuangan dan memajukan ekonomi digital.
                    </p>
                </div>
            </div>

            <!-- Tim Kami -->
            <div class="mt-8 bg-white rounded-lg shadow-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Developer Dompet Digital</h3>
                <p class="text-lg text-gray-500 leading-relaxed">
                    Dompet Digital terdiri dari para profesional berpengalaman di bidang teknologi dan keuangan. Perusahaan dompet digital berkomitmen untuk memberikan layanan terbaik dengan fokus pada keamanan dan kenyamanan pengguna.
                </p>
                <p class="mt-4 text-lg text-gray-500 leading-relaxed">
                    Developer akan terus berusaha meningkatkan pengalaman pengguna dengan mengintegrasikan umpan balik dari pengguna dan mengikuti tren terbaru dalam industri fintech.
                </p>
            </div>
        </div>

        <!-- Testimoni Pengguna Section -->
        <div class="mt-12">
            <h3 class="text-2xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-3xl lg:text-center">
                Testimoni Pengguna
            </h3>
            <div class="mt-8 grid gap-8 md:grid-cols-2">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <p class="text-lg text-gray-600 leading-relaxed">
                        "Dompet Digital ini sangat membantu dalam mengelola keuangan saya sehari-hari. Aplikasi yang ramah pengguna dan fitur keamanannya sangat terpercaya."
                    </p>
                    <div class="mt-4">
                        <p class="text-base font-semibold text-gray-900">- Andi, Jakarta</p>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <p class="text-lg text-gray-600 leading-relaxed">
                        "Fitur analitiknya sangat membantu saya dalam memantau pengeluaran dan menabung lebih efektif."
                    </p>
                    <div class="mt-4">
                        <p class="text-base font-semibold text-gray-900">- Siti, Surabaya</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/bootstrap-icons/font/bootstrap-icons.css"></script>

</section>

@endsection
