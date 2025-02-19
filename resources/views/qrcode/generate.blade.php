<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Scanner</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <style>
        body {
            background: linear-gradient(to right, #b91c1c, #7f1d1d);
            color: white;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .glass {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div id="app" class="flex flex-col items-center justify-center flex-1 p-6">
        <!-- Navbar -->
        <nav class="w-full bg-red-800 shadow-lg py-4 px-6 flex justify-between items-center">
            <a href="/" class="text-white text-lg font-bold">QR Code Scanner</a>
            <div class="space-x-4">
                <a href="{{ url('/') }}" class="bg-white text-red-700 py-2 px-4 rounded-lg hover:bg-red-200 transition duration-300">Home</a>
                <a href="{{ route('qrcode.index') }}" class="bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 transition duration-300">QR Code</a>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="glass max-w-2xl w-full text-center">
            <h1 class="text-3xl font-bold mb-4">QR Code untuk {{ $siswa->nama }}</h1>
            <div class="flex justify-center">
                <div class="border-4 border-white rounded-lg p-8 bg-gray-900 shadow-md">
                    {!! $qrcode !!}
                </div>
            </div>
            <div class="mt-6">
                <a href="{{ route('qrcode.index') }}" class="bg-white text-red-700 py-3 px-6 rounded-lg hover:bg-red-300 transition duration-300 shadow-lg">Kembali</a>
            </div>
        </main>

        <!-- Footer -->
        <footer class="mt-6 text-center">
            <p>&copy; 2025 QR Code App. All Rights Reserved.</p>
        </footer>
    </div>
</body>

</html>
