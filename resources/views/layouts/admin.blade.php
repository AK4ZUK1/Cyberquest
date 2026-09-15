<!DOCTYPE html>
<html lang="ms" class="bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - CyberQuest</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }

        @view-transition {
            navigation: auto;
        }

        ::view-transition-old(root),
        ::view-transition-new(root) {
            animation-duration: 150ms;
        }
    </style>
</head>
<body class="bg-slate-50 font-sans text-slate-800 antialiased min-h-screen flex">

    <!-- Dark Sidebar -->
    <aside class="w-64 bg-[#0B132B] text-slate-300 flex flex-col justify-between shrink-0 min-h-screen sticky top-0 z-50">
        <div>
            <!-- Header / Logo -->
            <div class="px-6 py-6 border-b border-slate-800/60">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-xl bg-[#4F46E5] text-white flex items-center justify-center shadow-lg shadow-indigo-500/30">
                        <i class="fa-solid fa-shield text-lg"></i>
                    </div>
                    <div>
                        <h1 class="text-base font-extrabold text-white tracking-wider leading-none">CYBERQUEST</h1>
                        <span class="text-[10px] font-bold text-indigo-400 uppercase tracking-wider">Portal Pentadbir</span>
                    </div>
                </a>
            </div>

            <!-- Admin Profile Badge -->
            <div class="px-6 py-5 flex items-center space-x-3">
                <div class="w-10 h-10 rounded-full bg-slate-800/80 border border-slate-700/60 flex items-center justify-center text-indigo-400">
                    <i class="fa-solid fa-user-shield text-base"></i>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-white leading-tight">Pentadbir Sistem</h4>
                    <p class="text-xs text-slate-400">Pentadbir Super</p>
                </div>
            </div>

            <!-- Navigation Links -->
            <nav class="px-4 py-2 space-y-1.5">
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center space-x-3.5 px-4 py-3 rounded-2xl text-sm font-semibold transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-[#4F46E5] text-white shadow-lg shadow-indigo-500/20' : 'text-slate-400 hover:text-white hover:bg-slate-800/40' }}">
                    <i class="fa-solid fa-house text-base w-5"></i>
                    <span>Papan Pemuka</span>
                </a>

                <a href="{{ route('admin.pks') }}" 
                   class="flex items-center space-x-3.5 px-4 py-3 rounded-2xl text-sm font-semibold transition-all {{ request()->routeIs('admin.pks*') ? 'bg-[#4F46E5] text-white shadow-lg shadow-indigo-500/20' : 'text-slate-400 hover:text-white hover:bg-slate-800/40' }}">
                    <i class="fa-solid fa-store text-base w-5"></i>
                    <span>Pengurusan PKS</span>
                </a>

                <a href="{{ route('admin.fasilitator') }}" 
                   class="flex items-center space-x-3.5 px-4 py-3 rounded-2xl text-sm font-semibold transition-all {{ request()->routeIs('admin.fasilitator*') ? 'bg-[#4F46E5] text-white shadow-lg shadow-indigo-500/20' : 'text-slate-400 hover:text-white hover:bg-slate-800/40' }}">
                    <i class="fa-solid fa-user-group text-base w-5"></i>
                    <span>Fasilitator</span>
                </a>

                <a href="{{ route('admin.jurulatih') }}" 
                   class="flex items-center space-x-3.5 px-4 py-3 rounded-2xl text-sm font-semibold transition-all {{ request()->routeIs('admin.jurulatih*') ? 'bg-[#4F46E5] text-white shadow-lg shadow-indigo-500/20' : 'text-slate-400 hover:text-white hover:bg-slate-800/40' }}">
                    <i class="fa-solid fa-graduation-cap text-base w-5"></i>
                    <span>Jurulatih</span>
                </a>

                <a href="{{ route('admin.modul') }}" 
                   class="flex items-center space-x-3.5 px-4 py-3 rounded-2xl text-sm font-semibold transition-all {{ request()->routeIs('admin.modul*') ? 'bg-[#4F46E5] text-white shadow-lg shadow-indigo-500/20' : 'text-slate-400 hover:text-white hover:bg-slate-800/40' }}">
                    <i class="fa-solid fa-book-open text-base w-5"></i>
                    <span>Pengurusan Modul</span>
                </a>

                <a href="#" 
                   class="flex items-center space-x-3.5 px-4 py-3 rounded-2xl text-sm font-semibold transition-all text-slate-400 hover:text-white hover:bg-slate-800/40">
                    <i class="fa-solid fa-chart-line text-base w-5"></i>
                    <span>Kemajuan Sistem</span>
                </a>

                <a href="#" 
                   class="flex items-center space-x-3.5 px-4 py-3 rounded-2xl text-sm font-semibold transition-all text-slate-400 hover:text-white hover:bg-slate-800/40">
                    <i class="fa-regular fa-calendar-days text-base w-5"></i>
                    <span>Penjejakan Susulan</span>
                </a>
            </nav>
        </div>

        <!-- Sidebar Footer / Logout -->
        <div class="p-4 border-t border-slate-800/60">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center space-x-2 px-4 py-3 rounded-2xl text-sm font-bold text-rose-500 bg-rose-500/10 border border-rose-500/20 hover:bg-rose-500/20 transition-all">
                    <i class="fa-solid fa-arrow-right-from-bracket text-base"></i>
                    <span>Log Keluar</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Container -->
    <div class="flex-1 flex flex-col min-w-0 bg-slate-50 relative">

        <!-- Fixed Header matching PKS / Fasilitator button sizes -->
        <header class="h-20 w-full bg-slate-50 flex items-center justify-end px-8 sticky top-0 z-40 shrink-0">
            <div class="flex items-center space-x-3">
                <!-- 1. Security / Profile Icon Button -->
                <a href="{{ route('admin.profile') }}" 
                   class="w-11 h-11 rounded-full border border-slate-200 bg-white text-slate-600 flex items-center justify-center hover:bg-slate-100 transition-colors shadow-sm shrink-0 {{ request()->routeIs('admin.profile') ? 'border-[#4F46E5] text-[#4F46E5]' : '' }}"
                   title="Profil & Keselamatan">
                    <i class="fa-solid fa-user-shield text-base"></i>
                </a>

                <!-- 2. Settings Icon Button -->
                <a href="{{ route('admin.settings') }}" 
                   class="w-11 h-11 rounded-full border border-slate-200 bg-white text-slate-600 flex items-center justify-center hover:bg-slate-100 transition-colors shadow-sm shrink-0 {{ request()->routeIs('admin.settings') ? 'border-[#4F46E5] text-[#4F46E5]' : '' }}"
                   title="Tetapan">
                    <i class="fa-solid fa-gear text-base"></i>
                </a>

                <!-- 3. Notifications Icon Button -->
                <button type="button" 
                        class="relative w-11 h-11 rounded-full border border-slate-200 bg-white text-slate-600 flex items-center justify-center hover:bg-slate-100 transition-colors shadow-sm shrink-0"
                        title="Pemberitahuan">
                    <i class="fa-regular fa-bell text-base"></i>
                    <span class="absolute top-2.5 right-2.5 w-2 h-2 bg-rose-500 rounded-full ring-2 ring-white"></span>
                </button>
            </div>
        </header>

        <!-- Main Body Content -->
        <main class="flex-1 px-8 pb-10">
            @yield('content')
        </main>

    </div>

</body>
</html>