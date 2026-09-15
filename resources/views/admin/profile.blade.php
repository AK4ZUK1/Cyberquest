<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CYBERQUEST - Profil Pentadbir</title>
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
                <!-- 1. Profil Pentadbir Button (Active Style) -->
                <a href="{{ url('/admin/profile') }}" title="Profil Pentadbir" 
                    class="w-10 h-10 rounded-xl bg-indigo-50 border border-indigo-200 text-[#524bf2] flex items-center justify-center transition-all shadow-sm">
                    <i class="fa-solid fa-user-shield text-sm"></i>
                </a>

                <!-- 2. Tetapan Button -->
                <a href="{{ url('/admin/settings') }}" title="Tetapan" 
                    class="w-10 h-10 rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 flex items-center justify-center transition-all shadow-sm group">
                    <i class="fa-solid fa-gear text-sm group-hover:text-[#524bf2]"></i>
                </a>

                <!-- 3. Makluman Button -->
                <button title="Makluman" 
                    class="relative w-10 h-10 rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 flex items-center justify-center transition-all shadow-sm group">
                    <i class="fa-regular fa-bell text-sm group-hover:text-[#524bf2]"></i>
                    <span class="absolute top-2.5 right-2.5 w-2 h-2 bg-rose-500 rounded-full border border-white"></span>
                </button>
            </div>
        </header>

        <!-- Profile Body Content -->
        <div class="p-8 max-w-7xl w-full mx-auto space-y-6">

            <!-- Title & Subtitle -->
            <div>
                <h1 class="text-2xl font-extrabold text-slate-900">
                    Profil Pentadbir
                </h1>
                <p class="text-xs font-medium text-slate-500 mt-1">
                    Urus bukti kelayakan pentadbir sistem dan maklumat peribadi anda.
                </p>
            </div>

            <!-- PROFILE CARD CONTAINER -->
            <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
                
                <!-- Purple Header Banner -->
                <div class="h-40 bg-[#524bf2] w-full"></div>

                <!-- Profile Content Body -->
                <div class="px-8 pb-10 relative">

                    <!-- Overlapping Shield Avatar -->
                    <div class="relative -top-12 mb-2 flex justify-between items-end">
                        <div class="w-24 h-24 bg-[#0b0f19] rounded-2xl flex items-center justify-center text-white border-4 border-white shadow-lg">
                            <i class="fa-solid fa-shield-halved text-3xl"></i>
                        </div>
                        
                        <!-- Akses Induk Badge -->
                        <div class="mb-4">
                            <span class="inline-flex items-center space-x-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-indigo-50 text-[#524bf2] border border-indigo-100">
                                <i class="fa-solid fa-lock text-[10px]"></i>
                                <span>Akses Induk</span>
                            </span>
                        </div>
                    </div>

                    <!-- Details & Security Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12">
                        
                        <!-- Column 1: Butiran Peribadi -->
                        <div class="space-y-4">
                            <h2 class="text-base font-bold text-slate-900 mb-2">Butiran Peribadi</h2>

                            <!-- Nama Penuh -->
                            <div>
                                <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">NAMA PENUH</label>
                                <input type="text" value="Pentadbir Sistem" readonly
                                    class="w-full px-4 py-3 bg-[#f8fafc] border border-slate-200 rounded-xl text-xs font-medium text-slate-800 focus:outline-none cursor-default">
                            </div>

                            <!-- Nombor Telefon -->
                            <div>
                                <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">NOMBOR TELEFON</label>
                                <input type="text" value="+60 3-8888 9999" readonly
                                    class="w-full px-4 py-3 bg-[#f8fafc] border border-slate-200 rounded-xl text-xs font-medium text-slate-800 focus:outline-none cursor-default">
                            </div>

                            <!-- Alamat E-mel -->
                            <div>
                                <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">ALAMAT E-MEL</label>
                                <input type="email" value="admin@cyberquest.my" readonly
                                    class="w-full px-4 py-3 bg-[#f8fafc] border border-slate-200 rounded-xl text-xs font-medium text-slate-800 focus:outline-none cursor-default">
                            </div>
                        </div>

                        <!-- Column 2: Keselamatan -->
                        <div class="space-y-4">
                            <h2 class="text-base font-bold text-slate-900 mb-2">Keselamatan</h2>

                            <!-- Kata Laluan -->
                            <div>
                                <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">KATA LALUAN</label>
                                <div class="relative flex items-center">
                                    <input type="password" value="••••••••••••" readonly
                                        class="w-full px-4 py-3 bg-[#f8fafc] border border-slate-200 rounded-xl text-xs font-medium text-slate-800 focus:outline-none cursor-default pr-20">
                                    <a href="#" class="absolute right-4 text-xs font-bold text-[#524bf2] hover:underline">
                                        Tukar
                                    </a>
                                </div>
                            </div>

                            <!-- Log Masuk Terakhir -->
                            <div>
                                <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">LOG MASUK TERAKHIR</label>
                                <input type="text" value="Hari ini, 09:41 AM (IP: 115.164.x.x)" readonly
                                    class="w-full px-4 py-3 bg-[#f8fafc] border border-slate-200 rounded-xl text-xs font-medium text-slate-800 focus:outline-none cursor-default">
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </main>

</body>
</html>