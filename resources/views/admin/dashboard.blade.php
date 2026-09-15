@extends('layouts.admin') {{-- Adjust to match your exact master layout name --}}

@section('content')
<div class="p-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Papan Pemuka</h1>
        <p class="text-gray-500 mt-1">Ringkasan masa nyata dan aktiviti terkini platform CyberQuest.</p>
    </div>

    <!-- Stat Cards Row -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        
        <!-- JUMLAH PKS -->
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
            <div>
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider block mb-2">JUMLAH PKS</span>
                <span class="text-3xl font-extrabold text-gray-900">{{ $totalPks }}</span>
                <a href="{{ route('admin.pks') }}" class="text-xs font-semibold text-indigo-600 hover:text-indigo-800 block mt-3">Urus PKS &rarr;</a>
            </div>
            <div class="w-12 h-12 bg-emerald-50 text-emerald-500 rounded-2xl flex items-center justify-center text-xl">
                🏪
            </div>
        </div>

        <!-- JUMLAH FASILITATOR -->
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
            <div>
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider block mb-2">JUMLAH FASILITATOR</span>
                <span class="text-3xl font-extrabold text-gray-900">{{ $totalFacilitator }}</span>
                <a href="{{ route('admin.fasilitator') }}" class="text-xs font-semibold text-indigo-600 hover:text-indigo-800 block mt-3">Urus Fasilitator &rarr;</a>
            </div>
            <div class="w-12 h-12 bg-amber-50 text-amber-500 rounded-2xl flex items-center justify-center text-xl">
                👨‍💼
            </div>
        </div>

        <!-- JUMLAH JURULATIH -->
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
            <div>
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider block mb-2">JUMLAH JURULATIH</span>
                <span class="text-3xl font-extrabold text-gray-900">{{ $totalTrainer }}</span>
                <a href="{{ route('admin.jurulatih') }}" class="text-xs font-semibold text-indigo-600 hover:text-indigo-800 block mt-3">Urus Jurulatih &rarr;</a>
            </div>
            <div class="w-12 h-12 bg-purple-50 text-purple-500 rounded-2xl flex items-center justify-center text-xl">
                🎓
            </div>
        </div>

        <!-- JUMLAH MODUL -->
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
            <div>
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider block mb-2">JUMLAH MODUL</span>
                <span class="text-3xl font-extrabold text-gray-900">{{ $totalModule }}</span>
                <a href="{{ route('admin.modul') }}" class="text-xs font-semibold text-indigo-600 hover:text-indigo-800 block mt-3">Urus Modul &rarr;</a>
            </div>
            <div class="w-12 h-12 bg-indigo-50 text-indigo-500 rounded-2xl flex items-center justify-center text-xl">
                📖
            </div>
        </div>

    </div>

    <!-- Main Content Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Modul Terkini Ditambah (2 Columns) -->
        <div class="lg:col-span-2">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-bold text-gray-900">Modul Terkini Ditambah</h2>
                <a href="{{ route('admin.modul') }}" class="text-xs font-semibold text-indigo-600 hover:underline">Lihat Semua</a>
            </div>

            <div class="space-y-4">
                @forelse($recentModules as $modul)
                    <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center font-bold">
                                📄
                            </div>
                            <div>
                                <div class="flex items-center space-x-2">
                                    <h3 class="font-bold text-gray-900">{{ $modul->title ?? $modul->name }}</h3>
                                    <span class="text-xs bg-gray-100 text-gray-600 px-2 py-0.5 rounded-md font-medium">
                                        {{ $modul->category ?? 'Keselamatan Siber' }}
                                    </span>
                                </div>
                                <p class="text-xs text-gray-400 mt-1">
                                    Oleh: {{ $modul->trainer->name ?? 'Pengurusan CyberQuest' }} • {{ $modul->created_at ? $modul->created_at->diffForHumans() : 'Baru sahaja' }}
                                </p>
                            </div>
                        </div>
                        <span class="bg-red-50 text-red-500 text-xs font-bold px-3 py-1.5 rounded-lg flex items-center space-x-1">
                            <span>📕</span>
                            <span>PDF</span>
                        </span>
                    </div>
                @empty
                    <div class="bg-white p-6 rounded-2xl border border-gray-100 text-center text-gray-400 text-sm">
                        Tiada modul terkini dijumpai.
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Sidebar Section (1 Column) -->
        <div class="space-y-8">
            
            <!-- Senarai Fasilitator -->
            <div>
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-bold text-gray-900">Senarai Fasilitator</h2>
                    <a href="{{ route('admin.fasilitator') }}" class="text-xs font-semibold text-indigo-600 hover:underline">Lihat Semua</a>
                </div>

                <div class="space-y-3">
                    @forelse($recentFacilitators as $fasil)
                        <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm flex items-center space-x-3">
                            <div class="w-10 h-10 bg-amber-100 text-amber-700 font-bold rounded-full flex items-center justify-center text-xs">
                                {{ strtoupper(substr($fasil->name ?? 'F', 0, 2)) }}
                            </div>
                            <div class="overflow-hidden">
                                <h4 class="text-sm font-bold text-gray-900 truncate">{{ $fasil->name }}</h4>
                                <p class="text-xs text-gray-400 truncate">{{ $fasil->email }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="bg-white p-4 rounded-2xl border border-gray-100 text-center text-gray-400 text-xs">
                            Tiada fasilitator dijumpai.
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Senarai Jurulatih -->
            <div>
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-bold text-gray-900">Senarai Jurulatih</h2>
                    <a href="{{ route('admin.jurulatih') }}" class="text-xs font-semibold text-indigo-600 hover:underline">Lihat Semua</a>
                </div>

                <div class="space-y-3">
                    @forelse($recentTrainers as $trainer)
                        <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm flex items-center space-x-3">
                            <div class="w-10 h-10 bg-purple-100 text-purple-700 font-bold rounded-full flex items-center justify-center text-xs">
                                {{ strtoupper(substr($trainer->name ?? 'J', 0, 2)) }}
                            </div>
                            <div class="overflow-hidden">
                                <h4 class="text-sm font-bold text-gray-900 truncate">{{ $trainer->name }}</h4>
                                <p class="text-xs text-gray-400 truncate">{{ $trainer->email }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="bg-white p-4 rounded-2xl border border-gray-100 text-center text-gray-400 text-xs">
                            Tiada jurulatih dijumpai.
                        </div>
                    @endforelse
                </div>
            </div>

        </div>

    </div>
</div>
@endsection