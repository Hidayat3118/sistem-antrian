{{-- Navbar atau Header --}}
<header class=" bg-sky-500 shadow-xl p-8">
    <div class="container mx-auto flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <div>
                <h1 class="text-4xl font-extrabold text-white">Puskesmas Kuin Raya</h1>
                <p class="text-lg font-medium text-white opacity-80">Kesehatan Anda, Prioritas Kami</p>
            </div>
        </div>
        <div class="text-white font-semibold flex items-end">
            <span>Hai Selamat Datang, </span>
            <h2 class="ml-2 font-bold text-xl">{{ Auth::guard('admin')->user()->nama }}</h2>
        </div>
    </div>
</header>
