<?php

namespace App\Http\Controllers;

use App\Models\Rekap;
use Illuminate\Http\Request;

class rekapController extends Controller
{
    public function index(Request $request)
    {
        $tanggal = $request->input('tanggal');
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        $rekaps = Rekap::when($tanggal, function ($query) use ($tanggal) {
            // DIUBAH: Menggunakan kolom 'tanggal'
            $query->whereDay('tanggal', $tanggal);
        })
            ->when($bulan, function ($query) use ($bulan) {
                // DIUBAH: Menggunakan kolom 'tanggal'
                $query->whereMonth('tanggal', $bulan);
            })
            ->when($tahun, function ($query) use ($tahun) {
                // DIUBAH: Menggunakan kolom 'tanggal'
                $query->whereYear('tanggal', $tahun);
            })
            ->orderBy('tanggal', 'desc')
            ->paginate(8);

        return view('admin/rekap', [
            'rekaps' => $rekaps,
            'title' => 'Admin | Rekap',
            'active' => 'rekap',
        ]);
    }
}
