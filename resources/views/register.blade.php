<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyberquest - Daftar Akaun PKS</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-[#0a192f] min-h-screen flex items-center justify-center p-4 font-sans">

    <div class="bg-white w-full max-w-md rounded-3xl p-8 sm:p-10 shadow-2xl my-6">
        
        <!-- Header & Logo -->
        <div class="text-center mb-6">
            <div class="w-16 h-16 bg-[#524bf2] rounded-2xl mx-auto flex items-center justify-center text-white text-2xl mb-4 shadow-lg shadow-indigo-200">
                <i class="fa-solid fa-building-user"></i>
            </div>
            <h1 class="text-2xl font-bold text-gray-900 tracking-wide">CYBERQUEST</h1>
            <p class="text-xs font-bold text-[#524bf2] tracking-widest uppercase mt-1">Pendaftaran Akaun PKS</p>
        </div>

        <!-- Validation Errors Display -->
        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-50 border border-red-200 text-red-600 text-xs rounded-xl">
                <ul class="list-disc pl-4 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Registration Form -->
        <form method="POST" action="{{ route('register.store') }}" class="space-y-4">
            @csrf

            <!-- Name Input -->
            <div>
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Nama Penuh / Syarikat</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                        <i class="fa-regular fa-user text-sm"></i>
                    </div>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus
                        class="w-full pl-10 pr-4 py-3 bg-[#f8fafc] border border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#524bf2] focus:bg-white text-sm"
                        placeholder="Nama Syarikat / Wakil PKS">
                </div>
            </div>

            <!-- Email Input -->
            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">E-mel Pengguna</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                        <i class="fa-regular fa-envelope text-sm"></i>
                    </div>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                        class="w-full pl-10 pr-4 py-3 bg-[#f8fafc] border border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#524bf2] focus:bg-white text-sm"
                        placeholder="contoh@cyberquest.my">
                </div>
            </div>

            <!-- Password Input -->
            <div>
                <label for="password" class="block text-sm font-semibold text-gray-700 mb-1">Kata Laluan</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                        <i class="fa-solid fa-lock text-sm"></i>
                    </div>
                    <input type="password" id="password" name="password" required
                        class="w-full pl-10 pr-4 py-3 bg-[#f8fafc] border border-gray-200 rounded-xl text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#524bf2] focus:bg-white text-sm"
                        placeholder="••••••••••••">
                </div>
            </div>

            <!-- Confirm Password Input -->
            <div>
                <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-1">Sahkan Kata Laluan</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                        <i class="fa-solid fa-lock-keyhole text-sm"></i>
                    </div>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        class="w-full pl-10 pr-4 py-3 bg-[#f8fafc] border border-gray-200 rounded-xl text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#524bf2] focus:bg-white text-sm"
                        placeholder="••••••••••••">
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full py-3.5 px-4 bg-[#524bf2] hover:bg-[#4338ca] text-white font-medium rounded-xl shadow-lg shadow-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#524bf2] transition-colors duration-200 flex items-center justify-center space-x-2 text-sm mt-2">
                <span>Daftar Akaun Sekarang</span>
                <i class="fa-solid fa-user-plus text-xs"></i>
            </button>
        </form>

        <!-- Back to Login Link -->
        <div class="mt-6 pt-5 border-t border-gray-100 text-center">
            <p class="text-xs text-gray-500 font-medium">Sudah mempunyai akaun?</p>
            <a href="{{ route('login') }}" 
                class="inline-block mt-2 text-xs font-bold text-[#524bf2] hover:underline">
                &larr; Log Masuk ke Portal
            </a>
        </div>

    </div>

</body>
</html>