<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CYBERQUEST - Tetapan Sistem</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-[#f8fafc] text-slate-800 antialiased min-h-screen flex">

    <!-- SIDEBAR -->
    <x-sidebar />

    <!-- MAIN CONTENT AREA -->
    <main class="flex-1 flex flex-col min-w-0 overflow-y-auto">

        <!-- Top Header Controls -->
        <header class="flex justify-between items-center px-8 py-5 border-b border-slate-200/80 bg-white/50 backdrop-blur-sm sticky top-0 z-10">
            <div><!-- Spacer --></div>
            
            <div class="flex items-center space-x-2">
                <!-- 1. Profil Pentadbir Button -->
                <a href="{{ url('/admin/profile') }}" title="Profil Pentadbir" 
                    class="w-10 h-10 rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 flex items-center justify-center transition-all shadow-sm group">
                    <i class="fa-solid fa-user-shield text-sm group-hover:text-[#524bf2]"></i>
                </a>

                <!-- 2. Tetapan Button (Active State) -->
                <a href="{{ url('/admin/settings') }}" title="Tetapan" 
                    class="w-10 h-10 rounded-xl bg-indigo-50 border border-indigo-200 text-[#524bf2] flex items-center justify-center transition-all shadow-sm">
                    <i class="fa-solid fa-gear text-sm"></i>
                </a>

                <!-- 3. Makluman Button -->
                <button title="Makluman" 
                    class="relative w-10 h-10 rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 flex items-center justify-center transition-all shadow-sm group">
                    <i class="fa-regular fa-bell text-sm group-hover:text-[#524bf2]"></i>
                    <span class="absolute top-2.5 right-2.5 w-2 h-2 bg-rose-500 rounded-full border border-white"></span>
                </button>
            </div>
        </header>

        <!-- Settings Body Content -->
        <div class="p-8 max-w-7xl w-full mx-auto space-y-6">

            <!-- Title & Subtitle -->
            <div>
                <h1 class="text-2xl font-extrabold text-slate-900">
                    Tetapan Sistem
                </h1>
                <p class="text-xs font-medium text-slate-500 mt-1">
                    Konfigurasi pembolehubah platform global dan peraturan automasi.
                </p>
            </div>

            <!-- SETTINGS CARDS GRID -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Card 1: Makluman Global -->
                <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm space-y-6">
                    
                    <!-- Section Title -->
                    <div class="flex items-center space-x-2.5 text-[#524bf2]">
                        <i class="fa-regular fa-bell text-base"></i>
                        <h2 class="text-base font-bold text-slate-900">Makluman Global</h2>
                    </div>

                    <!-- Options List -->
                    <div class="space-y-5">
                        
                        <!-- Toggle 1: Makluman E-mel -->
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-xs font-bold text-slate-900">Makluman E-mel</h3>
                                <p class="text-[11px] text-slate-400 font-medium mt-0.5">Hantar e-mel ringkasan mingguan.</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer" checked>
                                <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#524bf2]"></div>
                            </label>
                        </div>

                        <!-- Toggle 2: Amaran SMS -->
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-xs font-bold text-slate-900">Amaran SMS</h3>
                                <p class="text-[11px] text-slate-400 font-medium mt-0.5">Amaran segera melalui SMS.</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer">
                                <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#524bf2]"></div>
                            </label>
                        </div>

                    </div>
                </div>

                <!-- Card 2: Operasi Sistem -->
                <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm space-y-6">
                    
                    <!-- Section Title -->
                    <div class="flex items-center space-x-2.5 text-[#524bf2]">
                        <i class="fa-solid fa-server text-base"></i>
                        <h2 class="text-base font-bold text-slate-900">Operasi Sistem</h2>
                    </div>

                    <!-- Options List -->
                    <div class="space-y-5">
                        
                        <!-- Toggle 1: Sandaran Automatik -->
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-xs font-bold text-slate-900">Sandaran Automatik</h3>
                                <p class="text-[11px] text-slate-400 font-medium mt-0.5">Sandarkan data setiap hari.</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer" checked>
                                <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#524bf2]"></div>
                            </label>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </main>

</body>
</html>