<?php

namespace App\Http\Controllers;

use App\Models\Rekap;
use Illuminate\Http\Request;

class rekapController extends Controller
{
    public function index(Request $request){

        $tanggal = $request->input('tanggal');
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        $rekaps = Rekap::when($tanggal, function($query) use ($tanggal){
            $query->whereDay('created_at', $tanggal);
        })
        ->when($bulan, function($query) use ($bulan){
            $query->whereMonth('created_at', $bulan);
        })
        ->when($tahun, function($query) use ($tahun){
            $query->whereYear('created_at', $tahun);
        })
        ->get();

        return view('admin/rekap', [
            'rekaps' => $rekaps,
            'title' => 'Admin | Rekap',
        ]);
    }
}
