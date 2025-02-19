<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <style>
        .hero {
            background: linear-gradient(rgba(255, 0, 0, 0.6), rgba(255, 0, 0, 0.6)), url('https://source.unsplash.com/1600x900/?business,technology');
            background-size: cover;
            background-position: center;
            height: 50vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
        }
    </style>
</head>
<body class="bg-red-100 text-gray-900">
    <div id="app">
        <nav class="bg-red-700 shadow-md py-4">
            <div class="container mx-auto flex justify-between items-center px-6">
                <a href="/" class="text-white text-lg font-bold">QR CODE GENERATOR</a>
                <div class="space-x-6 text-lg flex items-center">
                    <a href="{{ url('/') }}" class="text-white hover:text-gray-300">Home</a>
                    <a href="{{ route('qrcode.index') }}" class="bg-white text-red-600 py-2 px-4 rounded-lg shadow-lg hover:bg-gray-200">QR Code</a>
                </div>
            </div>
        </nav>

        <header class="hero">
            <h1 class="text-4xl font-extrabold">Selamat Datang di QR Code Generator</h1>
        </header>

        <main class="container mx-auto mt-8 p-6 bg-white shadow-lg rounded-lg">
            <h2 class="text-2xl font-semibold text-red-700 mb-4">Buat QR Code Baru</h2>
            <form action="{{ route('qrcode.store') }}" method="POST" class="bg-red-50 p-6 rounded-lg shadow">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label for="nama" class="block text-gray-700 font-bold mb-2">Nama:</label>
                        <input type="text" id="nama" name="nama" class="w-full p-3 border rounded-lg focus:ring focus:ring-red-300" required>
                    </div>
                    <div>
                        <label for="kelas" class="block text-gray-700 font-bold mb-2">Kelas:</label>
                        <input type="text" id="kelas" name="kelas" class="w-full p-3 border rounded-lg focus:ring focus:ring-red-300" required>
                    </div>
                    <div>
                        <label for="no_hp" class="block text-gray-700 font-bold mb-2">No HP:</label>
                        <input type="text" id="no_hp" name="no_hp" class="w-full p-3 border rounded-lg focus:ring focus:ring-red-300" required>
                    </div>
                </div>
                <button type="submit" class="mt-6 w-full md:w-auto bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-6 rounded-lg">Simpan</button>
            </form>
            <h2 class="text-xl font-semibold text-purple-700 mt-10 mb-4">Daftar Siswa</h2>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse bg-gray-50 rounded-lg shadow">
                    <thead>
                        <tr class="bg-purple-600 text-white text-left">
                            <th class="px-6 py-3">Nama</th>
                            <th class="px-6 py-3">Kelas</th>
                            <th class="px-6 py-3">Nomor HP</th>
                            <th class="px-6 py-3 text-center">QR Code</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr class="border-b text-gray-700">
                            <td class="px-6 py-3">{{ $item->nama }}</td>
                            <td class="px-6 py-3">{{ $item->kelas }}</td>
                            <td class="px-6 py-3">{{ $item->no_hp }}</td>
                            <td class="px-6 py-3 text-center">
                                <a href="{{ route('qrcode.generate', $item->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Generate</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>

        <footer class="bg-red-700 text-white py-6 mt-10 text-center">
            <p>&copy; 2025 Silo.</p>
            <div class="mt-2">
                <a href="#" class="hover:text-gray-300 mx-2">Kebijakan Privasi</a>
                <a href="#" class="hover:text-gray-300 mx-2">Syarat dan Ketentuan</a>
            </div>
        </footer>
    </div>
</body>
</html>
