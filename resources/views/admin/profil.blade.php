@extends('komponen.app')

@section('content')
    <div class="flex">
        @include('komponen.sidebar')
        
        
        <main class="w-full flex flex-col ">
            @include('komponen.headerAdmin')
            
            {{-- Judul --}}

            <main class="bg-white shadow-lg rounded-lg w-full max-w-lg p-8 mx-auto my-auto">

            
                <!-- Profil Header -->
                <div class="flex items-center justify-center mb-6">
                    <div class="bg-blue-500 text-white p-4 rounded-full">
                        <i class="fas fa-user-circle text-4xl"></i>
                    </div>
                </div>
                <h2 class="text-2xl font-semibold text-center text-gray-800 mb-4">Profil Admin</h2>
                <p class="text-center text-gray-600 mb-6">Kelola informasi profil Anda</p>
    
                <!-- Form Profil -->
                <form action="#" method="post">
                    <!-- Nama Lengkap -->
                    <div class="mb-4">
                        <label for="fullname" class="block text-sm font-medium text-gray-600 mb-1">Nama Lengkap</label>
                        <div class="relative">
                            <input type="text" id="fullname"
                                class="w-full p-3 pl-10 bg-gray-50 rounded-lg border border-gray-300 focus:border-blue-500 focus:outline-none"
                                value="Admin Example">
                            <i class="fas fa-user absolute left-3 top-4 text-gray-400"></i>
                        </div>
                    </div>
    
                    <!-- Username -->
                    <div class="mb-4">
                        <label for="username" class="block text-sm font-medium text-gray-600 mb-1">Username</label>
                        <div class="relative">
                            <input type="text" id="username"
                                class="w-full p-3 pl-10 bg-gray-50 rounded-lg border border-gray-300 focus:border-blue-500 focus:outline-none"
                                value="admin123">
                            <i class="fas fa-user-tag absolute left-3 top-4 text-gray-400"></i>
                        </div>
                    </div>
    
                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-600 mb-1">Password</label>
                        <div class="relative">
                            <input type="password" id="password"
                                class="w-full p-3 pl-10 pr-10 bg-gray-50 rounded-lg border border-gray-300 focus:border-blue-500 focus:outline-none">
                            <i class="fas fa-lock absolute left-3 top-4 text-gray-400"></i>
                            <i class="fas fa-eye absolute right-3 top-4 text-gray-400 cursor-pointer" id="togglePassword"></i>
                        </div>
                    </div>
    
                    <!-- Role -->
                    <div class="mb-4">
                        <label for="role" class="block text-sm font-medium text-gray-600 mb-1">Role</label>
                        <div class="relative">
                            <input type="text" id="role"
                                class="w-full p-3 pl-10 bg-gray-50 rounded-lg border border-gray-300 focus:border-blue-500 focus:outline-none"
                                value="Administrator" readonly>
                            <i class="fas fa-user-shield absolute left-3 top-4 text-gray-400"></i>
                        </div>
                    </div>
    
                    <!-- Tombol Aksi -->
                    <div class="flex justify-center mt-7">
                        <button type="button"
                            class="w-full  bg-green-500 hover:bg-green-600 text-white font-semibold py-3 rounded-lg focus:outline-none transform transition hover:scale-105 duration-300">
                            <i class="fas fa-save mr-2"></i>Simpan Perubahan
                        </button>
                        
                    </div>
                </form>
            </main>
        
        </main>
    </div>

    <script src="{{ asset('js/admin/profil.js') }}"></script>
@endsection
