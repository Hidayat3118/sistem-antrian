@extends('komponen.app')

@section('content')
    {{-- Header Include --}}
    @include('komponen.header')


    <main class=" mx-auto flex my-auto  justify-center items-center min-h-screen ">

        <div
            class="bg-gradient-to-r from-blue-100 to-indigo-100 border mt-20 rounded-2xl w-full max-w-screen-2xl mx-auto p-12">
            <div class="flex flex-col md:flex-row gap-12 items-stretch">

                <!-- Konten Video -->
                <div class="w-full md:w-1/2 flex">
                    <div class="w-full h-full flex items-center">
                        @if ($video)
                            <div
                                class="h-full min-h-[30rem] w-full rounded-2xl bg-blue-50 border border-gray-300 flex flex-col items-center justify-center text-gray-600 shadow-2xl">
                                <div
                                    class="relative w-full pt-[56.25%] bg-blue-50 border border-gray-300 shadow-2xl rounded-2xl overflow-hidden">
                                    <video class="absolute top-0 left-0 w-full h-full" controls autoplay>
                                        <source src="{{ asset('storage/' . $video->file_path) }}" type="video/mp4">
                                        Browser Anda tidak mendukung pemutaran video.
                                    </video>
                                </div>
                            </div>
                        @else
                            <div
                                class="h-full min-h-[30rem] w-full rounded-2xl bg-blue-50 border border-gray-300 flex flex-col items-center justify-center text-gray-600 shadow-2xl">
                                <p class="text-3xl font-bold mb-4">Tidak ada video yang ditampilkan.</p>
                                <div class="flex items-center gap-6">
                                    <i class="fas fa-clipboard-list text-8xl text-blue-400"></i>
                                    <span class="text-4xl font-semibold">Konten</span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Konten Antrian -->
                <div class="w-full md:w-1/2 flex flex-col justify-center">
                    <div class="bg-white/60 backdrop-blur-lg p-10 rounded-2xl shadow-2xl h-full">
                        <h2 class="text-center text-5xl font-extrabold text-gray-700 mb-10">
                            <i class="fas fa-users text-blue-500 mr-4"></i> Sisa Antrian
                        </h2>

                        <div class="flex flex-col sm:flex-row items-center justify-center gap-10 mb-14">
                            <div class="flex items-center gap-4">
                                <i class="fas fa-user text-green-500 text-5xl"></i>
                                <div class="text-3xl text-gray-700">
                                    Umum (A):
                                    <span id="sisa-umum" class="font-extrabold text-red-500">0</span>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <i class="fas fa-user-shield text-red-500 text-5xl"></i>
                                <div class="text-3xl text-gray-700">
                                    Prioritas (B):
                                    <span id="sisa-prioritas" class="font-extrabold text-red-500">0</span>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-12">
                            <!-- Loket 1 -->
                            <div
                                class="bg-gradient-to-tr from-green-500 to-green-600 p-10 rounded-2xl text-white shadow-xl text-center">
                                <div class="flex flex-col items-center mb-6">
                                    <i class="fas fa-desktop text-7xl mb-4"></i>
                                    <h3 class="text-4xl font-bold">Loket 1</h3>
                                </div>
                                <div id="antrian-umum" class="text-6xl font-extrabold tracking-wide">-</div>
                            </div>

                            <!-- Loket 2 -->
                            <div
                                class=" bg-red-500 p-10 rounded-2xl text-white shadow-xl text-center">
                                <div class="flex flex-col items-center mb-6">
                                    <i class="fas fa-desktop text-7xl mb-4"></i>
                                    <h3 class="text-4xl font-bold">Loket 2</h3>
                                </div>
                                <div id="antrian-prioritas" class="text-6xl font-extrabold tracking-wide">-</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </main>
    <script>
        function updateMonitorAntrian() {
            fetch('/monitor/data')
                .then(response => {
                    if (!response.ok) throw new Error('Gagal fetch data');
                    return response.json();
                })
                .then(data => {
                    const umumElem = document.getElementById('antrian-umum');
                    const prioritasElem = document.getElementById('antrian-prioritas');
                    const sisaUmum = document.getElementById('sisa-umum');
                    const sisaPrioritas = document.getElementById('sisa-prioritas');

                    if (umumElem) {
                        umumElem.textContent = data.umum ?? '-';
                    }

                    if (prioritasElem) {
                        prioritasElem.textContent = data.prioritas ?? '-';
                    }

                    sisaUmum.textContent = data.sisaUmum ?? '0';
                    sisaPrioritas.textContent = data.sisaPrioritas ?? '0';
                })
                .catch(err => {
                    console.error('Gagal update data : ', err);
                })
        }

        document.addEventListener('DOMContentLoaded', () => {
            updateMonitorAntrian();
            setInterval(updateMonitorAntrian, 5000);
        })
    </script>
@endsection
