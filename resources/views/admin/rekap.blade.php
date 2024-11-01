@extends('komponen.app')

@section('content')
    {{-- Header Include --}}
    @include('komponen.header')

    <div class="flex">
        @include('komponen.sidebar')

        <div class="container mx-auto py-10">
            <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Rekap Data Antrian</h2>

            <!-- Dropdown Filter -->
            <div class="flex justify-center mb-12 space-x-6">
                <div class="text-center">
                    <label for="filterHari" class="mr-4 text-lg font-semibold text-gray-600">Harian:</label>
                    <select id="filterHari" class="border rounded-lg px-4 py-2 text-gray-700 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Semua</option>
                        @foreach (range(1, 31) as $day)
                            <option value="hari{{ $day }}">Hari {{ $day }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="text-center">
                    <label for="filterBulan" class="mr-4 text-lg font-semibold text-gray-600">Bulanan:</label>
                    <select id="filterBulan" class="border rounded-lg px-4 py-2 text-gray-700 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Semua</option>
                        @foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $month)
                            <option value="{{ strtolower($month) }}">{{ $month }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="text-center">
                    <label for="filterTahun" class="mr-4 text-lg font-semibold text-gray-600">Tahunan:</label>
                    <select id="filterTahun" class="border rounded-lg px-4 py-2 text-gray-700 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Semua</option>
                        @foreach (range(date('Y') - 5, date('Y')) as $year)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Antrian Umum -->
            <h3 class="text-2xl font-semibold text-gray-800 mt-6 mb-6">Antrian Umum</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                <!-- Umum Harian -->
                <div class="bg-white shadow-lg rounded-xl p-8 text-center transition transform hover:scale-105 category hari1 hari2 hari3">
                    <i class="fas fa-calendar-day text-blue-500 text-3xl mb-4"></i>
                    <h4 class="text-xl font-semibold text-gray-700 mb-2">Harian</h4>
                    <p class="text-gray-400 mb-3">Jumlah hari ini</p>
                    <p class="text-4xl font-extrabold text-blue-600">150</p>
                </div>

                <!-- Umum Bulanan -->
                <div class="bg-white shadow-lg rounded-xl p-8 text-center transition transform hover:scale-105 category januari">
                    <i class="fas fa-calendar-alt text-blue-500 text-3xl mb-4"></i>
                    <h4 class="text-xl font-semibold text-gray-700 mb-2">Bulanan</h4>
                    <p class="text-gray-400 mb-3">Jumlah bulan ini</p>
                    <p class="text-4xl font-extrabold text-blue-600">3,200</p>
                </div>

                <!-- Umum Tahunan -->
                <div class="bg-white shadow-lg rounded-xl p-8 text-center transition transform hover:scale-105 category 2024">
                    <i class="fas fa-calendar text-blue-500 text-3xl mb-4"></i>
                    <h4 class="text-xl font-semibold text-gray-700 mb-2">Tahunan</h4>
                    <p class="text-gray-400 mb-3">Jumlah tahun ini</p>
                    <p class="text-4xl font-extrabold text-blue-600">38,500</p>
                </div>

                <!-- Umum Tidak Dilayani Harian -->
                <div class="bg-white shadow-lg rounded-xl p-8 text-center transition transform hover:scale-105 category hari10">
                    <i class="fas fa-times-circle text-red-500 text-3xl mb-4"></i>
                    <h4 class="text-xl font-semibold text-gray-700 mb-2">Tidak Dilayani (Harian)</h4>
                    <p class="text-gray-400 mb-3">Jumlah hari ini</p>
                    <p class="text-4xl font-extrabold text-blue-600">10</p>
                </div>
            </div>

            <!-- Antrian Prioritas -->
            <h3 class="text-2xl font-semibold text-gray-800 mt-12 mb-6">Antrian Prioritas</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                <!-- Prioritas Harian -->
                <div class="bg-white shadow-lg rounded-xl p-8 text-center transition transform hover:scale-105 category hari1">
                    <i class="fas fa-calendar-day text-green-500 text-3xl mb-4"></i>
                    <h4 class="text-xl font-semibold text-gray-700 mb-2">Harian</h4>
                    <p class="text-gray-400 mb-3">Jumlah hari ini</p>
                    <p class="text-4xl font-extrabold text-green-600">50</p>
                </div>

                <!-- Prioritas Bulanan -->
                <div class="bg-white shadow-lg rounded-xl p-8 text-center transition transform hover:scale-105 category februari">
                    <i class="fas fa-calendar-alt text-green-500 text-3xl mb-4"></i>
                    <h4 class="text-xl font-semibold text-gray-700 mb-2">Bulanan</h4>
                    <p class="text-gray-400 mb-3">Jumlah bulan ini</p>
                    <p class="text-4xl font-extrabold text-green-600">1,200</p>
                </div>

                <!-- Prioritas Tahunan -->
                <div class="bg-white shadow-lg rounded-xl p-8 text-center transition transform hover:scale-105 category 2024">
                    <i class="fas fa-calendar text-green-500 text-3xl mb-4"></i>
                    <h4 class="text-xl font-semibold text-gray-700 mb-2">Tahunan</h4>
                    <p class="text-gray-400 mb-3">Jumlah tahun ini</p>
                    <p class="text-4xl font-extrabold text-green-600">15,000</p>
                </div>

                <!-- Prioritas Tidak Dilayani Harian -->
                <div class="bg-white shadow-lg rounded-xl p-8 text-center transition transform hover:scale-105 category hari5">
                    <i class="fas fa-times-circle text-red-500 text-3xl mb-4"></i>
                    <h4 class="text-xl font-semibold text-gray-700 mb-2">Tidak Dilayani (Harian)</h4>
                    <p class="text-gray-400 mb-3">Jumlah hari ini</p>
                    <p class="text-4xl font-extrabold text-green-600">5</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Script untuk Dropdown Filter -->
    <script>
        function filterCategories() {
            const hariSelected = document.getElementById('filterHari').value;
            const bulanSelected = document.getElementById('filterBulan').value;
            const tahunSelected = document.getElementById('filterTahun').value;
            const categories = document.querySelectorAll('.category');

            categories.forEach(category => {
                const isVisible = 
                    (hariSelected === "" || category.classList.contains(hariSelected)) &&
                    (bulanSelected === "" || category.classList.contains(bulanSelected)) &&
                    (tahunSelected === "" || category.classList.contains(tahunSelected));
                
                category.style.display = isVisible ? 'block' : 'none';
            });
        }

        document.getElementById('filterHari').addEventListener('change', filterCategories);
        document.getElementById('filterBulan').addEventListener('change', filterCategories);
        document.getElementById('filterTahun').addEventListener('change', filterCategories);

        // Initialize to show all on page load
        filterCategories();
    </script>
    
@endsection
