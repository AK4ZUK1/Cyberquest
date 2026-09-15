@extends('layouts.admin')

@section('title', 'Papan Pemuka')

@section('content')
<div class="space-y-8">
    
    <!-- Page Header Title -->
    <div>
        <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Papan Pemuka</h1>
        <p class="text-sm text-slate-500 mt-1">Ringkasan masa nyata dan aktiviti terkini platform CyberQuest.</p>
    </div>

    <!-- Stat Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
        
        <!-- Jumlah PKS Card -->
        <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm flex items-start justify-between">
            <div class="space-y-2">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Jumlah PKS</span>
                <div class="text-3xl font-extrabold text-slate-900">2</div>
                <a href="{{ route('admin.pks') }}" class="inline-flex items-center text-xs font-semibold text-indigo-600 hover:text-indigo-700 transition-colors">
                    Urus PKS <span class="ml-1">&rarr;</span>
                </a>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-500 flex items-center justify-center shrink-0">
                <i class="fa-solid fa-store text-xl"></i>
            </div>
        </div>

        <!-- Jumlah Fasilitator Card -->
        <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm flex items-start justify-between">
            <div class="space-y-2">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Jumlah Fasilitator</span>
                <div class="text-3xl font-extrabold text-slate-900">2</div>
                <a href="{{ route('admin.fasilitator') }}" class="inline-flex items-center text-xs font-semibold text-indigo-600 hover:text-indigo-700 transition-colors">
                    Urus Fasilitator <span class="ml-1">&rarr;</span>
                </a>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-500 flex items-center justify-center shrink-0">
                <i class="fa-solid fa-user-tie text-xl"></i>
            </div>
        </div>

        <!-- Jumlah Jurulatih Card -->
        <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm flex items-start justify-between">
            <div class="space-y-2">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Jumlah Jurulatih</span>
                <div class="text-3xl font-extrabold text-slate-900">1</div>
                <a href="{{ route('admin.jurulatih') }}" class="inline-flex items-center text-xs font-semibold text-indigo-600 hover:text-indigo-700 transition-colors">
                    Urus Jurulatih <span class="ml-1">&rarr;</span>
                </a>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-purple-50 text-purple-500 flex items-center justify-center shrink-0">
                <i class="fa-solid fa-graduation-cap text-xl"></i>
            </div>
        </div>

        <!-- Jumlah Modul Card -->
        <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm flex items-start justify-between">
            <div class="space-y-2">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Jumlah Modul</span>
                <div class="text-3xl font-extrabold text-slate-900">1</div>
                <a href="{{ route('admin.modul') }}" class="inline-flex items-center text-xs font-semibold text-indigo-600 hover:text-indigo-700 transition-colors">
                    Urus Modul <span class="ml-1">&rarr;</span>
                </a>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-indigo-500 flex items-center justify-center shrink-0">
                <i class="fa-solid fa-book-open text-xl"></i>
            </div>
        </div>

    </div>

    <!-- Content Sections Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Left Column: Modul Terkini Ditambah (Spans 2 columns) -->
        <div class="lg:col-span-2 space-y-4">
            <div class="flex items-center justify-between">
                <h2 class="text-base font-bold text-slate-900">Modul Terkini Ditambah</h2>
                <a href="{{ route('admin.modul') }}" class="text-xs font-semibold text-indigo-600 hover:underline">Lihat Semua</a>
            </div>

            <!-- Module Card -->
            <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-file-lines text-xl"></i>
                    </div>
                    <div>
                        <div class="flex items-center space-x-2">
                            <h3 class="font-bold text-slate-900 text-sm">m</h3>
                            <span class="px-2.5 py-0.5 rounded-full text-[11px] font-medium bg-slate-100 text-slate-600">Keselamatan Siber</span>
                        </div>
                        <p class="text-xs text-slate-400 mt-1">Oleh: Dr. Sarah Lee &bull; 21 hours ago</p>
                    </div>
                </div>

                <div class="flex items-center">
                    <span class="inline-flex items-center space-x-1 px-3 py-1.5 rounded-xl bg-rose-50 text-rose-500 text-xs font-bold">
                        <i class="fa-solid fa-file-pdf"></i>
                        <span>PDF</span>
                    </span>
                </div>
            </div>
        </div>

        <!-- Right Column: Lists Section -->
        <div class="space-y-6">
            
            <!-- Senarai Fasilitator -->
            <div class="space-y-3">
                <div class="flex items-center justify-between">
                    <h2 class="text-base font-bold text-slate-900">Senarai Fasilitator</h2>
                    <a href="{{ route('admin.fasilitator') }}" class="text-xs font-semibold text-indigo-600 hover:underline">Lihat Semua</a>
                </div>

                <div class="bg-white rounded-3xl p-5 border border-slate-100 shadow-sm space-y-4">
                    <!-- Member 1 -->
                    <div class="flex items-center space-x-3.5">
                        <div class="w-10 h-10 rounded-2xl bg-amber-50 text-amber-600 font-bold text-xs flex items-center justify-center shrink-0">
                            MO
                        </div>
                        <div class="min-w-0 flex-1">
                            <h4 class="text-xs font-bold text-slate-900 truncate">MOHAMAD HAIQAL HAQIMI BIN MOHD HAYAZI</h4>
                            <p class="text-[11px] text-slate-400 truncate">haiqalhaqimi03@gmail.com</p>
                        </div>
                    </div>

                    <!-- Member 2 -->
                    <div class="flex items-center space-x-3.5">
                        <div class="w-10 h-10 rounded-2xl bg-amber-50 text-amber-600 font-bold text-xs flex items-center justify-center shrink-0">
                            MU
                        </div>
                        <div class="min-w-0 flex-1">
                            <h4 class="text-xs font-bold text-slate-900 truncate">MUHAMMAD SYAZWAN BIN MOHD SHUHAIMI</h4>
                            <p class="text-[11px] text-slate-400 truncate">syazwandw@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Senarai Jurulatih -->
            <div class="space-y-3">
                <div class="flex items-center justify-between">
                    <h2 class="text-base font-bold text-slate-900">Senarai Jurulatih</h2>
                    <a href="{{ route('admin.jurulatih') }}" class="text-xs font-semibold text-indigo-600 hover:underline">Lihat Semua</a>
                </div>

                <div class="bg-white rounded-3xl p-5 border border-slate-100 shadow-sm">
                    <div class="flex items-center space-x-3.5">
                        <div class="w-10 h-10 rounded-2xl bg-purple-50 text-purple-600 font-bold text-xs flex items-center justify-center shrink-0">
                            DR
                        </div>
                        <div class="min-w-0 flex-1">
                            <h4 class="text-xs font-bold text-slate-900 truncate">Dr. Sarah Lee</h4>
                            <p class="text-[11px] text-slate-400 truncate">sarah.lee@uni.my</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection