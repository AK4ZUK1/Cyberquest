<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyberquest - PKS Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen flex justify-center font-sans pb-24">

    <!-- Mobile Frame Container (Optimized for Phone UI) -->
    <div class="w-full max-w-md bg-gray-50 min-h-screen relative shadow-xl flex flex-col">

        <!-- Top Header Banner -->
        <div class="bg-[#524bf2] px-6 pt-8 pb-16 rounded-b-[35px] text-white relative shadow-md">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-xl font-bold tracking-wide">Laman Utama</h1>
                <button class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-white/25 transition">
                    <i class="fa-regular fa-bell text-lg"></i>
                </button>
            </div>

            <!-- Greeting Card -->
            <div class="bg-white/10 backdrop-blur-md border border-white/20 p-5 rounded-2xl flex items-center justify-between">
                <div>
                    <p class="text-xs text-indigo-200 font-medium">Selamat Pagi,</p>
                    <h2 class="text-lg font-bold mt-0.5">{{ auth()->user()->name ?? 'Kedai Maju' }} 👋</h2>
                    <p class="text-[11px] text-indigo-100 mt-1 leading-relaxed">Mari jadikan perniagaan anda lebih selamat hari ini.</p>
                </div>
                <div class="text-indigo-300 text-3xl pl-2">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="px-5 -mt-8 space-y-6 flex-1">

            <!-- Kemajuan Saya (Overall Progress Card) -->
            <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100">
                <div class="flex justify-between items-center mb-3">
                    <h3 class="text-sm font-bold text-gray-800">Kemajuan Saya</h3>
                    <span class="text-lg font-extrabold text-[#524bf2]">10%</span>
                </div>
                <!-- Progress Bar -->
                <div class="w-full bg-gray-100 h-2.5 rounded-full overflow-hidden mb-2">
                    <div class="bg-[#524bf2] h-full rounded-full w-[10]"></div>
                </div>
                <p class="text-[11px] text-gray-400 font-medium">Teruskan usaha!</p>
            </div>

            <!-- Perjalanan Saya (Journey Steps) -->
            <div>
                <h3 class="text-sm font-bold text-gray-800 mb-3">Perjalanan Saya</h3>
                
                <div class="space-y-3">
                    <!-- Step 1 -->
                    <a href="#" class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between hover:border-[#524bf2] transition group">
                        <div class="flex items-center space-x-3.5">
                            <div class="w-10 h-10 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center font-bold text-sm">
                                <i class="fa-solid fa-file-lines"></i>
                            </div>
                            <div>
                                <h4 class="text-xs font-bold text-gray-900 group-hover:text-[#524bf2] transition">1. Profil Risiko</h4>
                                <p class="text-[11px] text-amber-600 font-medium mt-0.5">Belum Mula</p>
                            </div>
                        </div>
                        <i class="fa-solid fa-chevron-right text-gray-300 text-xs"></i>
                    </a>

                    <!-- Step 2 -->
                    <a href="#" class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between hover:border-[#524bf2] transition group">
                        <div class="flex items-center space-x-3.5">
                            <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center font-bold text-sm">
                                <i class="fa-solid fa-book-open"></i>
                            </div>
                            <div>
                                <h4 class="text-xs font-bold text-gray-900 group-hover:text-[#524bf2] transition">2. Modul Pembelajaran</h4>
                                <p class="text-[11px] text-gray-400 font-medium mt-0.5">0/6 Selesai</p>
                            </div>
                        </div>
                        <i class="fa-solid fa-chevron-right text-gray-300 text-xs"></i>
                    </a>

                    <!-- Step 3 -->
                    <a href="#" class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between hover:border-[#524bf2] transition group">
                        <div class="flex items-center space-x-3.5">
                            <div class="w-10 h-10 bg-amber-50 text-amber-600 rounded-xl flex items-center justify-center font-bold text-sm">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                            </div>
                            <div>
                                <h4 class="text-xs font-bold text-gray-900 group-hover:text-[#524bf2] transition">3. Pasca Penilaian</h4>
                                <p class="text-[11px] text-amber-600 font-medium mt-0.5">Belum Mula</p>
                            </div>
                        </div>
                        <i class="fa-solid fa-chevron-right text-gray-300 text-xs"></i>
                    </a>
                </div>
            </div>

        </div>

        <!-- Bottom Mobile Navigation Bar -->
        <div class="absolute bottom-0 left-0 right-0 bg-white border-t border-gray-100 py-2.5 px-6 flex justify-between items-center shadow-lg rounded-t-2xl">
            <a href="#" class="flex flex-col items-center text-[#524bf2]">
                <i class="fa-solid fa-house text-base"></i>
                <span class="text-[10px] font-bold mt-1">Utama</span>
            </a>
            <a href="#" class="flex flex-col items-center text-gray-400 hover:text-[#524bf2] transition">
                <i class="fa-solid fa-book text-base"></i>
                <span class="text-[10px] font-medium mt-1">Belajar</span>
            </a>
            <a href="#" class="flex flex-col items-center text-gray-400 hover:text-[#524bf2] transition">
                <i class="fa-solid fa-file-pen text-base"></i>
                <span class="text-[10px] font-medium mt-1">Penilaian</span>
            </a>
            <a href="#" class="flex flex-col items-center text-gray-400 hover:text-[#524bf2] transition">
                <i class="fa-regular fa-calendar text-base"></i>
                <span class="text-[10px] font-medium mt-1">Kemajuan</span>
            </a>
            <a href="#" class="flex flex-col items-center text-gray-400 hover:text-[#524bf2] transition">
                <i class="fa-regular fa-user text-base"></i>
                <span class="text-[10px] font-medium mt-1">Profil</span>
            </a>
        </div>

    </div>

</body>
</html>