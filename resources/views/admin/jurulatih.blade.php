@extends('layouts.admin')

@section('title', 'Pangkalan Data Jurulatih')

@section('content')
<div class="max-w-7xl w-full mx-auto space-y-6">

    <!-- Flash Success Message -->
    @if(session('success'))
        <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold">
            {{ session('success') }}
        </div>
    @endif

    <!-- Title Header & Action Button -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">
                Pangkalan Data Jurulatih
            </h1>
            <p class="text-xs font-medium text-slate-500 mt-1">
                Urus pencipta kandungan pembelajaran dan pakar rujuk.
            </p>
        </div>

        <button onclick="openAddModal()" 
           class="inline-flex items-center justify-center space-x-2 bg-[#4F46E5] hover:bg-indigo-600 text-white font-semibold text-xs px-5 py-3 rounded-2xl transition-all shadow-md shadow-indigo-100">
            <i class="fa-solid fa-plus text-xs"></i>
            <span>Tambah Jurulatih</span>
        </button>
    </div>

    <!-- Table Container -->
    <div class="bg-white rounded-3xl border border-slate-200/60 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-100 text-[11px] font-bold text-slate-500 uppercase tracking-wider bg-slate-50/50">
                        <th class="py-4 px-6">MAKLUMAT JURULATIH</th>
                        <th class="py-4 px-6">KATEGORI KEPAKARAN</th>
                        <th class="py-4 px-6 text-center">MODUL DICIPTA</th>
                        <th class="py-4 px-6">PURATA PENILAIAN</th>
                        <th class="py-4 px-6 text-right">TINDAKAN</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs font-medium">
                    @forelse($trainers as $trainer)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <!-- Maklumat Jurulatih -->
                            <td class="py-4 px-6">
                                <div class="font-bold text-slate-900 text-sm">
                                    {{ $trainer->name }}
                                </div>
                                <div class="text-slate-400 text-xs mt-0.5">
                                    {{ $trainer->email }}
                                </div>
                            </td>

                            <!-- Kategori Kepakaran -->
                            <td class="py-4 px-6">
                                <span class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-semibold bg-slate-100 text-slate-700">
                                    {{ $trainer->expertise_category }}
                                </span>
                            </td>

                            <!-- Dynamic Modul Dicipta Count -->
                            <td class="py-4 px-6 text-center font-bold text-slate-800">
                                {{ $trainer->modules_count ?? 0 }}
                            </td>

                            <!-- Purata Penilaian -->
                            <td class="py-4 px-6 font-bold text-emerald-600">
                                <div class="inline-flex items-center space-x-1.5">
                                    <i class="fa-regular fa-bookmark text-emerald-500 text-xs"></i>
                                    <span>{{ number_format($trainer->rating, 1) }}</span>
                                </div>
                            </td>

                            <!-- Actions (Edit & Delete) -->
                            <td class="py-4 px-6 text-right space-x-1">
                                <button type="button" 
                                    onclick="openEditModal({{ $trainer->id }}, '{{ addslashes($trainer->name) }}', '{{ addslashes($trainer->email) }}', '{{ addslashes($trainer->expertise_category) }}', {{ $trainer->rating }})"
                                    title="Kemaskini" 
                                    class="w-8 h-8 rounded-xl bg-slate-50 hover:bg-indigo-50 text-slate-400 hover:text-[#4F46E5] inline-flex items-center justify-center transition-all">
                                    <i class="fa-solid fa-pen-to-square text-xs"></i>
                                </button>

                                <button type="button" 
                                    onclick="openDeleteModal({{ $trainer->id }})"
                                    title="Padam" 
                                    class="w-8 h-8 rounded-xl bg-slate-50 hover:bg-rose-50 text-slate-400 hover:text-rose-600 inline-flex items-center justify-center transition-all">
                                    <i class="fa-solid fa-trash-can text-xs"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-12 text-center text-slate-400 font-medium">
                                Tiada rekod jurulatih dijumpai.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- ADD TRAINER MODAL -->
