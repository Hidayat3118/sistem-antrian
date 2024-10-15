<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{-- tailwind config --}}
    @vite('resources/css/app.css')

    {{-- Cdn Font Awesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>
<body class="">

    @include('komponen.header')

   <div class="flex gap-12 justify-center mt-44">

    {{-- Kotak Pertama --}}
    <div class="bg-green-500 w-[500px] rounded-xl h-72 flex p-10">
        
      <span class=""><i class="fa-solid fa-microphone text-[100px] bg-white px-12 py-10 rounded-full"></i></span>

      <div>
      <h1 class="text-4xl font-bold text-white text-center">Pemanggilan Antrian</h1>
      <div class="flex mt-16 gap-6">
        <button class="bg-blue-500 text-white rounded-md py-2 w-full hover:bg-blue-600">Loket 1</button>
        <button class="bg-blue-500 text-white rounded-md py-2 w-full hover:bg-blue-600">Loket 1</button>
    </div>
      </div>
    </div>


    {{-- Kotak Kedua --}}
    <div class="bg-green-500 w-[500px] rounded-xl h-72 flex p-10">
        
        <span class=""><i class="fa-solid fa-tv text-[100px] bg-white p-10 rounded-full"></i></span>
  
        <div>
        <h1 class="text-4xl font-bold text-white text-center">Monitor Antrian</h1>
        <div class="flex mt-16 gap-6  justify-end">
          <button class="bg-blue-500 text-white rounded-md py-2 w-44 hover:bg-blue-600 ">Tampilan <i class="fa-solid fa-arrow-right ml-10"></i></button>
          
      </div>
        </div>
      </div>

   </div>


</body>
</html>