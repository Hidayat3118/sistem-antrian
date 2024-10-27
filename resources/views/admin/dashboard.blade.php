@extends('komponen.app')

@section('content')
    @include('komponen.header')

    <main class="flex gap-12 justify-center mt-40">

      {{-- Kotak Pertama --}}
      <div class="bg-white w-[500px] rounded-2xl h-80 flex p-10 shadow-lg transition-transform duration-300 hover:shadow-2xl hover:scale-105 border border-gray-200 font-bold">
        <div class="flex justify-center mx-auto">
          <span class="flex items-center justify-center">
              <i class="fa-solid fa-microphone text-[60px] bg-green-500 text-white py-8 px-10 rounded-full shadow-lg"></i>
          </span>
  
          <div class="flex flex-col justify-center ml-6">
              <h1 class="text-3xl font-bold text-gray-800 text-center ">Panggil Antrian</h1>
              <div class="flex mt-8 gap-4">
                  <button
                      class="bg-green-500 text-white rounded-md py-3 flex-1 hover:bg-green-600 transition duration-200 transform hover:scale-105">Loket 1</button>
                  <button
                      class="bg-green-500 text-white rounded-md py-3 flex-1 hover:bg-green-600 transition duration-200 transform hover:scale-105">Loket 2</button>
              </div>
          </div>
        </div>
      </div>
  
      {{-- Kotak Kedua --}}
      <div class="bg-white w-[500px] rounded-2xl h-80 flex p-10 shadow-lg transition-transform duration-300 hover:shadow-2xl hover:scale-105 border border-gray-200 font-bold">
        <div class="flex justify-center mx-auto">
        
          <span class="flex items-center justify-center ">
              <i class="fa-solid fa-tv text-[60px] bg-blue-500 text-white p-6 rounded-full shadow-lg py-8 px-6"></i>
          </span>
  
          <div class="flex flex-col justify-center ml-6">
              <h1 class="text-3xl font-bold text-gray-800 text-center">Monitor Antrian</h1>
              <div class="flex mt-8 justify-end">
                  <button
                      class="bg-blue-500 text-white rounded-md py-3 px-6 flex items-center hover:bg-blue-600 transition duration-200 transform hover:scale-105">
                      Tampilan
                      <i class="fa-solid fa-arrow-right ml-2"></i>
                  </button>
              </div>
          </div>
        </div>
      </div>
  
  </main>
  
  
  
  


@endsection
