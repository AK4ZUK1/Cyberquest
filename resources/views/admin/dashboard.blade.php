@extends('layouts.admin') {{-- Adjust to match your master layout if different --}}

@section('content')
<div class="container mx-auto px-6 py-8">
    <h3 class="text-3xl font-medium text-gray-700 mb-6">Papan Pemuka (Dashboard)</h3>

    <!-- Metric Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        
        <!-- PKS Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs border border-gray-100">
            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5m0 0h4m-4 0V11m0 0h4m-4 0H7m4 0v10"></path>
                </svg>
            </div>
            <div>
                <p class="mb-1 text-sm font-medium text-gray-600">Jumlah PKS</p>
                <p class="text-2xl font-semibold text-gray-700">{{ $totalPks }}</p>
            </div>
        </div>

        <!-- Fasilitator Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs border border-gray-100">
            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </div>
            <div>
                <p class="mb-1 text-sm font-medium text-gray-600">Jumlah Fasilitator</p>
                <p class="text-2xl font-semibold text-gray-700">{{ $totalFacilitator }}</p>
            </div>
        </div>

        <!-- Jurulatih Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs border border-gray-100">
            <div class="p-3 mr-4 text-purple-500 bg-purple-100 rounded-full">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </div>
            <div>
                <p class="mb-1 text-sm font-medium text-gray-600">Jumlah Jurulatih</p>
                <p class="text-2xl font-semibold text-gray-700">{{ $totalTrainer }}</p>
            </div>
        </div>

        <!-- Modul Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs border border-gray-100">
            <div class="p-3 mr-4 text-yellow-500 bg-yellow-100 rounded-full">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
            </div>
            <div>
                <p class="mb-1 text-sm font-medium text-gray-600">Jumlah Modul</p>
                <p class="text-2xl font-semibold text-gray-700">{{ $totalModule }}</p>
            </div>
        </div>

    </div>

    <!-- Live Data Preview Tables Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        <!-- Recent Jurulatih Table -->
        <div class="bg-white p-6 rounded-lg shadow-xs border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <h4 class="text-lg font-semibold text-gray-700">Jurulatih Terkini</h4>
                <a href="{{ route('admin.jurulatih') }}" class="text-sm text-blue-600 hover:underline">Lihat Semua</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                            <th class="px-4 py-3">Nama</th>
                            <th class="px-4 py-3">Kategori Kategori</th>
                            <th class="px-4 py-3">Rating</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @forelse($recentTrainers as $trainer)
                            <tr class="text-gray-700 text-sm">
                                <td class="px-4 py-3 font-medium">{{ $trainer->name }}</td>
                                <td class="px-4 py-3">{{ $trainer->expertise_category }}</td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full">
                                        {{ $trainer->rating ?? 'N/A' }} ⭐
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-4 py-3 text-center text-gray-500 text-sm">Tiada rekod jurulatih dijumpai.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Recent PKS Table -->
        <div class="bg-white p-6 rounded-lg shadow-xs border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <h4 class="text-lg font-semibold text-gray-700">PKS Terkini</h4>
                <a href="{{ route('admin.pks') }}" class="text-sm text-blue-600 hover:underline">Lihat Semua</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                            <th class="px-4 py-3">Nama Syarikat / PKS</th>
                            <th class="px-4 py-3">Tarikh Didaftar</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @forelse($recentPks as $pks)
                            <tr class="text-gray-700 text-sm">
                                <td class="px-4 py-3 font-medium">{{ $pks->name ?? $pks->company_name }}</td>
                                <td class="px-4 py-3">{{ $pks->created_at ? $pks->created_at->format('d/m/Y') : '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="px-4 py-3 text-center text-gray-500 text-sm">Tiada rekod PKS dijumpai.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection