<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Fasilitator</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 pb-20"> <!-- Added padding-bottom so content isn't hidden behind sticky nav -->

    <!-- Mobile Container Wrapper -->
    <div class="max-w-md mx-auto bg-gray-50 min-h-screen relative shadow-md">

        <!-- Top Header Section (Purple background with curved bottom) -->
        <div class="bg-indigo-700 text-white px-6 pt-8 pb-12 rounded-b-[30px] relative">
            <div class="flex justify-between items-center mb-6">
                <!-- Profile Icon / Avatar -->
                <div class="w-10 h-10 rounded-full bg-indigo-600 flex items-center justify-center border border-indigo-400">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <!-- Notification Bell -->
                <div class="w-10 h-10 rounded-full bg-indigo-600 flex items-center justify-center border border-indigo-400 relative">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                </div>
            </div>

            <!-- Greeting with Dynamic User Name -->
            <p class="text-indigo-200 text-sm">Selamat pagi,</p>
            <h1 class="text-2xl font-bold flex items-center gap-2">
                {{ $user->name }}! <span>👋</span>
            </h1>
            <p class="text-indigo-200 text-xs mt-1">Terus belajar, membimbing, dan memberi impak.</p>
        </div>

        <!-- Main Content Area -->
        <div class="px-4 -mt-6">
            
            <!-- Gambaran Keseluruhan Card -->
            <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100 mb-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="font-bold text-gray-800 text-sm">Gambaran Keseluruhan</h2>
                    <span class="text-xs bg-indigo-50 text-indigo-600 px-2.5 py-1 rounded-lg font-medium">Minggu Ini ▼</span>
                </div>

                <div class="grid grid-cols-3 gap-3">
                    <!-- PKS Ditugaskan (Live Count) -->
                    <div class="border border-blue-100 bg-blue-50/30 rounded-xl p-3 text-center">
                        <span class="text-xl font-bold text-blue-600">{{ $pksCount }}</span>
                        <p class="text-[10px] text-gray-500 mt-1 font-medium leading-tight">PKS Ditugaskan</p>
                    </div>
                    <!-- Modul Selesai -->
                    <div class="border border-orange-100 bg-orange-50/30 rounded-xl p-3 text-center">
                        <span class="text-xl font-bold text-orange-500">0</span>
                        <p class="text-[10px] text-gray-500 mt-1 font-medium leading-tight">Modul Selesai</p>
                    </div>
                    <!-- Kemas Kini -->
                    <div class="border border-green-100 bg-green-50/30 rounded-xl p-3 text-center">
                        <span class="text-xl font-bold text-green-600">0</span>
                        <p class="text-[10px] text-gray-500 mt-1 font-medium leading-tight">Kemas Kini Minggu Ini</p>
                    </div>
                </div>
            </div>

            <!-- PKS Saya Section -->
            <div class="flex justify-between items-center mb-3">
                <h2 class="font-bold text-gray-800 text-sm">PKS Saya</h2>
                <a href="#" class="text-xs text-indigo-600 font-medium hover:underline">Lihat Semua</a>
            </div>

            <!-- List of Assigned PKS -->
            <div class="space-y-4 mb-6">
                @forelse($assignedPks as $pks)
                    <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100">
                        <div class="flex justify-between items-start mb-3">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600 font-bold">
                                    🏢
                                </div>
                                <div>
                                    <h3 class="font-bold text-sm text-gray-800">{{ $pks->name }}</h3>
                                    <p class="text-xs text-gray-400">{{ $pks->category ?? 'Perniagaan' }}</p>
                                </div>
                            </div>
                            <span class="text-[10px] bg-amber-50 text-amber-600 font-bold px-2.5 py-1 rounded-full uppercase tracking-wider">Perlu Perhatian</span>
                        </div>

                        <!-- Progress Bar -->
                        <div class="mb-4">
                            <div class="flex justify-between text-xs mb-1">
                                <span class="text-gray-500 text-[11px]">Kemajuan Keseluruhan</span>
                                <span class="font-bold text-blue-600">0%</span>
                            </div>
                            <div class="w-full bg-gray-100 h-1.5 rounded-full overflow-hidden">
                                <div class="bg-blue-600 h-full rounded-full" style="width: 0%"></div>
                            </div>
                        </div>

                        <!-- Mini Steps Icons Row -->
                        <div class="grid grid-cols-4 gap-2 pt-2 border-t border-gray-50 text-center">
                            <div class="flex flex-col items-center">
                                <div class="w-8 h-8 rounded-lg border border-gray-200 flex items-center justify-center text-gray-400 text-xs mb-1">✓</div>
                                <span class="text-[9px] text-gray-400 font-medium">PRA-NILAI</span>
                            </div>
                            <div class="flex flex-col items-center">
                                <div class="w-8 h-8 rounded-lg border border-gray-200 flex items-center justify-center text-gray-400 text-xs mb-1">📖</div>
                                <span class="text-[9px] text-gray-400 font-medium">BELAJAR</span>
                            </div>
                            <div class="flex flex-col items-center">
                                <div class="w-8 h-8 rounded-lg border border-gray-200 flex items-center justify-center text-gray-400 text-xs mb-1">✓</div>
                                <span class="text-[9px] text-gray-400 font-medium">PASCA-NILAI</span>
                            </div>
                            <div class="flex flex-col items-center">
                                <div class="w-8 h-8 rounded-lg border border-gray-200 flex items-center justify-center text-gray-400 text-xs mb-1">📄</div>
                                <span class="text-[9px] text-gray-400 font-medium">SUSULAN</span>
                            </div>
                        </div>

                        <!-- Last Updated Footer -->
                        <div class="mt-3 pt-2 border-t border-gray-50 flex items-center justify-between text-[11px] text-gray-400">
                            <span>🕒 Terakhir dikemas kini: Belum dikemas kini</span>
                            <span>›</span>
                        </div>
                    </div>
                @empty
                    <!-- Fallback if no PKS assigned yet -->
                    <div class="bg-white rounded-2xl p-6 text-center shadow-sm border border-gray-100">
                        <p class="text-sm text-gray-500">Tiada PKS yang ditugaskan kepada anda setakat ini.</p>
                    </div>
                @endforelse
            </div>

        </div>

        <!-- Sticky Bottom Navigation Component Included Here -->
        @include('components.facilitator-nav')

    </div>

</body>
</html>