@props(['active' => ''])

<aside class="w-64 bg-[#0b0f19] text-slate-300 flex flex-col justify-between shrink-0 min-h-screen p-4 border-r border-slate-800">
    <div>
        <!-- Header Brand Logo -->
        <div class="flex items-center space-x-3 px-3 py-4 mb-4">
            <div class="w-10 h-10 bg-[#524bf2] rounded-xl flex items-center justify-center text-white shadow-md shadow-indigo-900/50">
                <i class="fa-solid fa-shield-halved text-lg"></i>
            </div>
            <div>
                <h1 class="text-white font-extrabold text-base leading-tight tracking-wide">CYBERQUEST</h1>
                <p class="text-[10px] text-indigo-400 font-bold uppercase tracking-widest">Portal Pentadbir</p>
            </div>
        </div>

        <!-- Profile Badge -->
        <div class="bg-slate-900/80 rounded-2xl p-3 mb-6 flex items-center space-x-3 border border-slate-800">
            <div class="w-9 h-9 rounded-full bg-slate-800 flex items-center justify-center text-slate-300 border border-slate-700">
                <i class="fa-solid fa-user-shield text-sm"></i>
            </div>
            <div class="overflow-hidden">
                <h2 class="text-xs font-bold text-white truncate">Pentadbir Sistem</h2>
                <p class="text-[10px] text-slate-400 font-medium truncate">Pentadbir Super</p>
            </div>
        </div>

        <!-- Navigation Links -->
        <!-- Papan Pemuka -->
<a href="{{ route('admin.dashboard') }}" 
   class="flex items-center space-x-3 px-4 py-3 rounded-2xl text-sm transition-all {{ request()->routeIs('admin.dashboard*') ? 'bg-[#524bf2] text-white font-semibold' : 'text-slate-400 hover:text-white hover:bg-slate-800/50 font-medium' }}">
    <i class="fa-solid fa-house text-sm"></i>
    <span>Papan Pemuka</span>
</a>

<!-- Pengurusan PKS -->
<a href="{{ route('admin.pks') }}" 
   class="flex items-center space-x-3 px-4 py-3 rounded-2xl text-sm transition-all {{ request()->routeIs('admin.pks*') ? 'bg-[#524bf2] text-white font-semibold' : 'text-slate-400 hover:text-white hover:bg-slate-800/50 font-medium' }}">
    <i class="fa-solid fa-store text-sm"></i>
    <span>Pengurusan PKS</span>
</a>

<!-- Fasilitator -->
<a href="{{ route('admin.fasilitator') }}" 
   class="flex items-center space-x-3 px-4 py-3 rounded-2xl text-sm transition-all {{ request()->routeIs('admin.fasilitator*') ? 'bg-[#524bf2] text-white font-semibold' : 'text-slate-400 hover:text-white hover:bg-slate-800/50 font-medium' }}">
    <i class="fa-solid fa-user-gear text-sm"></i>
    <span>Fasilitator</span>
</a>

<!-- Jurulatih -->
<a href="{{ route('admin.jurulatih') }}" 
   class="flex items-center space-x-3 px-4 py-3 rounded-2xl text-sm transition-all {{ request()->routeIs('admin.jurulatih*') ? 'bg-[#524bf2] text-white font-semibold' : 'text-slate-400 hover:text-white hover:bg-slate-800/50 font-medium' }}">
    <i class="fa-solid fa-user-group text-sm"></i>
    <span>Jurulatih</span>
</a>

<!-- Pengurusan Modul -->
<a href="{{ Route::has('admin.modul') ? route('admin.modul') : url('/admin/modul') }}" 
    class="flex items-center space-x-3 px-4 py-3 rounded-2xl text-sm transition-all {{ request()->is('admin/modul*') ? 'bg-[#524bf2] text-white font-semibold shadow-md shadow-indigo-500/20' : 'text-slate-400 hover:text-white hover:bg-slate-800/50 font-medium' }}">
     <i class="fa-solid fa-book-open text-sm"></i>
     <span>Pengurusan Modul</span>
</a>

<!-- Kemajuan Sistem -->
<a href="{{ Route::has('admin.kemajuan') ? route('admin.kemajuan') : url('/admin/kemajuan') }}" 
   class="flex items-center space-x-3 px-4 py-3 rounded-2xl text-sm transition-all {{ request()->is('admin/kemajuan*') ? 'bg-[#524bf2] text-white font-semibold' : 'text-slate-400 hover:text-white hover:bg-slate-800/50 font-medium' }}">
    <i class="fa-solid fa-chart-line text-sm"></i>
    <span>Kemajuan Sistem</span>
</a>

<!-- Penjejakan Susulan -->
<a href="{{ Route::has('admin.penjejakan') ? route('admin.penjejakan') : url('/admin/penjejakan') }}" 
   class="flex items-center space-x-3 px-4 py-3 rounded-2xl text-sm transition-all {{ request()->is('admin/penjejakan*') ? 'bg-[#524bf2] text-white font-semibold' : 'text-slate-400 hover:text-white hover:bg-slate-800/50 font-medium' }}">
    <i class="fa-solid fa-list-check text-sm"></i>
    <span>Penjejakan Susulan</span>
</a>
    </div>

    <!-- Logout Button -->
    <div class="pt-4 border-t border-slate-800/80">
        <a href="{{ url('/') }}" class="w-full flex items-center justify-center space-x-2 px-4 py-2.5 rounded-xl text-xs font-semibold text-rose-400 border border-rose-500/20 bg-rose-500/10 hover:bg-rose-500/20 transition-all">
            <i class="fa-solid fa-arrow-right-from-bracket text-xs"></i>
            <span>Log Keluar</span>
        </a>
    </div>
</aside>