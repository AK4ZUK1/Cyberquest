<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CYBERQUEST - Tambah Fasilitator</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-[#f8fafc] text-slate-800 antialiased min-h-screen flex">

    <!-- SIDEBAR COMPONENT -->
    <x-sidebar />

    <!-- MAIN CONTENT AREA -->
    <main class="flex-1 flex flex-col min-w-0 overflow-y-auto">

        <!-- Top Header Controls -->
        <header class="flex justify-between items-center px-8 py-5 border-b border-slate-200/80 bg-white/50 backdrop-blur-sm sticky top-0 z-10">
            <div><!-- Spacer --></div>
            
            <div class="flex items-center space-x-2">
                <a href="{{ url('/admin/profile') }}" title="Profil Pentadbir" 
                    class="w-10 h-10 rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 flex items-center justify-center transition-all shadow-sm group">
                    <i class="fa-solid fa-user-shield text-sm group-hover:text-[#524bf2]"></i>
                </a>

                <a href="{{ url('/admin/settings') }}" title="Tetapan" 
                    class="w-10 h-10 rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 flex items-center justify-center transition-all shadow-sm group">
                    <i class="fa-solid fa-gear text-sm group-hover:text-[#524bf2]"></i>
                </a>

                <button title="Makluman" 
                    class="relative w-10 h-10 rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 flex items-center justify-center transition-all shadow-sm group">
                    <i class="fa-regular fa-bell text-sm group-hover:text-[#524bf2]"></i>
                    <span class="absolute top-2.5 right-2.5 w-2 h-2 bg-rose-500 rounded-full border border-white"></span>
                </button>
            </div>
        </header>

        <!-- Main Body Content -->
        <div class="p-8 max-w-7xl w-full mx-auto space-y-6">

            <!-- Title Page -->
            <div>
                <h1 class="text-2xl font-extrabold text-slate-900">
                    Tambah Fasilitator
                </h1>
            </div>

            <!-- Purple Card Container -->
            <div class="flex justify-center pt-4">
                <div class="w-full max-w-2xl bg-[#524bf2] rounded-3xl p-8 shadow-xl shadow-indigo-200 text-white">
                    
                    <form action="{{ route('admin.fasilitator.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Field 1: Name -->
                        <div>
                            <label for="name" class="block text-sm font-semibold text-white mb-2">
                                Name
                            </label>
                            <input type="text" name="name" id="name" required placeholder="Ahmad Razali"
                                class="w-full px-4 py-3 rounded-xl bg-white text-slate-900 placeholder-slate-400 font-medium focus:outline-none focus:ring-2 focus:ring-indigo-300 transition-all">
                            @error('name')
                                <p class="text-xs text-rose-200 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Field 2: Phone Number -->
                        <div>
                            <label for="phone_number" class="block text-sm font-semibold text-white mb-2">
                                Phone Number
                            </label>
                            <input type="text" name="phone_number" id="phone_number" required placeholder="+60 12-345 6789"
                                class="w-full px-4 py-3 rounded-xl bg-white text-slate-900 placeholder-slate-400 font-medium focus:outline-none focus:ring-2 focus:ring-indigo-300 transition-all">
                            @error('phone_number')
                                <p class="text-xs text-rose-200 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Field 3: E-mail Address -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-white mb-2">
                                E-mail Address
                            </label>
                            <input type="email" name="email" id="email" required placeholder="ahmad.razali@cyberquest.my"
                                class="w-full px-4 py-3 rounded-xl bg-white text-slate-900 placeholder-slate-400 font-medium focus:outline-none focus:ring-2 focus:ring-indigo-300 transition-all">
                            @error('email')
                                <p class="text-xs text-rose-200 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Field 4: Status Dropdown -->
                        <div>
                            <label for="status" class="block text-sm font-semibold text-white mb-2">
                                Status
                            </label>
                            <select name="status" id="status" required
                                class="w-full px-4 py-3 rounded-xl bg-white text-slate-900 font-medium focus:outline-none focus:ring-2 focus:ring-indigo-300 transition-all cursor-pointer">
                                <option value="Aktif">Aktif</option>
                                <option value="Bercuti">Bercuti</option>
                            </select>
                            @error('status')
                                <p class="text-xs text-rose-200 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-end space-x-3 pt-4">
                            <a href="{{ route('admin.fasilitator') }}" 
                                class="px-5 py-2.5 rounded-xl text-xs font-semibold text-white bg-white/20 hover:bg-white/30 transition-all">
                                Cancel
                            </a>
                            <button type="submit" 
                                class="px-5 py-2.5 rounded-xl text-xs font-semibold text-[#524bf2] bg-white hover:bg-indigo-50 transition-all shadow-md">
                                Confirm
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </main>

</body>
</html>