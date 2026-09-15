@extends('layouts.admin')

@section('title', 'Pengurusan Modul')

@section('content')
<div class="max-w-7xl w-full mx-auto space-y-6" x-data="{ showAddModal: false, activeEditModal: null }">

    <!-- Flash Notification Success Message -->
    @if(session('success'))
        <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold">
            {{ session('success') }}
        </div>
    @endif

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">
                Pengurusan Modul
            </h1>
            <p class="text-xs font-medium text-slate-500 mt-1">
                Gambaran keseluruhan sistem untuk semua bahan pembelajaran.
            </p>
        </div>
        <button @click="showAddModal = true" 
                class="inline-flex items-center justify-center space-x-2 bg-[#4F46E5] hover:bg-indigo-600 text-white font-semibold text-xs px-5 py-3 rounded-2xl transition-all shadow-md shadow-indigo-100">
            <i class="fa-solid fa-plus text-xs"></i>
            <span>Tambah Modul</span>
        </button>
    </div>

    <!-- Dynamic Modules List -->
    <div class="space-y-4">
        @forelse($modules as $module)
            <div class="bg-white border border-slate-200/60 rounded-3xl p-6 shadow-sm flex items-center justify-between hover:shadow-md transition-shadow duration-200">
                <div class="flex items-start space-x-4">
                    <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-[#4F46E5] flex items-center justify-center shrink-0">
                        <i class="fa-regular fa-bookmark text-lg"></i>
                    </div>
                    <div class="space-y-1">
                        <div class="flex items-center space-x-3">
                            <h3 class="text-sm font-bold text-slate-900">{{ $module->title }}</h3>
                            <span class="px-3 py-1 text-xs font-semibold bg-slate-100 text-slate-700 rounded-lg">{{ $module->category }}</span>
                        </div>
                        <p class="text-xs text-slate-500">{{ $module->description ?? 'Tiada penerangan disediakan.' }}</p>
                        
                        <div class="flex items-center space-x-4 pt-1 text-xs text-slate-400 font-medium">
                            <span>Dicipta oleh <strong class="text-slate-700">{{ $module->trainer->name ?? 'Pentadbir Sistem' }}</strong> pada {{ $module->created_at->format('d M Y') }}</span>
                            @if($module->pdf_path)
                                <a href="{{ asset('storage/' . $module->pdf_path) }}" target="_blank" class="text-[#4F46E5] font-semibold hover:underline flex items-center space-x-1">
                                    <i class="fa-solid fa-file-pdf text-rose-500"></i>
                                    <span>Lihat PDF</span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Action Buttons: Urus (Edit) & Delete -->
                <div class="flex items-center space-x-1">
                    <button @click="activeEditModal = {{ $module->id }}" 
                        class="w-8 h-8 rounded-xl bg-slate-50 hover:bg-indigo-50 text-slate-400 hover:text-[#4F46E5] inline-flex items-center justify-center transition-all" 
                        title="Kemaskini">
                        <i class="fa-solid fa-pen-to-square text-xs"></i>
                    </button>

                    <!-- Delete Form -->
                    <form action="{{ route('admin.modul.destroy', $module->id) }}" method="POST" onsubmit="return confirm('Adakah anda pasti mahu memadam modul ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                            class="w-8 h-8 rounded-xl bg-slate-50 hover:bg-rose-50 text-slate-400 hover:text-rose-600 inline-flex items-center justify-center transition-all" 
                            title="Padam Modul">
                            <i class="fa-solid fa-trash-can text-xs"></i>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Edit Modal for {{ $module->title }} -->
            <div x-show="activeEditModal === {{ $module->id }}" 
                 x-cloak 
                 class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/60 backdrop-blur-sm p-4">
                <div @click.away="activeEditModal = null" class="w-full max-w-xl bg-[#4F46E5] rounded-3xl p-8 shadow-2xl text-white relative max-h-[90vh] overflow-y-auto">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-extrabold">Kemaskini Modul</h3>
                        <button @click="activeEditModal = null" class="text-white/70 hover:text-white">
                            <i class="fa-solid fa-xmark text-lg"></i>
                        </button>
                    </div>

                    <form action="{{ route('admin.modul.update', $module->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        @method('PUT')
                        <div>
                            <label class="block text-sm font-semibold text-white mb-1">Tajuk Modul</label>
                            <input type="text" name="title" value="{{ $module->title }}" required 
                                   class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-medium focus:outline-none text-sm">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-white mb-1">Kategori</label>
                            <select name="category" required class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-medium focus:outline-none text-sm">
                                <option value="Keselamatan Siber" {{ $module->category == 'Keselamatan Siber' ? 'selected' : '' }}>Keselamatan Siber</option>
                                <option value="Komunikasi" {{ $module->category == 'Komunikasi' ? 'selected' : '' }}>Komunikasi</option>
                                <option value="Pemasangan" {{ $module->category == 'Pemasangan' ? 'selected' : '' }}>Pemasangan</option>
                            </select>
                        </div>

                        <!-- Jurulatih Dropdown -->
                        <div>
                            <label class="block text-sm font-semibold text-white mb-1">Dicipta Oleh (Jurulatih)</label>
                            <select name="trainer_id" class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-medium focus:outline-none text-sm">
                                <option value="">Pilih Jurulatih</option>
                                @foreach($trainers as $trainer)
                                    <option value="{{ $trainer->id }}" {{ $module->trainer_id == $trainer->id ? 'selected' : '' }}>
                                        {{ $trainer->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-white mb-1">Penerangan</label>
                            <textarea name="description" rows="3" class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-medium focus:outline-none text-sm">{{ $module->description }}</textarea>
                        </div>

                        <!-- PDF Upload Area -->
                        <div>
                            <label class="block text-sm font-semibold text-white mb-1">Muat Naik Fail PDF</label>
                            <div class="border-2 border-dashed border-white/30 rounded-2xl p-4 text-center bg-white/10">
                                <i class="fa-solid fa-file-pdf text-2xl text-white/70 mb-2"></i>
                                <input type="file" name="pdf_file" accept=".pdf" class="block w-full text-xs text-white/80 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-white file:text-[#4F46E5] hover:file:bg-indigo-50">
                                @if($module->pdf_path)
                                    <p class="text-xs text-emerald-300 mt-2 font-medium">Fail sedia ada: {{ basename($module->pdf_path) }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="flex items-center justify-end space-x-3 pt-4">
                            <button type="button" @click="activeEditModal = null" class="px-5 py-2.5 rounded-xl text-xs font-semibold text-white bg-white/20 hover:bg-white/30 transition-all">Batal</button>
                            <button type="submit" class="px-5 py-2.5 rounded-xl text-xs font-semibold text-[#4F46E5] bg-white hover:bg-indigo-50 transition-all shadow-md">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        @empty
            <div class="bg-white rounded-3xl p-12 text-center border border-slate-200/60 shadow-sm">
                <p class="text-slate-400 text-xs font-medium">Tiada modul lagi. Klik "Tambah Modul" untuk meletakkan modul baharu.</p>
            </div>
        @endforelse
    </div>

    <!-- Modal: Tambah Modul Baharu -->
    <div x-show="showAddModal" 
         x-cloak 
         class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/60 backdrop-blur-sm p-4">

        <div @click.away="showAddModal = false" class="w-full max-w-xl bg-[#4F46E5] rounded-3xl p-8 shadow-2xl text-white relative max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-extrabold">Tambah Modul Baharu</h3>
                <button @click="showAddModal = false" class="text-white/70 hover:text-white">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>

            <form action="{{ route('admin.modul.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-white mb-1">Tajuk Modul</label>
                    <input type="text" name="title" required placeholder="Contoh: Keselamatan Kata Laluan"
                           class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-medium focus:outline-none text-sm">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-white mb-1">Kategori</label>
                    <select name="category" required class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-medium focus:outline-none text-sm">
                        <option value="">Pilih Kategori</option>
                        <option value="Keselamatan Siber">Keselamatan Siber</option>
                        <option value="Komunikasi">Komunikasi</option>
                        <option value="Pemasangan">Pemasangan</option>
                    </select>
                </div>

                <!-- Jurulatih Dropdown Menu -->
                <div>
                    <label class="block text-sm font-semibold text-white mb-1">Dicipta Oleh (Jurulatih)</label>
                    <select name="trainer_id" class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-medium focus:outline-none text-sm">
                        <option value="">Pilih Jurulatih</option>
                        @foreach($trainers as $trainer)
                            <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-white mb-1">Penerangan</label>
                    <textarea name="description" rows="3" placeholder="Penerangan ringkas tentang modul..."
                              class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-medium focus:outline-none text-sm"></textarea>
                </div>

                <!-- PDF Upload Box Area -->
                <div>
                    <label class="block text-sm font-semibold text-white mb-1">Muat Naik Fail PDF</label>
                    <div class="border-2 border-dashed border-white/30 rounded-2xl p-4 text-center bg-white/10">
                        <i class="fa-solid fa-file-pdf text-2xl text-white/70 mb-2"></i>
                        <input type="file" name="pdf_file" accept=".pdf" class="block w-full text-xs text-white/80 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-white file:text-[#4F46E5] hover:file:bg-indigo-50">
                    </div>
                </div>

                <div class="flex items-center justify-end space-x-3 pt-4">
                    <button type="button" @click="showAddModal = false" class="px-5 py-2.5 rounded-xl text-xs font-semibold text-white bg-white/20 hover:bg-white/30 transition-all">Batal</button>
                    <button type="submit" class="px-5 py-2.5 rounded-xl text-xs font-semibold text-[#4F46E5] bg-white hover:bg-indigo-50 transition-all shadow-md">Simpan Modul</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection