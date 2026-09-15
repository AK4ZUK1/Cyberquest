@extends('layouts.admin')

@section('title', 'Pengurusan PKS')

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
                Pengurusan PKS
            </h1>
            <p class="text-xs font-medium text-slate-500 mt-1">
                Direktori berpusat untuk semua PKS berdaftar.
            </p>
        </div>

        <a href="{{ route('admin.pks.create') }}" 
           class="inline-flex items-center justify-center space-x-2 bg-[#4F46E5] hover:bg-indigo-600 text-white font-semibold text-xs px-5 py-3 rounded-2xl transition-all shadow-md shadow-indigo-100">
            <i class="fa-solid fa-plus text-xs"></i>
            <span>Tambah PKS</span>
        </a>
    </div>

    <!-- Table Container -->
    <div class="bg-white rounded-3xl border border-slate-200/60 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-100 text-[11px] font-bold text-slate-500 uppercase tracking-wider bg-slate-50/50">
                        <th class="py-4 px-6">NAMA & MAKLUMAT PKS</th>
                        <th class="py-4 px-6">FASILITATOR</th>
                        <th class="py-4 px-6">TARIKH SERTAI</th>
                        <th class="py-4 px-6">STATUS</th>
                        <th class="py-4 px-6 text-right">TINDAKAN</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs font-medium">
                    @forelse($pks_list as $pks)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <!-- Nama & Maklumat PKS -->
                            <td class="py-4 px-6">
                                <div class="font-bold text-slate-900 text-sm">
                                    {{ $pks->company_name }}
                                </div>
                                <div class="text-slate-400 text-xs mt-0.5">
                                    <span>{{ $pks->sector }}</span>
                                    <span class="mx-1 text-slate-300">|</span>
                                    <span>{{ $pks->phone_number }}</span>
                                </div>
                                <div class="text-slate-500 text-[11px] font-semibold mt-1 flex items-center space-x-1">
                                    <i class="fa-solid fa-user-tie text-slate-400 text-[10px]"></i>
                                    <span>Pemilik: {{ $pks->owner_name }}</span>
                                </div>
                            </td>

                            <!-- Fasilitator -->
                            <td class="py-4 px-6 text-slate-700 font-semibold">
                                {{ $pks->facilitator ? $pks->facilitator->name : '—' }}
                            </td>

                            <!-- Tarikh Sertai -->
                            <td class="py-4 px-6 text-slate-600 font-medium">
                                {{ $pks->created_at ? $pks->created_at->translatedFormat('d M Y, h:i A') : '—' }}
                            </td>

                            <!-- Status -->
                            <td class="py-4 px-6">
                                <span class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-bold {{ $pks->status === 'Aktif' ? 'bg-indigo-50 text-[#4F46E5]' : 'bg-slate-100 text-slate-600' }}">
                                    {{ $pks->status }}
                                </span>
                            </td>

                            <!-- Actions (Edit & Delete) -->
                            <td class="py-4 px-6 text-right space-x-1">
                                <button type="button" 
                                    onclick="openEditModal({{ $pks->id }}, '{{ addslashes($pks->company_name) }}', '{{ addslashes($pks->owner_name) }}', '{{ addslashes($pks->phone_number) }}', '{{ addslashes($pks->email) }}', '{{ addslashes($pks->sector) }}', '{{ $pks->facilitator_id }}', '{{ $pks->status }}')"
                                    title="Kemaskini" 
                                    class="w-8 h-8 rounded-xl bg-slate-50 hover:bg-indigo-50 text-slate-400 hover:text-[#4F46E5] inline-flex items-center justify-center transition-all">
                                    <i class="fa-solid fa-pen-to-square text-xs"></i>
                                </button>

                                <button type="button" 
                                    onclick="openDeleteModal({{ $pks->id }})"
                                    title="Padam" 
                                    class="w-8 h-8 rounded-xl bg-slate-50 hover:bg-rose-50 text-slate-400 hover:text-rose-600 inline-flex items-center justify-center transition-all">
                                    <i class="fa-solid fa-trash-can text-xs"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-12 text-center text-slate-400 font-medium">
                                Tiada rekod PKS dijumpai.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- EDIT POPUP MODAL -->
