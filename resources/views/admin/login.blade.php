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
<body class="bg-gray-200">

    @include('komponen.header')

    <div class="bg-white rounded-lg shadow-lg p-8 w-[400px] mx-auto mt-32">
        <div class="flex items-center justify-center mb-4">
            <div class="w-16 h-16 rounded-full bg-blue-200 flex items-center justify-center">
                <span class="text-3xl text-blue-500"><img src="../img/medis.png" alt=""></span> <!-- User Icon -->
            </div>
        </div>
        <form>
            <div class="mb-5">
                
                <div class="relative">
                    <input type="email" placeholder="Email ID" class="border border-gray-300 rounded-md py-2 px-10 w-full focus:outline-none focus:border-blue-500" required>
                    <span class="absolute left-3 top-2 text-gray-400"><i class="fa-solid fa-user"></i></span> <!-- Email Icon -->
                </div>
            </div>
            <div class="mb-5">
                <div class="relative">
                    <input type="password" placeholder="Password" class="border border-gray-300 rounded-md py-2 px-10 w-full focus:outline-none focus:border-blue-500" required>
                    <span class="absolute left-3 top-2 text-gray-400"><i class="fa-solid fa-lock"></i></span> <!-- Lock Icon -->
                </div>
            </div>
            <div class="flex items-center justify-between mb-5">
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox text-blue-500">
                    <span class="ml-2">Remember me</span>
                </label>
                <a href="#" class="text-blue-500 text-sm">Forgot Password?</a>
            </div>
            <button class="bg-blue-500 text-white rounded-md py-2 w-full hover:bg-blue-600">LOGIN</button>
        </form>
    </div>


</body>
</html>