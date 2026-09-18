<nav class="bg-white border-t border-gray-100 py-2.5 px-6 flex items-center justify-around shadow-[0_-4px_20px_rgba(0,0,0,0.05)] flex-shrink-0 z-50">
    <!-- Utama -->
    <a href="{{ route('pks.dashboard') }}" class="flex flex-col items-center space-y-1 {{ request()->routeIs('pks.dashboard') ? 'text-[#524bf2]' : 'text-gray-400 hover:text-gray-600' }}">
        <i class="fa-solid fa-house text-lg"></i>
        <span class="text-[10px] font-medium">Utama</span>
    </a>

    <!-- Belajar / Modul -->
    <a href="#" class="flex flex-col items-center space-y-1 text-gray-400 hover:text-gray-600">
        <i class="fa-solid fa-book-open text-lg"></i>
        <span class="text-[10px] font-medium">Belajar</span>
    </a>

    <!-- Penilaian -->
    <a href="#" class="flex flex-col items-center space-y-1 text-gray-400 hover:text-gray-600">
        <i class="fa-solid fa-file-lines text-lg"></i>
        <span class="text-[10px] font-medium">Penilaian</span>
    </a>

    <!-- Kemajuan -->
    <a href="#" class="flex flex-col items-center space-y-1 text-gray-400 hover:text-gray-600">
        <i class="fa-solid fa-chart-pie text-lg"></i>
        <span class="text-[10px] font-medium">Kemajuan</span>
    </a>

    <!-- Profil -->
    <a href="{{ route('pks.profile') }}" class="flex flex-col items-center space-y-1 {{ request()->routeIs('pks.profile') ? 'text-[#524bf2]' : 'text-gray-400 hover:text-gray-600' }}">
        <i class="fa-solid fa-user text-lg"></i>
        <span class="text-[10px] font-medium">Profil</span>
    </a>
</nav>