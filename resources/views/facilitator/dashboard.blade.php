<!DOCTYPE html>
<html lang="ms" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Dashboard Fasilitator</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100 h-full flex justify-center items-center font-sans antialiased">

    <!-- Mobile Frame Container (Mirrors PKS structure exactly) -->
    <div class="w-full max-w-md h-full sm:h-[90vh] sm:rounded-3xl bg-gray-50 shadow-2xl flex flex-col overflow-hidden relative border border-gray-200">

        <!-- Scrollable Content Area -->
        <div class="flex-1 overflow-y-auto pb-24">
            
            <!-- Top Header Section (Orange background with curved bottom) -->
            <div class="bg-orange-600 text-white px-6 pt-8 pb-12 rounded-b-[30px] relative">
                <div class="flex justify-between items-center mb-6">
                    <!-- Profile Icon / Avatar -->
                    <div class="w-10 h-10 rounded-full bg-orange-500 flex items-center justify-center border border-orange-400">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>

                    <!-- Notification Bell -->
                    <div class="w-10 h-10 rounded-full bg-orange-500 flex items-center justify-center border border-orange-400">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                    </div>
                </div>

                <p class="text-sm text-orange-100 mb-1">Selamat pagi,</p>
                <h1 class="text-xl font-bold uppercase tracking-wide mb-2">{{ $user->name }}!</h1>
                <p class="text-xs text-orange-100">Terus belajar, membimbing, dan memberi impak.</p>
            </div>

            <!-- Main Content Body -->
            <div class="px-4 -mt-6 relative z-10 space-y-4">
                
                <!-- Overview Section Card -->
                <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="font-bold text-gray-800 text-sm">Gambaran Keseluruhan</h2>
                        <span class="text-xs text-gray-500 bg-gray-100 px-2.5 py-1 rounded-full font-medium">Minggu Ini ▼</span>
                    </div>

                    <!-- Stats Grid -->
                    <div class="grid grid-cols-3 gap-3 text-center">
                        <div class="bg-orange-50/40 border border-orange-100 rounded-xl p-3 flex flex-col justify-center">
                            <span class="text-xl font-bold text-orange-600">{{ $pksCount }}</span>
                            <span class="text-[11px] text-gray-500 mt-1 font-medium">PKS Ditugaskan</span>
                        </div>
                        <div class="bg-gray-50 border border-gray-100 rounded-xl p-3 flex flex-col justify-center">
                            <span class="text-xl font-bold text-gray-800">0</span>
                            <span class="text-[11px] text-gray-500 mt-1 font-medium">Modul Selesai</span>
                        </div>
                        <div class="bg-gray-50 border border-gray-100 rounded-xl p-3 flex flex-col justify-center">
                            <span class="text-xl font-bold text-gray-800">0</span>
                            <span class="text-[11px] text-gray-500 mt-1 font-medium">Kemas Kini</span>
                        </div>
                    </div>
                </div>

                <!-- Assigned PKS Section -->
                <div>
                    <div class="flex justify-between items-center mb-3 px-1">
                        <h2 class="font-bold text-gray-800 text-sm">PKS Saya</h2>
                        <a href="#" class="text-xs text-orange-600 font-semibold hover:underline">Lihat Semua</a>
                    </div>

                    @if($assignedPks->isEmpty())
                        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 text-center text-gray-400 text-sm">
                            Tiada PKS yang ditugaskan kepada anda setakat ini.
                        </div>
                    @else
                        <div class="space-y-3">
                            @foreach($assignedPks as $pks)
                                <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100 flex items-center justify-between">
                                    <div>
                                        <h3 class="font-bold text-gray-800 text-sm">{{ $pks->company_name }}</h3>
                                        <p class="text-xs text-gray-500">Pemilik: {{ $pks->owner_name }} | Tel: {{ $pks->phone_number }}</p>
                                    </div>
                                    <span class="px-2.5 py-1 text-xs font-semibold rounded-full {{ $pks->status == 'Aktif' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                        {{ $pks->status }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

            </div>
        </div>

        <!-- Sticky Bottom Navigation Bar -->
        <nav class="absolute bottom-0 left-0 right-0 max-w-md mx-auto bg-white border-t border-gray-100 py-3 px-6 flex justify-around items-center z-50 rounded-t-2xl shadow-[0_-4px_20px_rgba(0,0,0,0.05)]">
            <!-- Utama -->
            <a href="{{ route('facilitator.dashboard') }}" class="flex flex-col items-center text-orange-600">
                <svg class="w-6 h-6 mb-1" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                </svg>
                <span class="text-[11px] font-medium">Utama</span>
            </a>

            <!-- Belajar -->
            <a href="#" class="flex flex-col items-center text-gray-400 hover:text-orange-600 transition-colors">
                <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
                <span class="text-[11px] font-medium">Belajar</span>
            </a>

            <!-- PKS Saya -->
            <a href="#" class="flex flex-col items-center text-gray-400 hover:text-orange-600 transition-colors">
                <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <span class="text-[11px] font-medium">PKS Saya</span>
            </a>

            <!-- Profil -->
            <a href="#" class="flex flex-col items-center text-gray-400 hover:text-orange-600 transition-colors">
                <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <span class="text-[11px] font-medium">Profil</span>
            </a>
        </nav>

    </div>

</body>
</html>