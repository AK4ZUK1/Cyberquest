<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyberquest - Log Masuk</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-[#0a192f] min-h-screen flex items-center justify-center p-4 font-sans">

    <div class="bg-white w-full max-w-md rounded-3xl p-8 sm:p-10 shadow-2xl">
        
        <!-- Header & Logo -->
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-[#524bf2] rounded-2xl mx-auto flex items-center justify-center text-white text-2xl mb-4 shadow-lg shadow-indigo-200">
                <i class="fa-solid fa-shield-halved"></i>
            </div>
            <h1 class="text-2xl font-bold text-gray-900 tracking-wide">CYBERQUEST</h1>
            <p class="text-xs font-bold text-[#524bf2] tracking-widest uppercase mt-1">Portal Pengguna</p>
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

        <!-- Real Login Form (Handled by AuthenticatedSessionController) -->
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- Email Input -->
            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-1.5">E-mel Pengguna</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                        <i class="fa-regular fa-envelope text-sm"></i>
                    </div>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full pl-10 pr-4 py-3 bg-[#f8fafc] border border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#524bf2] focus:bg-white text-sm"
                        placeholder="contoh@cyberquest.my">
                </div>
            </div>

            <!-- Password Input -->
            <div>
                <label for="password" class="block text-sm font-semibold text-gray-700 mb-1.5">Kata Laluan</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                        <i class="fa-solid fa-lock text-sm"></i>
                    </div>
                    <input type="password" id="password" name="password" required
                        class="w-full pl-10 pr-4 py-3 bg-[#f8fafc] border border-gray-200 rounded-xl text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#524bf2] focus:bg-white text-sm"
                        placeholder="••••••••••••">
                </div>
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between text-sm pt-1">
                <label class="flex items-center space-x-2 cursor-pointer">
                    <input type="checkbox" name="remember"
                        class="w-4 h-4 text-[#524bf2] bg-gray-100 border-gray-300 rounded focus:ring-[#524bf2] accent-[#524bf2]">
                    <span class="text-gray-700 font-medium">Ingat saya</span>
                </label>
                <a href="#" class="text-[#524bf2] font-semibold hover:underline">
                    Lupa kata laluan?
                </a>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full py-3.5 px-4 bg-[#524bf2] hover:bg-[#4338ca] text-white font-medium rounded-xl shadow-lg shadow-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#524bf2] transition-colors duration-200 flex items-center justify-center space-x-2 text-sm">
                <span>Log Masuk ke Portal</span>
                <i class="fa-solid fa-arrow-right text-xs"></i>
            </button>
        </form>

        <!-- SME Registration Links -->
        <div class="mt-8 pt-6 border-t border-gray-100 text-center space-y-3">
            <p class="text-xs text-gray-500 font-medium">Belum mempunyai akaun PKS?</p>
            <a href="#" 
                class="inline-flex items-center justify-center w-full py-2.5 px-4 border border-[#524bf2] text-[#524bf2] hover:bg-indigo-50 font-semibold rounded-xl text-sm transition-colors duration-200 space-x-2">
                <i class="fa-solid fa-building-user text-xs"></i>
                <span>Daftar Akaun PKS / SME</span>
            </a>
        </div>

    </div>

</body>
</html>