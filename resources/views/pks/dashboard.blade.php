<!DOCTYPE html>
<html lang="ms" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Cyberquest - PKS Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 h-full flex justify-center items-center font-sans antialiased">

    <!-- Mobile Frame Container (Simulates a clean phone screen size on desktop, full width on mobile) -->
    <div class="w-full max-w-md h-full sm:h-[90vh] sm:rounded-3xl bg-[#f8fafc] shadow-2xl flex flex-col overflow-hidden relative border border-gray-200">

        <!-- Scrollable Content Area -->
        <div class="flex-1 overflow-y-auto pb-6">
            
            <!-- Header Section -->
            <div class="bg-[#524bf2] px-6 pt-8 pb-6 rounded-b-[30px] text-white shadow-md">
                <div class="flex items-center justify-between mb-4">
                    <h1 class="text-lg font-bold tracking-wide">Laman Utama</h1>
                    <button class="w-9 h-9 bg-white/10 rounded-full flex items-center justify-center text-white hover:bg-white/20 transition-colors">
                        <i class="fa-regular fa-bell text-sm"></i>
                    </button>
                </div>

                <!-- User Greeting Card -->
                <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-4 flex items-center justify-between">
                    <div>
                        <p class="text-xs text-indigo-100 font-medium">Selamat Pagi,</p>
                        <h2 class="text-base font-bold text-white mt-0.5">Ali Fried Chicken 👋</h2>
                        <p class="text-[11px] text-indigo-200 mt-1">Mari jadikan perniagaan anda lebih selamat hari ini.</p>
                    </div>
                    <div class="text-white text-2xl pl-2">
                        <i class="fa-solid fa-shield-halved text-indigo-200"></i>
                    </div>
                </div>
            </div>

            <!-- Main Body Content -->
            <div class="px-5 pt-5 space-y-4">
                
                <!-- Progress Box -->
                <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100">
                    <div class="flex justify-between items-center text-xs font-semibold mb-2">
                        <span class="text-gray-700">Kemajuan Saya</span>
                        <span class="text-[#524bf2]">10%</span>
                    </div>
                    <div class="w-full bg-gray-100 h-2 rounded-full overflow-hidden">
                        <div class="bg-[#524bf2] h-full rounded-full" style="width: 10%"></div >
                    </div>
                    <p class="text-[10px] text-gray-400 mt-2">Diteruskan usaha!</p>
                </div>

                <!-- Journey Section -->
                <div>
                    <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Perjalanan Saya</h3>
                    
                    <div class="space-y-2.5">
                        <!-- Step 1 -->
                        <a href="#" class="bg-white p-3.5 rounded-xl border border-gray-100 flex items-center justify-between shadow-sm hover:border-indigo-200 transition-all">
                            <div class="flex items-center space-x-3">
                                <div class="w-9 h-9 bg-emerald-50 text-emerald-600 rounded-lg flex items-center justify-center text-sm">
                                    <i class="fa-solid fa-file-shield"></i>
                                </div>
                                <div>
                                    <h4 class="text-xs font-bold text-gray-800">1. Profil Risiko</h4>
                                    <p class="text-[10px] text-gray-400">Belum Mula</p>
                                </div>
                            </div>
                            <i class="fa-solid fa-chevron-right text-gray-300 text-xs"></i>
                        </a>

                        <!-- Step 2 -->
                        <a href="#" class="bg-white p-3.5 rounded-xl border border-gray-100 flex items-center justify-between shadow-sm hover:border-indigo-200 transition-all">
                            <div class="flex items-center space-x-3">
                                <div class="w-9 h-9 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center text-sm">
                                    <i class="fa-solid fa-book"></i>
                                </div>
                                <div>
                                    <h4 class="text-xs font-bold text-gray-800">2. Modul Pembelajaran</h4>
                                    <p class="text-[10px] text-gray-400">0/6 Selesai</p>
                                </div>
                            </div>
                            <i class="fa-solid fa-chevron-right text-gray-300 text-xs"></i>
                        </a>

                        <!-- Step 3 -->
                        <a href="#" class="bg-white p-3.5 rounded-xl border border-gray-100 flex items-center justify-between shadow-sm hover:border-indigo-200 transition-all">
                            <div class="flex items-center space-x-3">
                                <div class="w-9 h-9 bg-amber-50 text-amber-600 rounded-lg flex items-center justify-center text-sm">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                </div>
                                <div>
                                    <h4 class="text-xs font-bold text-gray-800">3. Pasca Penilaian</h4>
                                    <p class="text-[10px] text-gray-400">Belum Mula</p>
                                </div>
                            </div>
                            <i class="fa-solid fa-chevron-right text-gray-300 text-xs"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>

        <!-- Universal Sticky Bottom Navigation Component -->
        <x-pks-bottom-nav />

    </div>

</body>
</html>