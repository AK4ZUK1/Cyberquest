<!DOCTYPE html>
<html lang="ms" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Cyberquest - Profil Pengguna</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 h-full flex justify-center items-center font-sans antialiased">

    <!-- Mobile Frame Container -->
    <div class="w-full max-w-md h-full sm:h-[90vh] sm:rounded-3xl bg-[#f8fafc] shadow-2xl flex flex-col overflow-hidden relative border border-gray-200">

        <!-- Top Header Bar -->
        <div class="bg-white px-5 py-4 flex items-center justify-between border-b border-gray-100 flex-shrink-0">
            <a href="{{ route('pks.dashboard') }}" class="w-8 h-8 rounded-full flex items-center justify-center text-gray-700 hover:bg-gray-100 transition-colors">
                <i class="fa-solid fa-chevron-left text-sm"></i>
            </a>
            <h1 class="text-base font-bold text-gray-900">Profil Pengguna</h1>
            <div class="w-8"></div> <!-- Spacer for alignment -->
        </div>

        <!-- Scrollable Content Area -->
        <div class="flex-1 overflow-y-auto px-5 py-6 space-y-6">
            
            <!-- User Info Card Header -->
            <div class="flex items-center space-x-4">
                <div class="w-16 h-16 bg-[#524bf2] rounded-full flex items-center justify-center text-white text-xl font-bold shadow-md flex-shrink-0">
                    {{ strtoupper(substr(Auth::user()->name ?? 'K M', 0, 2)) }}
                </div>
                <div>
                    <h2 class="text-lg font-bold text-gray-900 leading-snug">{{ Auth::user()->name ?? 'Kedai Maju' }}</h2>
                    <p class="text-xs text-gray-500 mt-0.5">Peruncitan / Kedai</p>
                </div>
            </div>

            <!-- Menu Options List -->
            <div class="space-y-3">
                
                <!-- Profil Perniagaan -->
                <a href="#" class="bg-white p-4 rounded-2xl border border-gray-100 flex items-center justify-between shadow-sm hover:border-indigo-200 transition-all">
                    <div class="flex items-center space-x-3.5 text-gray-700">
                        <div class="w-9 h-9 bg-gray-50 text-gray-600 rounded-xl flex items-center justify-center text-sm">
                            <i class="fa-regular fa-user"></i>
                        </div>
                        <span class="text-sm font-semibold text-gray-800">Profil Perniagaan</span>
                    </div>
                    <i class="fa-solid fa-chevron-right text-gray-300 text-xs"></i>
                </a>

                <!-- Sijil & Lencana Saya -->
                <a href="#" class="bg-white p-4 rounded-2xl border border-gray-100 flex items-center justify-between shadow-sm hover:border-indigo-200 transition-all">
                    <div class="flex items-center space-x-3.5 text-gray-700">
                        <div class="w-9 h-9 bg-gray-50 text-gray-600 rounded-xl flex items-center justify-center text-sm">
                            <i class="fa-solid fa-award"></i>
                        </div>
                        <div>
                            <span class="text-sm font-semibold text-gray-800 block">Sijil & Lencana Saya</span>
                            <span class="text-[10px] text-gray-400">Lengkapkan Penilaian untuk buka</span>
                        </div>
                    </div>
                    <i class="fa-solid fa-chevron-right text-gray-300 text-xs"></i>
                </a>

                <!-- Tetapan -->
                <a href="#" class="bg-white p-4 rounded-2xl border border-gray-100 flex items-center justify-between shadow-sm hover:border-indigo-200 transition-all">
                    <div class="flex items-center space-x-3.5 text-gray-700">
                        <div class="w-9 h-9 bg-gray-50 text-gray-600 rounded-xl flex items-center justify-center text-sm">
                            <i class="fa-solid fa-gear"></i>
                        </div>
                        <span class="text-sm font-semibold text-gray-800">Tetapan</span>
                    </div>
                    <i class="fa-solid fa-chevron-right text-gray-300 text-xs"></i>
                </a>

                <!-- Bantuan & Sokongan -->
                <a href="#" class="bg-white p-4 rounded-2xl border border-gray-100 flex items-center justify-between shadow-sm hover:border-indigo-200 transition-all">
                    <div class="flex items-center space-x-3.5 text-gray-700">
                        <div class="w-9 h-9 bg-gray-50 text-gray-600 rounded-xl flex items-center justify-center text-sm">
                            <i class="fa-regular fa-circle-question"></i>
                        </div>
                        <span class="text-sm font-semibold text-gray-800">Bantuan & Sokongan</span>
                    </div>
                    <i class="fa-solid fa-chevron-right text-gray-300 text-xs"></i>
                </a>

                <!-- Log Keluar (Form to handle POST destruction and direct back to login) -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full bg-white p-4 rounded-2xl border border-gray-100 flex items-center justify-between shadow-sm hover:border-red-100 hover:bg-red-50/20 transition-all text-left">
                        <div class="flex items-center space-x-3.5 text-red-500">
                            <div class="w-9 h-9 bg-red-50 text-red-500 rounded-xl flex items-center justify-center text-sm">
                                <i class="fa-solid fa-right-from-bracket"></i>
                            </div>
                            <span class="text-sm font-semibold">Log Keluar</span>
                        </div>
                        <i class="fa-solid fa-chevron-right text-gray-300 text-xs"></i>
                    </button>
                </form>

            </div>

        </div>

        <!-- Universal Sticky Bottom Navigation Component -->
        <x-pks-bottom-nav />

    </div>

</body>
</html>