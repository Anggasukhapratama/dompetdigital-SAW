<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Reset your password">
    <meta name="author" content="YourAppName">
    <title>Forgot Password</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
    <!-- Tambahkan reCAPTCHA -->
    <script src="https://www.google.com/recaptcha/enterprise.js?render=6LeYevIpAAAAAIJ1Et47SN1VEKgaJS_n6ZN_N1eC" async defer></script>
</head>
<body class="bg-gray-50 dark:bg-gray-900">
    <section class="flex items-center justify-center min-h-screen">
        <div class="max-w-md w-full bg-white p-6 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white text-center">Forgot Password</h1>
            <p class="text-gray-500 dark:text-gray-400 text-center mb-6">Enter your email to receive a password reset link.</p>

            @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 p-4 rounded mb-4" role="alert">
                <strong class="font-bold">Error!</strong>
                <ul class="list-disc ml-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 p-4 rounded mb-4" role="alert">
                <strong class="font-bold">Success!</strong>
                <p>{{ session('status') }}</p>
            </div>
            @endif

            <form class="space-y-6" method="POST" action="{{ route('password.email') }}">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                    <input type="email" name="email" id="email" class="mt-1 block w-full p-2.5 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring-primary-600 focus:border-primary-600" placeholder="name@company.com" required>
                </div>
                <!-- Tambahkan reCAPTCHA -->
                <div class="g-recaptcha mt-6" data-sitekey="your-site-key"></div>
                <button type="submit" class="w-full py-2.5 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">Send Reset Link</button>
            </form>
            <div class="mt-6 text-center">
                <a href="{{ route('login') }}" class="text-sm font-medium text-indigo-600 hover:underline dark:text-indigo-400">Back to login</a>
            </div>
        </div>
    </section>
</body>
</html>
