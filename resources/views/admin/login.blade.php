@extends('komponen.app')

@section('content')
    {{-- Header Include --}}
    @include('komponen.header')

    <main class=" relative min-h-screen flex flex-col items-center justify-center bg-cover bg-center"  style="background-image: url('../img/kuin.jpg');">

        <div class="bg-gradient-to-r bg-sky-500 rounded-lg shadow-lg p-8 w-[400px] mx-auto opacity-95">

            {{-- Notifikasi gagal login --}}
            @if (session('error'))
                <div class="bg-red-500 text-white text-center p-3 rounded-md mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <div class="flex items-center justify-center mb-4">
                <div class="w-16 h-16 rounded-full bg-white flex items-center justify-center shadow-lg">
                    <img src="../img/medis.png" alt="" class="w-12 h-12">
                </div>
            </div>
            <h2 class="text-center text-white text-2xl font-bold mb-6">Login Admin</h2>
            <form action="/admin/login" method="POST">
                @csrf
                <div class="mb-5">
                    {{-- Input username --}}
                    <div class="relative">
                        <input type="text" placeholder="Username" name="username"
                            class="border border-gray-300 rounded-md py-2 px-10 w-full focus:outline-none focus:border-blue-400 transition duration-200 shadow-sm hover:shadow-md"
                            required>
                        <span class="absolute left-3 top-2 text-gray-400"><i class="fa-solid fa-user"></i></span>

                    </div>
                </div>
                <div class="mb-5">
                    {{-- Input password --}}
                    <div class="relative">
                        <input type="password" id="password" placeholder="Password" name="password"
                            class="border border-gray-300 rounded-md py-2 px-10 w-full focus:outline-none focus:border-blue-400 transition duration-200 shadow-sm hover:shadow-md"
                            required>
                        <span class="absolute left-3 top-2 text-gray-400"><i class="fa-solid fa-lock"></i></span>

                        <span class="absolute right-3 top-2 text-gray-400 cursor-pointer" id="togglePassword"
                            onclick="togglePasswordVisibility()">
                            <i class="fa-solid fa-eye" id="eyeIcon"></i>
                        </span>
                    </div>

                </div>
                <div class="flex items-center justify-between mb-5">
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox text-blue-500">
                        <span class="ml-2 text-white">Remember me</span>
                    </label>
                   
                </div>
                <button
                    class="bg-yellow-400 text-black rounded-md py-2 w-full hover:bg-yellow-500 font-bold  transition duration-200 transform hover:scale-105">LOGIN</button>
            </form>
        </div>

    </main>



    <script src="{{ asset('js/login.js') }}"></script>
@endsection
