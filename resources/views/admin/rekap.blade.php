@extends('komponen.app')

@section('content')
    <div class="flex">
        @include('komponen.sidebar')


        <main class="w-full flex flex-col ">
            @include('komponen.headerAdmin')

            {{-- Isi --}}
            <main class="container mx-auto py-10 ">

                <div class="flex items-center space-x-6">
                    <i class="fas fa-file-alt text-blue-500 text-4xl"></i>
                    <h2 class="text-4xl font-semibold">Menu Rekap</h2>
                </div>

                <form action="/admin/rekap" method="GET">
                    <div class="flex items-center mt-16 container justify-center gap-8 p-4 ">
                        <div class="flex items-center gap-4">
                            <label for="tanggal" class="text-black font-semibold mb-1 flex rounded-lg">Cari
                                Tanggal:</label>
                            <input type="text" id="tanggal" name="tanggal" value="{{ request('tanggal') }}"
                                class="text-black px-8 py-2 rounded border border-gray-300 focus:outline-none focus:border-indigo-500">
                        </div>
                        <div class="flex  items-center gap-4">
                            <label for="bulan" class="text-black font-semibold mb-1">Pilih Bulan:</label>
                            <select id="bulan" name="bulan"
                                class="rounded-lg border border-gray-300 shadow-sm focus:border-indigo-500 
                        focus:ring focus:ring-indigo-200 bg-white text-gray-900 transition duration-150 ease-in-out hover:bg-indigo-50 px-8 py-2">
                                <option value="">Pilih Bulan</option>
                                <option value="1" {{ request('bulan') == 1 ? 'selected' : '' }}>Januari</option>
                                <option value="2" {{ request('bulan') == 2 ? 'selected' : '' }}>Februari</option>
                                <option value="3" {{ request('bulan') == 3 ? 'selected' : '' }}>Maret</option>
                                <option value="4" {{ request('bulan') == 4 ? 'selected' : '' }}>April</option>
                                <option value="5" {{ request('bulan') == 5 ? 'selected' : '' }}>Mei</option>
                                <option value="6" {{ request('bulan') == 6 ? 'selected' : '' }}>Juni</option>
                                <option value="7" {{ request('bulan') == 7 ? 'selected' : '' }}>Juli</option>
                                <option value="8" {{ request('bulan') == 8 ? 'selected' : '' }}>Agustus</option>
                                <option value="9" {{ request('bulan') == 9 ? 'selected' : '' }}>September</option>
                                <option value="10" {{ request('bulan') == 10 ? 'selected' : '' }}>Oktober</option>
                                <option value="11" {{ request('bulan') == 11 ? 'selected' : '' }}>November</option>
                                <option value="12" {{ request('bulan') == 12 ? 'selected' : '' }}>Desember</option>
                            </select>
                        </div>

                        <div class="flex items-center gap-4">
                            <label for="tahun" class="text-black font-semibold mb-1">Cari Tahun:</label>
                            <input type="text" id="tahun" name="tahun" value="{{ request('tahun') }}"
                                class="text-black px-8 py-2 rounded border border-gray-300 focus:outline-none focus:border-indigo-500">
                        </div>

                        <button type="submit"
                            class="bg-green-500 px-8 py-2 font-semibold rounded-lg text-white flex justify-center items-center gap-3 text-xl transform transition hover:scale-110 duration-300">
                            <span>Cari</span>
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </form>

                {{-- Kotak Border --}}

                <table class="min-w-full border border-blue-500 mt-10">
                    <thead>
                        <tr class="bg-sky-500 text-white">
                            <th class="border border-blue-500 px-4 py-2">Tanggal</th>
                            <th class="border border-blue-500 px-4 py-2">Antiran Umum</th>
                            <th class="border border-blue-500 px-4 py-2">Antiran Prioritas</th>
                            <th class="border border-blue-500 px-4 py-2">Antrian Tidak Di Layani</th>

                        </tr>
                    </thead>
                    {{-- Isi Kotak nya --}}
                    <tbody class="bg-white text-center">
                        @foreach ($rekaps as $rekap)
                            <tr>
                                <td class="border border-blue-500 px-4 py-2">
                                    {{ \Carbon\Carbon::parse($rekap->tanggal)->translatedFormat('d F Y') }}</td>
                                <td class="border border-blue-500 px-4 py-2">{{ $rekap->jmblh_umum }}</td>
                                <td class="border border-blue-500 px-4 py-2">{{ $rekap->jmblh_prioritas }}</td>
                                <td class="border border-blue-500 px-4 py-2">{{ $rekap->tdk_dilayani }}</td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                <div class="mt-8">
                    {{ $rekaps->links() }}
                </div>
            </main>



        </main>
    </div>
@endsection
