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

    <fieldset class=" mt-32 bg-gray-200">
    <div class="text-center">
        <h1 class="text-5xl font-semibold">Selamat Datang</h1>
        <h2 class="text-3xl font-semibold mt-6">Login</h2>

    <div class="mt-6">
    
        <input type="text" id="username" placeholder="Username" class="border-2 border-black h-12 w-96 rounded-lg my-8"> <br>

        <input type="text" id="username" placeholder="Username" class="border-2 border-black h-12 w-96 rounded-lg">
    </div>

    <div class="bg-red-500">
    <button class="text-2xl font-semibold text-white bg-blue-400 hover:bg-blue-500 py-4 px-10 rounded-xl flex  justify-center h-16 transform transition-transform duration-300 hover:scale-110 mt-14 ">Sign In</button>
</div>

    </fieldset>
    </div>


</body>
</html>