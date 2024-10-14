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
            <h2 class="text-5xl font-bold mt-14">No Antrian Anda</h2>
            <h1 class="text-6xl font-semibold mt-6">A009</h1>
            <h5 class="mt-6 text-2xl font-semibold">Sisa Antrian 5</h5>
            <h6 class="mt-6">No Antrian berlaku sesuai tanggal yang diterbitkan</h6>
        </div>
    </div>

    <div class="flex mt-16 justify-center">
        <button
            class="text-4xl font-semibold text-white bg-green-600 hover:bg-green-700 py-5 px-14 rounded-xl flex items-center justify-center h-20 transform transition-transform duration-300 hover:scale-110">CETAK</button>
    </div>

</body>
</html>