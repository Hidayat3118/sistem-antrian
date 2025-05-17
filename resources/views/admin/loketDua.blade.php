@extends('komponen.app')

@section('content')
    <div class="flex">
        @include('komponen.sidebar')

        <main class="w-full flex flex-col">
            @include('komponen.headerAdmin')

            <div class="flex space-x-3 container mx-auto xl:text-4xl text-3xl mt-10">
                <i class="fas fa-users text-blue-500"></i>
                <h1 class="font-bold">Menu Antrian Loket 2</h1>
            </div>

            <div class="gap-12 mt-24 mx-auto">
                <div
                    class="bg-gray-100 text-center p-8 rounded-xl shadow-lg space-y-6 xl:max-w-xl lg:max-w-lg max-w-md transition-transform duration-300 hover:shadow-2xl hover:scale-105 border border-gray-200">
                    <h2 class="text-6xl font-bold text-gray-800">Prioritas</h2>

                    <div class="bg-red-500 border border-black rounded-xl p-6 text-white shadow-md">
                        <h1 id="nomorAntrian"
                            class="text-8xl font-extrabold flex items-center justify-center space-x-2 text-gray-200">
                            <i class="fas fa-ticket-alt"></i>
                            <span>kosong</span>
                        </h1>
                        <p class="mt-4 text-lg font-semibold">Status: <span class="font-light">Belum dipanggil</span></p>
                    </div>

                    <p class="text-3xl text-gray-700">Sisa Antrian: <span id="sisaAntrian"
                            class="font-bold text-red-500">0</span></p>

                    {{-- Tombol Aksi --}}
                    <div id="aksiAntrian" class="flex justify-center space-x-2 hidden">
                        {{-- Panggil --}}
                        <button id="panggilBtn"
                            class="bg-red-500 hover:bg-red-600 py-2 px-3 lg:py-3 lg:px-3 rounded-lg text-white font-bold flex items-center space-x-2 shadow-lg transition-transform duration-300 hover:shadow-2xl hover:scale-105 border border-gray-200">
                            <i class="fas fa-bullhorn"></i>
                            <span class="text-xs md:text-sm lg:text-base">Panggil/Ulangi</span>
                        </button>

                        {{-- Selesai --}}
                        <form id="formSelesai" method="POST">
                            @csrf
                            @method('PUT')
                            <button id="selesaiBtn" type="submit" onclick="tandaiSelesai()"
                                class="bg-red-500 hover:bg-red-600 y-2 px-3 lg:py-3 lg:px-3 rounded-lg text-white font-bold flex items-center space-x-2 shadow-lg transition-transform duration-300 hover:shadow-2xl hover:scale-105 border border-gray-200">
                                <i id="iconSelesai" class="fas fa-check-circle"></i>
                                <span id="textSelesai" class="text-xs md:text-sm lg:text-base">Selesai</span>
                            </button>
                        </form>

                        {{-- Lanjut --}}
                        <form id="formTerlewat" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-600 py-2 px-3 lg:py-3 lg:px-3 rounded-lg text-white font-bold flex items-center space-x-2 shadow-lg transition-transform duration-300 hover:shadow-2xl hover:scale-105 border border-gray-200">
                                <span class="text-xs md:text-sm lg:text-base">Selanjutnya</span>
                                <i class="fas fa-arrow-right mt-1"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- JS --}}
            <script>
                let suaraTerpilih;
                let suaraTerdaftar = false;
                let idTerakhir = null;

                function muatSuara() {
                    const daftarSuara = window.speechSynthesis.getVoices();
                    suaraTerpilih = daftarSuara.find(s => s.lang === 'id-ID' && s.name.toLowerCase().includes("female")) ||
                        daftarSuara.find(s => s.lang === 'id-ID') ||
                        daftarSuara[0];
                    suaraTerdaftar = true;
                }

                function panggilNomor() {
                    const nomor = document.querySelector("#nomorAntrian span").textContent;
                    if ('speechSynthesis' in window && suaraTerdaftar && nomor !== 'kosong') {
                        window.speechSynthesis.cancel();
                        const ucapan = new SpeechSynthesisUtterance(`Nomor antrian ${nomor}`);
                        ucapan.lang = suaraTerpilih?.lang || 'id-ID';
                        ucapan.pitch = 1.0;
                        ucapan.rate = 1.0;
                        if (suaraTerpilih) ucapan.voice = suaraTerpilih;
                        speechSynthesis.speak(ucapan);
                    }
                }

                function tandaiSelesai() {
                    const icon = document.getElementById("iconSelesai");
                    const text = document.getElementById("textSelesai");
                    if (icon.classList.contains("fa-check-circle")) {
                        icon.classList.replace("fa-check-circle", "fa-check-double");
                        text.textContent = "Sudah Selesai";
                    } else {
                        icon.classList.replace("fa-check-double", "fa-check-circle");
                        text.textContent = "Selesai";
                    }
                }

                function updateAntrian() {
                    fetch('/antrian/terbaru/prioritas')
                        .then(res => res.json())
                        .then(data => {
                            const nomorElem = document.querySelector('#nomorAntrian span');
                            const aksiElem = document.getElementById('aksiAntrian');
                            const formSelesai = document.getElementById('formSelesai');
                            const formTerlewat = document.getElementById('formTerlewat');

                            if (data.antrian) {
                                nomorElem.textContent = data.antrian.nomor_antrian ?? 'kosong';
                                document.getElementById('sisaAntrian').textContent = data.sisaAntrian;
                                aksiElem.classList.remove('hidden');

                                if (formSelesai) formSelesai.action = `/antrian/selesai/${data.antrian.id}`;
                                if (formTerlewat) formTerlewat.action = `/antrian/terlewat/${data.antrian.id}`;

                                const statusElem = document.querySelector('#nomorAntrian + p span');
                                if (statusElem) statusElem.textContent = 'Belum dipanggil';

                                // Reattach handler
                                document.getElementById('panggilBtn')?.addEventListener('click', panggilNomor);
                            } else {
                                nomorElem.textContent = 'kosong';
                                document.getElementById('sisaAntrian').textContent = '0';
                                aksiElem.classList.add('hidden');

                                if (formSelesai) formSelesai.action = '';
                                if (formTerlewat) formTerlewat.action = '';
                            }
                        })
                        .catch(err => console.error('Gagal ambil data:', err));
                }

                window.speechSynthesis.onvoiceschanged = muatSuara;
                document.addEventListener("DOMContentLoaded", () => {
                    muatSuara();
                    updateAntrian();
                    setInterval(updateAntrian, 5000);
                });
            </script>
        </main>
    </div>
@endsection
