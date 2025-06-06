<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    // Menampilkan halaman upload
    public function index()
    {
        $videos = Video::orderBy('created_at', 'desc')->paginate(3); // Benar
        return view('video.upload', compact('videos'), [
            'active' => 'upload',
            'title' => 'Admin | Upload Video']);
    }



    // Menyimpan video
    public function store(Request $request)
    {
        $request->validate([
            'video' => 'required|mimes:mp4,mov,avi,wmv|max:150000'
        ]);

        $file = $request->file('video');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('videos', $fileName, 'public');

        Video::create([
            'file_name' => $fileName,
            'file_path' => $filePath
        ]);

        return redirect()->route('video.index')->with('success', 'Video berhasil diunggah!');
    }

    // Memilih video untuk ditampilkan di monitor
    public function select($id)
    {
        Video::where('is_selected', true)->update(['is_selected' => false]); // Reset semua video
        Video::where('id', $id)->update(['is_selected' => true]); // Tandai video yang dipilih

        return redirect()->route('video.index')->with('success', 'Video berhasil dipilih!');
    }

    // Menampilkan halaman monitor dengan video yang dipilih
    public function monitor()
    {
        $video = Video::where('is_selected', true)->first();

        // INi yang ku ubah
        return view('video.monitor', compact('video'), [
            'active' => 'monitor',
            'title' => 'Admin | Monitor',
        ]);
    }

    public function monitorData(){
        $umum = Antrian::orderBy('created_at', 'asc')
        ->where('status', 'onProcess')
        ->where('loket', 1)
        ->first();

        $sisaUmum = Antrian::where('isPriority', false)
            ->where('status', 'inComplete')
            ->count();

        $prioritas = Antrian::orderBy('created_at', 'asc')
        ->where('status', 'onProcess')
        ->where('loket', 2)
        ->first();

        $sisaPriotitas = Antrian::where('isPriority', true)
        ->where('status', 'inComplete')
        ->count();

        return response()->json([
            'umum' => $umum ? $umum->nomor_antrian : null,
            'prioritas' => $prioritas ? $prioritas->nomor_antrian : null,
            'sisaUmum' => $sisaUmum, 
            'sisaPrioritas' => $sisaPriotitas,
        ]);
    }

    public function delete($id)
    {
        $video = Video::find($id);
        $video->delete();
        return redirect()->route('video.index');
    }
}

