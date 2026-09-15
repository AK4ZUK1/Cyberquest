@extends('layouts.admin')

@section('title', 'Direktori Fasilitator')

@section('content')
<div class="max-w-7xl w-full mx-auto space-y-6">

    <!-- Flash Success Message -->
    @if(session('success'))
        <div class="p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold">
            {{ session('success') }}
        </div>
    @endif

    <!-- Title, Subtitle, & Action Button -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900">
                Direktori Fasilitator
            </h1>
            <p class="text-xs font-medium text-slate-500 mt-1">
                Urus fasilitator lapangan dan beban kerja mereka.
            </p>
        </div>

        <a href="{{ route('admin.fasilitator.create') }}" 
           class="inline-flex items-center justify-center space-x-2 bg-[#4F46E5] hover:bg-indigo-600 text-white font-semibold text-xs px-4 py-2.5 rounded-xl transition-all shadow-md shadow-indigo-100">
            <i class="fa-solid fa-plus text-xs"></i>
            <span>Tambah Fasilitator</span>
        </a>
    </div>

    <!-- CARDS GRID CONTAINER -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @forelse($facilitators as $facilitator)
            <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm flex flex-col justify-between relative group">
                <div>
                    <!-- Header Avatar, Status & Action Icons -->
                    <div class="flex items-start justify-between mb-6">
                        <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-[#4F46E5] font-extrabold text-base flex items-center justify-center">
                            {{ strtoupper(substr($facilitator->name, 0, 1)) }}
                        </div>

                        <div class="flex items-center space-x-2">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold {{ $facilitator->status === 'Aktif' ? 'bg-emerald-50 text-emerald-600 border border-emerald-100' : 'bg-amber-50 text-amber-600 border border-amber-100' }}">
                                {{ $facilitator->status }}
                            </span>

                            <!-- Edit Button Trigger -->
                            <button type="button" 
                                    onclick="openEditModal({{ $facilitator->id }}, '{{ addslashes($facilitator->name) }}', '{{ addslashes($facilitator->phone_number) }}', '{{ addslashes($facilitator->email) }}', '{{ addslashes($facilitator->status) }}')"
                                    title="Kemaskini" 
                                    class="w-8 h-8 rounded-xl bg-slate-50 hover:bg-indigo-50 text-slate-400 hover:text-[#4F46E5] flex items-center justify-center transition-all">
                                <i class="fa-solid fa-pen-to-square text-xs"></i>
                            </button>

                            <!-- Delete Button Trigger -->
                            <button type="button" 
                                    onclick="openDeleteModal({{ $facilitator->id }})"
                                    title="Padam" 
                                    class="w-8 h-8 rounded-xl bg-slate-50 hover:bg-rose-50 text-slate-400 hover:text-rose-600 flex items-center justify-center transition-all">
                                <i class="fa-solid fa-trash-can text-xs"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Info -->
                    <h3 class="text-base font-extrabold text-slate-900">{{ $facilitator->name }}</h3>
                    <div class="mt-3 space-y-1.5 text-xs font-medium text-slate-500">
                        <div class="flex items-center space-x-2">
                            <i class="fa-solid fa-phone text-[11px] text-slate-400 w-4"></i>
                            <span>{{ $facilitator->phone_number }}</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fa-regular fa-envelope text-[11px] text-slate-400 w-4"></i>
                            <span>{{ $facilitator->email }}</span>
                        </div>
                    </div>
                </div>

                <!-- Footer: Assigned SMEs -->
                <div class="mt-8 pt-4 border-t border-slate-100 flex items-center justify-between">
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">PKS DITUGASKAN</span>
                    <span class="text-lg font-black text-[#4F46E5]">{{ $facilitator->pks_assigned }}</span>
                </div>
            </div>
        @empty
            <div class="col-span-full py-12 text-center text-slate-400 text-xs font-medium bg-white rounded-3xl border border-slate-100">
                Tiada fasilitator dijumpai. Sila tambah fasilitator baru.
            </div>
        @endforelse

    </div>

</div>

<!-- EDIT POPUP MODAL -->
<div id="editModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
    <div class="w-full max-w-2xl bg-[#4F46E5] rounded-3xl p-8 shadow-2xl text-white relative">
        <h2 class="text-xl font-extrabold mb-6">Kemaskini Fasilitator</h2>

        <form id="editForm" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="edit_name" class="block text-sm font-semibold text-white mb-2">Name</label>
                <input type="text" name="name" id="edit_name" required class="w-full px-4 py-3 rounded-xl bg-white text-slate-900 placeholder-slate-400 font-medium focus:outline-none focus:ring-2 focus:ring-indigo-300 transition-all">
            </div>

            <div>
                <label for="edit_phone_number" class="block text-sm font-semibold text-white mb-2">Phone Number</label>
                <input type="text" name="phone_number" id="edit_phone_number" required class="w-full px-4 py-3 rounded-xl bg-white text-slate-900 placeholder-slate-400 font-medium focus:outline-none focus:ring-2 focus:ring-indigo-300 transition-all">
            </div>

            <div>
                <label for="edit_email" class="block text-sm font-semibold text-white mb-2">E-mail Address</label>
                <input type="email" name="email" id="edit_email" required class="w-full px-4 py-3 rounded-xl bg-white text-slate-900 placeholder-slate-400 font-medium focus:outline-none focus:ring-2 focus:ring-indigo-300 transition-all">
            </div>

            <div>
                <label for="edit_status" class="block text-sm font-semibold text-white mb-2">Status</label>
                <select name="status" id="edit_status" required class="w-full px-4 py-3 rounded-xl bg-white text-slate-900 font-medium focus:outline-none focus:ring-2 focus:ring-indigo-300 transition-all cursor-pointer">
                    <option value="Aktif">Aktif</option>
                    <option value="Bercuti">Bercuti</option>
                </select>
            </div>

            <div class="flex items-center justify-end space-x-3 pt-4">
                <button type="button" onclick="closeEditModal()" class="px-5 py-2.5 rounded-xl text-xs font-semibold text-white bg-white/20 hover:bg-white/30 transition-all">Cancel</button>
                <button type="submit" class="px-5 py-2.5 rounded-xl text-xs font-semibold text-[#4F46E5] bg-white hover:bg-indigo-50 transition-all shadow-md">Update</button>
            </div>
        </form>
    </div>
</div>

<!-- DELETE CONFIRMATION POPUP MODAL -->
<div id="deleteModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
    <div class="w-full max-w-md bg-white rounded-3xl p-6 shadow-2xl text-slate-800 border border-slate-100 text-center space-y-4">
        <div class="w-14 h-14 bg-rose-50 rounded-2xl text-rose-500 flex items-center justify-center mx-auto text-xl border border-rose-100">
            <i class="fa-solid fa-triangle-exclamation"></i>
        </div>

        <div>
            <h3 class="text-lg font-extrabold text-slate-900">Padam Fasilitator</h3>
            <p class="text-xs text-slate-500 mt-1">Adakah anda pasti untuk memadam fasilitator ini? Tindakan ini tidak boleh dibatalkan.</p>
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
    function openEditModal(id, name, phone, email, status) {
        document.getElementById('editForm').action = `/admin/fasilitator/${id}`;
        document.getElementById('edit_name').value = name;
        document.getElementById('edit_phone_number').value = phone;
        document.getElementById('edit_email').value = email;
        document.getElementById('edit_status').value = status;
        document.getElementById('editModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }

    function openDeleteModal(id) {
        document.getElementById('deleteForm').action = `/admin/fasilitator/${id}`;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>
@endsection