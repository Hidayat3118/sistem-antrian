@extends('komponen.app')

@section('content')
    <div class="flex">
        @include('komponen.sidebar')
        
        

        <main class="w-full flex flex-col ">
            @include('komponen.headerAdmin')
            
            {{-- Judul --}}

            <div class="flex  space-x-3 container mx-auto  pl-16 lg:pl-24 xl:pl-32  xl:text-4xl text-3xl mt-10">
                <!-- Ikon antrian menggunakan Font Awesome -->
                <i class="fas fa-users text-blue-500 "></i>
                <h1 class=" font-bold">Menu Antrian Loket 2</h1>
            </div>

            <div class=" gap-12 mt-24 mx-auto">
                {{-- Kotak Antiran Umum --}}
                <div class="bg-gray-100 text-center p-8 rounded-xl shadow-lg space-y-6 xl:max-w-xl lg:max-w-lg max-w-md transition-transform duration-300 hover:shadow-2xl hover:scale-105 border border-gray-200">
                    <h2 class="text-6xl font-bold text-gray-800">Prioritas</h2>
                    
                    {{-- Kartu Prioritas --}}
                    <div class="bg-red-500 border border-black rounded-xl p-6 text-white shadow-md">
                        <h1 id="nomorAntrian" class="text-8xl font-extrabold flex items-center justify-center space-x-2 text-gray-200">
                            <i class="fas fa-ticket-alt"></i>
                            <span>B009</span>
                        </h1>
                        <p class="mt-4 text-lg font-semibold">Status: <span class="font-light">Belum dipanggil</span></p>
                    </div>
                    
                    {{-- Sisa Antrian --}}
                    <p class="text-3xl text-gray-700">Sisa Antrian: <span class="font-bold text-red-500">5</span></p>
                    
                    {{-- Tombol Aksi --}}
                    <div class="flex justify-center space-x-2">
                        <button id="panggilBtn"
                            class="bg-red-500 hover:bg-red-600 py-2 px-3 lg:py-3 lg:px-3 rounded-lg text-white font-bold flex items-center space-x-2 shadow-lg transition-transform duration-300 hover:shadow-2xl hover:scale-105 border border-gray-200">
                            <i class="fas fa-bullhorn"></i>
                            <span class="text-xs md:text-sm lg:text-base">Panggil/Ulangi</span>
                        </button>
                        
                        <button
                            class="bg-red-500 hover:bg-red-600 py-2 px-3 lg:py-3 lg:px-3 rounded-lg text-white font-bold flex items-center space-x-2 shadow-lg transition-transform duration-300 hover:shadow-2xl hover:scale-105 border border-gray-200">
                            <i class="fas fa-check-circle"></i>
                            <span class="text-xs md:text-sm lg:text-base">Selesai</span>
                        </button>
                        
                        <button
                            class="bg-red-500 hover:bg-red-600 py-2 px-3 lg:py-3 lg:px-3 rounded-lg text-white font-bold flex items-center space-x-2 shadow-lg transition-transform duration-300 hover:shadow-2xl hover:scale-105 border border-gray-200">
                            <span class="text-xs md:text-sm lg:text-base">Selanjutnya</span>
                            <i class="fas fa-arrow-right mt-1"></i>
                        </button>
                    </div>
                </div>
            </div>
        
            <script>
                let suaraTerpilih;
                let suaraTerdaftar = false; // Menandai apakah suara sudah terdaftar
        
                function muatSuara() {
                    const daftarSuara = window.speechSynthesis.getVoices();
        
                    // Mencari suara perempuan bahasa Indonesia
                    suaraTerpilih = daftarSuara.find(suara => suara.lang === 'id-ID' && suara.name.toLowerCase().includes("female"))
                                    || daftarSuara.find(suara => suara.lang === 'en-US' && suara.name.toLowerCase().includes("female"))
                                    || daftarSuara.find(suara => suara.lang === 'id-ID')
                                    || daftarSuara[0]; // Fallback jika tidak ada suara spesifik
        
                    console.log("Suara terpilih:", suaraTerpilih ? suaraTerpilih.name : "Tidak ada suara khusus ditemukan.");
                    suaraTerdaftar = true; // Menandai suara sudah terdaftar
                }
        
                function panggilNomor() {
                    const nomor = document.getElementById("nomorAntrian").textContent;
        
                    if ('speechSynthesis' in window) {
                        // Menghentikan ucapan sebelumnya jika ada
                        window.speechSynthesis.cancel();
        
                        // Memastikan suara terbaru
                        if (!suaraTerdaftar) {
                            muatSuara();
                        }
        
                        // Tunggu beberapa detik hingga suara terdaftar sebelum berbicara
                        if (suaraTerdaftar) {
                            const ucapan = new SpeechSynthesisUtterance(`Nomor antrian ${nomor}`);
                            ucapan.lang = suaraTerpilih ? suaraTerpilih.lang : 'id-ID';
                            ucapan.pitch = 1.0; // Pitch lebih tinggi untuk efek suara perempuan
                            ucapan.rate = 1.0; // Kecepatan lebih lambat untuk kejelasan
        
                            if (suaraTerpilih) {
                                ucapan.voice = suaraTerpilih;
                            }
        
                            speechSynthesis.speak(ucapan);
                        } else {
                            console.error("Suara belum terdaftar, silakan coba lagi.");
                        }
                    } else {
                        alert("Browser ini tidak mendukung fitur suara panggilan otomatis.");
                    }
                }
        
                // Memuat suara saat daftar suara berubah (Chrome) atau saat halaman selesai dimuat (browser lainnya)
                window.speechSynthesis.onvoiceschanged = muatSuara;
                document.addEventListener("DOMContentLoaded", muatSuara);
                
                // Menangani pengulangan panggilan
                document.getElementById('panggilBtn').addEventListener('click', panggilNomor);
            </script>

        </main>
    </div>
@endsection
