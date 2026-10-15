<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $sme->company_name }} - Cyberquest</title>
    @vite(['resources/css/app.css'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-100 font-sans antialiased">

    <div class="max-w-md mx-auto bg-gray-50 min-h-screen pb-32 relative shadow-xl" x-data="{ activeTab: 'gambaran' }">
        
        <!-- Top Header (Purple Background) -->
        <div class="bg-indigo-600 text-white p-4 pt-6">
            <div class="flex items-center justify-between mb-4">
                <a href="{{ route('facilitator.dashboard') }}" class="p-2 rounded-full hover:bg-indigo-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
                <h1 class="text-lg font-bold tracking-wide truncate max-w-[220px]">{{ $sme->company_name }}</h1>
                <button class="p-2 rounded-full hover:bg-indigo-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01" />
                    </svg>
                </button>
            </div>

            <!-- SME Profile Card Header -->
            <div class="bg-white text-gray-900 rounded-2xl p-4 shadow-sm mt-2">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center text-2xl shadow-inner">
                        🏪
                    </div>
                    <div class="flex-1 min-w-0">
                        <h2 class="font-bold text-gray-800 text-base truncate">{{ $sme->company_name }}</h2>
                        <p class="text-xs text-gray-500 truncate">{{ $sme->sector ?? 'Sektor Perniagaan' }}</p>
                    </div>
                    <span class="bg-orange-50 text-orange-700 border border-orange-100 text-[10px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wider shrink-0">
                        {{ $sme->status ?? 'Aktif' }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Tab Navigation Bar -->
        <div class="flex border-b border-gray-200 bg-white px-2 sticky top-0 z-10 shadow-xs">
            <button @click="activeTab = 'gambaran'" :class="activeTab === 'gambaran' ? 'border-indigo-600 text-indigo-600 font-bold' : 'border-transparent text-gray-500 font-medium'" class="flex-1 py-3 text-center border-b-2 text-sm transition-all">Gambaran</button>
            <button @click="activeTab = 'kemajuan'" :class="activeTab === 'kemajuan' ? 'border-indigo-600 text-indigo-600 font-bold' : 'border-transparent text-gray-500 font-medium'" class="flex-1 py-3 text-center border-b-2 text-sm transition-all">Kemajuan</button>
            <button @click="activeTab = 'susulan'" :class="activeTab === 'susulan' ? 'border-indigo-600 text-indigo-600 font-bold' : 'border-transparent text-gray-500 font-medium'" class="flex-1 py-3 text-center border-b-2 text-sm transition-all">Susulan</button>
            <button @click="activeTab = 'nota'" :class="activeTab === 'nota' ? 'border-indigo-600 text-indigo-600 font-bold' : 'border-transparent text-gray-500 font-medium'" class="flex-1 py-3 text-center border-b-2 text-sm transition-all">Nota</button>
        </div>

        <!-- Dynamic Content Tabs Area -->
        <div class="p-4 space-y-4">
            
            <!-- TAB 1: GAMBARAN -->
            <div x-show="activeTab === 'gambaran'" x-transition.opacity class="space-y-4" x-cloak>
                <h3 class="font-bold text-gray-800 text-sm tracking-wide">Profil PKS</h3>
                
                <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100">
                    <p class="text-sm text-gray-500 italic leading-relaxed">
                        "{{ $sme->description ?? 'Tiada maklumat gambaran disediakan oleh PKS lagi.' }}"
                    </p>
                </div>

                <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 space-y-4">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Orang Hubungan</span>
                    
                    <div class="flex items-center space-x-3 text-sm text-gray-700">
                        <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center text-blue-600">👤</div>
                        <span class="font-semibold">{{ $sme->owner_name }}</span>
                    </div>
                    <div class="flex items-center space-x-3 text-sm text-gray-700">
                        <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center text-blue-600">📞</div>
                        <span>{{ $sme->phone_number }}</span>
                    </div>
                    <div class="flex items-center space-x-3 text-sm text-gray-700">
                        <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center text-blue-600">✉️</div>
                        <span>{{ $sme->email }}</span>
                    </div>
                </div>

                <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 space-y-3">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Lokasi & Butiran</span>
                    <div class="flex items-start space-x-3 text-sm text-gray-700">
                        <div class="w-8 h-8 rounded-full bg-orange-50 flex items-center justify-center text-orange-600 shrink-0">📍</div>
                        <p>{{ $sme->address ?? 'Alamat belum dikemaskini' }}</p>
                    </div>
                    <div class="flex items-center space-x-3 text-sm text-gray-700">
                        <div class="w-8 h-8 rounded-full bg-green-50 flex items-center justify-center text-green-600 shrink-0">📅</div>
                        <p>Didaftarkan pada {{ $sme->created_at ? $sme->created_at->format('d M Y') : '-' }}</p>
                    </div>
                </div>
            </div>

            <!-- TAB 2: KEMAJUAN -->
            <div x-show="activeTab === 'kemajuan'" x-transition.opacity class="space-y-4" x-cloak>
                <h3 class="font-bold text-gray-800 text-sm tracking-wide">Penjejak Kemajuan</h3>
                <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 text-center text-gray-400 text-sm py-10">
                    Belum ada rekod kemajuan.
                </div>
            </div>

            <!-- TAB 3: SUSULAN -->
            <div x-show="activeTab === 'susulan'" x-transition.opacity class="space-y-4" x-cloak>
                <h3 class="font-bold text-gray-800 text-sm tracking-wide">Tindakan Susulan</h3>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 text-center space-y-4">
                    <div class="w-16 h-16 bg-indigo-50 text-indigo-600 rounded-full flex items-center justify-center mx-auto text-2xl">
                        📅
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800 text-base">Bersedia untuk Susulan?</h4>
                        <p class="text-xs text-gray-500 mt-1">Jalankan penilaian susulan 3 bulan untuk mengukur perubahan tingkah laku.</p>
                    </div>
                    <button class="bg-indigo-700 hover:bg-indigo-800 text-white px-5 py-2.5 rounded-xl text-sm font-medium shadow-md transition-all">
                        Mula Susulan
                    </button>
                </div>
            </div>

            <!-- TAB 4: NOTA -->
            <div x-show="activeTab === 'nota'" x-transition.opacity class="space-y-4" x-cloak>
                <div class="flex justify-between items-center">
                    <h3 class="font-bold text-gray-800 text-sm tracking-wide">Nota Sesi</h3>
                    <span class="bg-blue-50 text-blue-700 text-xs px-2.5 py-1 rounded-full font-semibold">0 Nota</span>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 text-center text-gray-400 text-sm">
                    Tiada nota lagi
                </div>
            </div>

        </div>

        <!-- Fixed Bottom Action Button -->
        <div class="fixed bottom-0 left-0 right-0 p-4 bg-white/90 backdrop-blur-md border-t border-gray-200 max-w-md mx-auto z-20">
            <button class="w-full bg-indigo-700 hover:bg-indigo-800 text-white py-3.5 rounded-2xl font-semibold shadow-lg shadow-indigo-700/25 transition-all text-sm">
                Kemas Kini Kemajuan
            </button>
        </div>

    </div>

</body>
</html>