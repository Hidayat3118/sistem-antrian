<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{-- tailwind config --}}
    @vite('resources/css/app.css')

</head>
<body>

    @include('komponen.header')

    <div>
        <h3 class="flex justify-end p-8 font-semibold text-xl">Senin, 14 Oktober 2024 - 08:30</h3>
        <div class="text-center mt-24">
            <h1 class="text-5xl font-bold mt-14">Selamat Datang</h1>
            <h2 class="text-4xl font-semibold mt-6">Silahkan Pilih Jenis Antrian :</h2>
        </div>
    </div>

    <div class="flex gap-24 mt-20 justify-center">
        <button
            class="text-4xl font-semibold text-white bg-green-600 hover:bg-green-700 py-5 px-14 rounded-xl flex items-center justify-center h-20 transform transition-transform duration-300 hover:scale-110">UMUM</button>

        <div>
            <button
                class="text-4xl font-semibold text-white bg-red-400 hover:bg-red-500 py-5 px-14 rounded-xl flex items-center justify-center h-20 transform transition-transform duration-300 hover:scale-110">PRIORITAS</button>
            <p class="p-2 mt-4">-Usia di atas 65 tahun</p>
            <p class="p-2">-ada riwayat penyakit</p>
            <p class="p-2">-Hampir mati </p>

        </div>

    </div>

</body>
</html>