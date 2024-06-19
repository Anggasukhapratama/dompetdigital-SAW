<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <style>
        .sidebar-hidden {
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }
        .sidebar-visible {
            transform: translateX(0);
            transition: transform 0.3s ease;
        }
        .content-expanded {
            margin-left: 0;
            width: 100%;
            transition: margin-left 0.3s ease, width 0.3s ease;
        }
        .content-collapsed {
            margin-left: 16rem; /* 64px for the sidebar width */
            width: calc(100% - 16rem);
            transition: margin-left 0.3s ease, width 0.3s ease;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div id="sidebar" class="fixed flex flex-col w-64 h-full bg-gray-900 text-gray-200 sidebar-visible">
            <div class="flex items-center justify-center h-20 border-b border-gray-700">
                <i class="bi bi-app-indicator px-2 py-1 rounded-md bg-blue-600 text-white"></i>
                <h1 class="ml-3 text-2xl font-bold">Admin</h1>
            </div>
            <nav class="flex flex-col py-4">
                <a href="{{ route('dashboard') }}" class="flex items-center py-2.5 px-4 hover:bg-blue-600">
                    <i class="bi bi-house-door-fill"></i>
                    <span class="ml-4">Dashboard</span>
                </a>
                <div class="relative group">
                    <button class="flex items-center py-2.5 px-4 w-full text-left hover:bg-blue-600" data-submenu-toggle>
                        <i class="bi bi-clipboard-data"></i>
                        <span class="ml-4">Data</span>
                        <i class="bi bi-chevron-down ml-auto"></i>
                    </button>
                    <div class="hidden flex-col pl-12" id="submenu">
                        <a href="{{ route('admin.alternatif.index') }}" class="flex items-center py-2.5 px-4 hover:bg-blue-600">
                            <i class="bi bi-list"></i>
                            <span class="ml-4">Alternatif</span>
                        </a>
                        <a href="{{ route('admin.kriteria.index') }}" class="flex items-center py-2.5 px-4 hover:bg-blue-600">
                            <i class="bi bi-list-check"></i>
                            <span class="ml-4">Kriteria</span>
                        </a>
                        <a href="{{ route('admin.subkriteria.index') }}" class="flex items-center py-2.5 px-4 hover:bg-blue-600">
                            <i class="bi bi-list-task"></i>
                            <span class="ml-4">Sub Kriteria</span>
                        </a>
                    </div>
                </div>
                <a href="{{ route('admin.normalisasi') }}" class="flex items-center py-2.5 px-4 hover:bg-blue-600">
                    <i class="bi bi-grid-3x3-gap-fill"></i>
                    <span class="ml-4">Normalisasi</span>
                </a>
                <a href="{{ route('admin.penilaian') }}" class="flex items-center py-2.5 px-4 hover:bg-blue-600">
                    <i class="bi bi-sliders"></i>
                    <span class="ml-4">Penilaian</span>
                </a>
                <a href="{{ route('admin.perangkingan.index') }}" class="flex items-center py-2.5 px-4 hover:bg-blue-600">
                    <i class="bi bi-bar-chart-line-fill"></i>
                    <span class="ml-4">Perangkingan</span>
                </a>
                <a href="{{ route('admin.pengguna') }}" class="flex items-center py-2.5 px-4 hover:bg-blue-600">
                    <i class="bi bi-person-fill"></i>
                    <span class="ml-4">Pengguna</span>
                </a>
                <a href="{{ route('logout') }}" class="flex items-center py-2.5 px-4 hover:bg-blue-600">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span class="ml-4">Logout</span>
                </a>
            </nav>
        </div>

        <!-- Navbar and Main Content -->
        <div id="content" class="ml-64 w-full content-collapsed">
            <!-- Navbar -->
            <div class="flex justify-between items-center h-20 px-6 bg-white shadow">
                <div>
                    <button id="toggleSidebar" class="p-2 rounded-md focus:outline-none focus:ring">
                        <i class="bi bi-list text-2xl"></i>
                    </button>
                </div>
                <div class="flex items-center">
                    <div class="relative">
                        <button id="notificationButton" class="flex items-center p-2 text-gray-600 hover:text-gray-900">
                            <i class="bi bi-bell text-2xl"></i>
                        </button>
                        <div id="notificationPopup" class="absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg hidden">
                            <div class="p-4 text-gray-700">Welcome to the Admin Dashboard!</div>
                        </div>
                    </div>
                    <div class="relative ml-4 flex items-center">
                        <button id="profileButton" class="flex items-center p-2 text-gray-600 hover:text-gray-900">
                            <i class="bi bi-person-circle text-2xl"></i>
                            @auth
            <span class="ml-2 font-medium">{{ Auth::user()->name }}</span>
        @else
            <span class="ml-2 font-medium">Pengunjung</span> <!-- Atau teks pengganti yang sesuai -->
        @endauth
                        </button>
                        <div id="profilePopup" class="absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg hidden">
                            <a href="{{ route('admin.pengguna') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Profile</a>
                            <a href="{{ route('logout') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Welcome Message -->
            @if(session('welcome'))
            <div id="welcomeMessage" class="flex items-center justify-between p-4 mb-4 text-green-700 bg-green-100 border border-green-300 rounded">
                <div class="flex items-center">
                    <i class="bi bi-check-circle-fill text-2xl mr-2"></i>
                    <span>Selamat datang di Admin!</span>
                </div>
                <button id="closeWelcomeMessage" class="p-1 text-green-500 hover:text-green-700">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            @endif

            <!-- Main Content -->
            <div class="p-6">
                @yield('contents')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Toggle Sidebar
            const toggleSidebar = document.getElementById("toggleSidebar");
            const sidebar = document.getElementById("sidebar");
            const content = document.getElementById("content");
            toggleSidebar.addEventListener("click", function () {
                sidebar.classList.toggle("sidebar-hidden");
                sidebar.classList.toggle("sidebar-visible");
                content.classList.toggle("content-expanded");
                content.classList.toggle("content-collapsed");
            });

            // Toggle Submenu
            const submenuToggle = document.querySelector("[data-submenu-toggle]");
            const submenu = document.getElementById("submenu");
            submenuToggle.addEventListener("click", function () {
                submenu.classList.toggle("hidden");
            });

            // Notification Popup
            const notificationButton = document.getElementById("notificationButton");
            const notificationPopup = document.getElementById("notificationPopup");
            notificationButton.addEventListener("click", function () {
                notificationPopup.classList.toggle("hidden");
            });

            // Profile Popup
            const profileButton = document.getElementById("profileButton");
            const profilePopup = document.getElementById("profilePopup");
            profileButton.addEventListener("click", function () {
                profilePopup.classList.toggle("hidden");
            });

            // Close popups when clicking outside
            document.addEventListener("click", function (event) {
                if (!notificationButton.contains(event.target) && !notificationPopup.contains(event.target)) {
                    notificationPopup.classList.add("hidden");
                }
                if (!profileButton.contains(event.target) && !profilePopup.contains(event.target)) {
                    profilePopup.classList.add("hidden");
                }
            });

            // Close Welcome Message
            const closeWelcomeMessage = document.getElementById("closeWelcomeMessage");
            if (closeWelcomeMessage) {
                closeWelcomeMessage.addEventListener("click", function () {
                    const welcomeMessage = document.getElementById("welcomeMessage");
                    welcomeMessage.style.display = "none";
                });
            }
        });
        
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
