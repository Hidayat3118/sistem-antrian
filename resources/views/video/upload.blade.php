@extends('komponen.app')

@section('content')
    <div class="flex">
        @include('komponen.sidebar')

        <main class="w-full flex flex-col ">
            @include('komponen.headerAdmin')

            <div class="mx-auto py-10 container">
              

               

                {{-- Form Upload --}}
                <div class="bg-white shadow-lg rounded-lg p-6 mb-8 border">
                    <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col items-center">
                        @csrf
                        <input type="file" name="video" required class="mb-4 p-2 border border-gray-300 rounded-lg w-full focus:ring-2 focus:ring-blue-400">
                        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition-all duration-300">
                            Upload Video
                        </button>
                    </form>
                </div>

                {{-- Daftar Video dengan Pagination --}}
                <h2 class="text-2xl font-semibold mb-6 text-gray-700 text-center">Daftar Video</h2>
                 {{-- Notifikasi sukses --}}
                 @if (session('success'))
                 <p class="text-green-600 text-center font-semibold">{{ session('success') }}</p>
             @endif

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    @foreach ($videos as $video)
                        <div class="bg-white shadow-md rounded-lg p-4 flex flex-col items-center border">
                            <div class="w-full h-64 flex justify-center items-center bg-gray-200 rounded-lg overflow-hidden">
                                <video class="w-full h-full object-cover" controls>
                                    <source src="{{ asset('storage/' . $video->file_path) }}" type="video/mp4">
                                    Browser Anda tidak mendukung pemutaran video.
                                </video>
                            </div>

                            <div class="mt-4 flex gap-3">
                                {{-- Tombol Pilih Video --}}
                                <form action="{{ route('video.select', $video->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">
                                        Pilih Video
                                    </button>
                                </form>

                                {{-- Tombol Hapus Video --}}
                                <form action="{{ route('video.delete', $video->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Pagination Links --}}
                <div class="mt-6 flex justify-center">
                    {{ $videos->links() }}
                </div>

                {{-- Link ke Monitor --}}
                <div class="mt-8 text-center">
                    <a href="{{ route('video.monitor') }}" class="text-blue-500 font-semibold hover:underline">Lihat Monitor</a>
                </div>
            </div>
        </main>
    </div>
@endsection