<div id="addModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
    <div class="w-full max-w-xl bg-[#4F46E5] rounded-3xl p-8 shadow-2xl text-white relative max-h-[90vh] overflow-y-auto">
        <h2 class="text-xl font-extrabold mb-6">Tambah Jurulatih Baru</h2>

        <form action="{{ route('admin.jurulatih.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-white mb-1">Nama Jurulatih</label>
                <input type="text" name="name" required placeholder="Dr. Sarah Lee"
                    class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-medium focus:outline-none text-sm">
            </div>

            <div>
                <label class="block text-sm font-semibold text-white mb-1">E-mel</label>
                <input type="email" name="email" required placeholder="sarah.lee@uni.my"
                    class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-medium focus:outline-none text-sm">
            </div>

            <div>
                <label class="block text-sm font-semibold text-white mb-1">Kategori Kepakaran</label>
                <input type="text" name="expertise_category" required placeholder="Keselamatan Siber"
                    class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-medium focus:outline-none text-sm">
            </div>

            <div>
                <label class="block text-sm font-semibold text-white mb-1">Purata Penilaian</label>
                <input type="number" step="0.1" name="rating" value="0.0" min="0" max="5.0"
                    class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-medium focus:outline-none text-sm">
            </div>

            <div class="flex items-center justify-end space-x-3 pt-4">
                <button type="button" onclick="closeAddModal()" 
                    class="px-5 py-2.5 rounded-xl text-xs font-semibold text-white bg-white/20 hover:bg-white/30 transition-all">
                    Batal
                </button>
                <button type="submit" 
                    class="px-5 py-2.5 rounded-xl text-xs font-semibold text-[#4F46E5] bg-white hover:bg-indigo-50 transition-all shadow-md">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- EDIT TRAINER MODAL -->
<div id="editModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
    <div class="w-full max-w-xl bg-[#4F46E5] rounded-3xl p-8 shadow-2xl text-white relative max-h-[90vh] overflow-y-auto">
        <h2 class="text-xl font-extrabold mb-6">Kemaskini Jurulatih</h2>

        <form id="editForm" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-semibold text-white mb-1">Nama Jurulatih</label>
                <input type="text" name="name" id="edit_name" required
                    class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-medium focus:outline-none text-sm">
            </div>

            <div>
                <label class="block text-sm font-semibold text-white mb-1">E-mel</label>
                <input type="email" name="email" id="edit_email" required
                    class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-medium focus:outline-none text-sm">
            </div>

            <div>
                <label class="block text-sm font-semibold text-white mb-1">Kategori Kepakaran</label>
                <input type="text" name="expertise_category" id="edit_expertise_category" required
                    class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-medium focus:outline-none text-sm">
            </div>

            <div>
                <label class="block text-sm font-semibold text-white mb-1">Purata Penilaian</label>
                <input type="number" step="0.1" name="rating" id="edit_rating" min="0" max="5.0"
                    class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-medium focus:outline-none text-sm">
            </div>

            <div class="flex items-center justify-end space-x-3 pt-4">
                <button type="button" onclick="closeEditModal()" 
                    class="px-5 py-2.5 rounded-xl text-xs font-semibold text-white bg-white/20 hover:bg-white/30 transition-all">
                    Batal
                </button>
                <button type="submit" 
                    class="px-5 py-2.5 rounded-xl text-xs font-semibold text-[#4F46E5] bg-white hover:bg-indigo-50 transition-all shadow-md">
                    Kemaskini
                </button>
            </div>
        </form>
    </div>
</div>

<!-- DELETE CONFIRMATION MODAL -->
<div id="deleteModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
    <div class="w-full max-w-md bg-white rounded-3xl p-6 shadow-2xl text-slate-800 border border-slate-100 text-center space-y-4">
        <div class="w-14 h-14 bg-rose-50 rounded-2xl text-rose-500 flex items-center justify-center mx-auto text-xl border border-rose-100">
            <i class="fa-solid fa-triangle-exclamation"></i>
        </div>

        <div>
            <h3 class="text-lg font-extrabold text-slate-900">Padam Rekod Jurulatih</h3>
            <p class="text-xs text-slate-500 mt-1">Adakah anda pasti untuk memadam rekod ini? Tindakan ini tidak boleh dibatalkan.</p>
        </div>

        <form id="deleteForm" method="POST" class="flex items-center justify-center space-x-3 pt-2">
            @csrf
            @method('DELETE')

            <button type="button" onclick="closeDeleteModal()" 
                class="w-full py-2.5 rounded-xl text-xs font-semibold text-slate-600 bg-slate-100 hover:bg-slate-200 transition-all">
                Batal
            </button>

            <button type="submit" 
                class="w-full py-2.5 rounded-xl text-xs font-semibold text-white bg-rose-600 hover:bg-rose-700 transition-all shadow-md shadow-rose-100">
                Padam
            </button>
        </form>
    </div>
</div>

<script>
    function openAddModal() {
        document.getElementById('addModal').classList.remove('hidden');
    }

    function closeAddModal() {
        document.getElementById('addModal').classList.add('hidden');
    }

    function openEditModal(id, name, email, expertise, rating) {
        document.getElementById('editForm').action = `/admin/jurulatih/${id}`;
        document.getElementById('edit_name').value = name;
        document.getElementById('edit_email').value = email;
        document.getElementById('edit_expertise_category').value = expertise;
        document.getElementById('edit_rating').value = rating;
        document.getElementById('editModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }

    function openDeleteModal(id) {
        document.getElementById('deleteForm').action = `/admin/jurulatih/${id}`;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>
@endsection