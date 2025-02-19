<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Phosphor Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@1.4.2">

    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>

    <style>
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                        url('https://source.unsplash.com/1600x900/?technology,innovation') !important;
            background-size: cover !important;
            background-position: center !important;
            height: 85vh !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            text-align: center !important;
            color: white !important;
        }
        .btn-custom {
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s;
        }
        .btn-dashboard { background: #4F46E5; color: white; }
        .btn-dashboard:hover { background: #4338CA; }
        .btn-qrcode { background: #E11D48; color: white; }
        .btn-qrcode:hover { background: #BE123C; }
        .feature-card {
            transition: transform 0.3s ease-in-out;
        }
        .feature-card:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900">
    <div id="app">
        <nav class="bg-white shadow-md py-4">
            <div class="container mx-auto flex justify-between items-center px-6">
                <img src="{{ asset('img/img.jpg') }}" alt="Logo" class="w-16 h-16 rounded-full shadow-md">
                <div class="space-x-6 text-lg flex items-center">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn-custom btn-dashboard flex items-center">
                                <i class="ph ph-house mr-2"></i> Dashboard
                            </a>
                            <a href="{{route('qrcode.index')}}" class="btn-custom btn-qrcode flex items-center">
                                <i class="ph ph-qrcode mr-2"></i> QR Code
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-700 hover:text-indigo-500">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-5 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 transition">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </nav>

        <main class="hero">
            <div>
                <h1 class="text-5xl font-bold">Selamat Datang di Platform Saya</h1>
                <p class="text-lg text-gray-300 mt-3">Jelajahi berbagai fitur inovatif untuk bisnis dan teknologi Anda.</p>
                <a href="#" class="mt-5 inline-block bg-indigo-600 text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-indigo-700 transition">Pelajari Lebih Lanjut</a>
            </div>
        </main>

      

        <footer class="bg-gray-900 text-white py-6 text-center mt-12">
            <div class="container mx-auto">
                <p>&copy; 2025 Silo</p>
                <div class="mt-4">
                    <a href="#" class="text-blue-500 mx-2"><i class="ph ph-facebook-logo text-2xl"></i></a>
                    <a href="#" class="text-green-500 mx-2"><i class="ph ph-whatsapp-logo text-2xl"></i></a>
                    <a href="#" class="text-pink-500 mx-2"><i class="ph ph-instagram-logo text-2xl"></i></a>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