<div id="editModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
    <div class="w-full max-w-2xl bg-[#4F46E5] rounded-3xl p-8 shadow-2xl text-white relative max-h-[90vh] overflow-y-auto">
        <h2 class="text-xl font-extrabold mb-6">Kemaskini PKS</h2>

        <form id="editForm" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-semibold text-white mb-1">Nama Syarikat / PKS</label>
                <input type="text" name="company_name" id="edit_company_name" required class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-medium focus:outline-none">
            </div>

            <div>
                <label class="block text-sm font-semibold text-white mb-1">Nama Pemilik</label>
                <input type="text" name="owner_name" id="edit_owner_name" required class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-medium focus:outline-none">
            </div>

            <div>
                <label class="block text-sm font-semibold text-white mb-1">Nombor Telefon</label>
                <input type="text" name="phone_number" id="edit_phone_number" required class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-medium focus:outline-none">
            </div>

            <div>
                <label class="block text-sm font-semibold text-white mb-1">E-mel Syarikat</label>
                <input type="email" name="email" id="edit_email" required class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-medium focus:outline-none">
            </div>

            <div>
                <label class="block text-sm font-semibold text-white mb-1">Sektor / Jenis Perniagaan</label>
                <input type="text" name="sector" id="edit_sector" required class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-medium focus:outline-none">
            </div>

            <div>
                <label class="block text-sm font-semibold text-white mb-1">Fasilitator</label>
                <select name="facilitator_id" id="edit_facilitator_id" class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-medium focus:outline-none cursor-pointer">
                    <option value="">-- Tiada Fasilitator --</option>
                    @foreach($facilitators as $facilitator)
                        <option value="{{ $facilitator->id }}">{{ $facilitator->name }} ({{ $facilitator->status }})</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold text-white mb-1">Status PKS</label>
                <select name="status" id="edit_status" required class="w-full px-4 py-2.5 rounded-xl bg-white text-slate-900 font-medium focus:outline-none cursor-pointer">
                    <option value="Aktif">Aktif</option>
                    <option value="TIDAK AKTIF">Tidak Aktif</option>
                </select>
            </div>

            <div class="flex items-center justify-end space-x-3 pt-4">
                <button type="button" onclick="closeEditModal()" class="px-5 py-2.5 rounded-xl text-xs font-semibold text-white bg-white/20 hover:bg-white/30 transition-all">Batal</button>
                <button type="submit" class="px-5 py-2.5 rounded-xl text-xs font-semibold text-[#4F46E5] bg-white hover:bg-indigo-50 transition-all shadow-md">Kemaskini</button>
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
            <h3 class="text-lg font-extrabold text-slate-900">Padam Rekod PKS</h3>
            <p class="text-xs text-slate-500 mt-1">Adakah anda pasti untuk memadam rekod ini? Tindakan ini tidak boleh dibatalkan.</p>
        </div>

        <form id="deleteForm" method="POST" class="flex items-center justify-center space-x-3 pt-2">
            @csrf
            @method('DELETE')
            <button type="button" onclick="closeDeleteModal()" class="w-full py-2.5 rounded-xl text-xs font-semibold text-slate-600 bg-slate-100 hover:bg-slate-200 transition-all">Batal</button>
            <button type="submit" class="w-full py-2.5 rounded-xl text-xs font-semibold text-white bg-rose-600 hover:bg-rose-700 transition-all shadow-md shadow-rose-100">Padam</button>
        </form>
    </div>
</div>

<script>
    function openEditModal(id, company, owner, phone, email, sector, facilitatorId, status) {
        document.getElementById('editForm').action = `/admin/pks/${id}`;
        document.getElementById('edit_company_name').value = company;
        document.getElementById('edit_owner_name').value = owner;
        document.getElementById('edit_phone_number').value = phone;
        document.getElementById('edit_email').value = email;
        document.getElementById('edit_sector').value = sector;
        document.getElementById('edit_facilitator_id').value = facilitatorId ?? '';
        document.getElementById('edit_status').value = status;
        document.getElementById('editModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }

    function openDeleteModal(id) {
        document.getElementById('deleteForm').action = `/admin/pks/${id}`;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>
@endsection