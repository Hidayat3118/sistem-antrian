<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Antrian;

class antrianCrontroller extends Controller
{
    //

    public function makeAntrianUmum($cluster)
    {
        $date = Carbon::now()->translatedFormat('l, d F Y');
        $time = Carbon::now()->translatedFormat('H:i');

        $lastQueue = Antrian::where('isPriority', false)->latest('id')->first();

        if ($lastQueue) {
            $lastNumber = (int) substr($lastQueue->nomor_antrian, 1);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        $clusterTeks = [
            'anak' => 'Anak-anak',
            'ortu' => 'Orang tua',
            'gigi' => 'Gigi'
        ];

        $clusterNama = $clusterTeks[$cluster];

        $newQueueNumber = 'B' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
        $sisaAntrian = Antrian::where('isPriority', false)
            ->where('status', 'inComplete')
            ->count();

        return view('user.antrianUmum', [
            'antrian' => $newQueueNumber,
            'tanggal' => $date,
            'waktu' => $time,
            'sisaAntrian' => $sisaAntrian,
            'title' => 'Puskesmas | Antrian Umum',
            'cluster' => $clusterNama,
        ]);
    }

    public function makeAntrianPrioritas($cluster)
    {
        $date = Carbon::now()->translatedFormat('l, d F Y');
        $time = Carbon::now()->translatedFormat('H:i');

        $lastQueue = Antrian::where('isPriority', true)->latest('id')->first();

        if ($lastQueue) {
            $lastNumber = (int) substr($lastQueue->nomor_antrian, 1);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        $newQueueNumber = 'A' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

        $clusterTeks = [
            'anak' => 'Anak-anak',
            'ortu' => 'Orang tua',
            'gigi' => 'Gigi'
        ];

        $clusterNama = $clusterTeks[$cluster];
    
        $sisaAntrian = Antrian::where('isPriority', false)
            ->where('status', 'inComplete')
            ->count();

        return view('user.antrianPrioritas', [
            'antrian' => $newQueueNumber,
            'tanggal' => $date,
            'waktu' => $time,
            'sisaAntrian' => $sisaAntrian,
            'title' => 'Puskesmas | Antrian Prioritas',
            'cluster' => $clusterNama,
        ]);
    }

    public function simpanAntrian(Request $request)
    {

        $validateData = $request->validate([
            'nomor_antrian' => 'required',
            'no_telp' => 'nullable|numeric',
            'tanggal' => 'required',
            'waktu' => 'required',
            'isPriority' => 'required',
        ]);

        Antrian::create($validateData);

        

        return redirect('/')->with('succes', 'Antrian telah dibuat');
    }

    public function loketUmum()
    {

        $antrian = Antrian::where('status', 'inComplete')
            ->where('isPriority', false)
            ->first();

        $sisaAntrian = Antrian::where('isPriority', false)
            ->where('status', 'inComplete')
            ->count();

        return view('admin.loketSatu', [
            'antrian' => $antrian,
            'sisaAntrian' => $sisaAntrian,
            'title' => 'Admin | Loket Umum',
            'active' => 'umum',
        ]);
    }

    public function loketPrioritas()
    {
        $antrian = Antrian::where('status', 'inComplete')
            ->where('isPriority', true)
            ->first();

        $sisaAntrian = Antrian::where('isPriority', true)
            ->where('status', 'inComplete')
            ->count();

        return view('admin.loketDua', [
            'antrian' => $antrian,
            'sisaAntrian' => $sisaAntrian,
            'title' => 'Admin | Loket Prioritas',
            'active' => 'prioritas',
        ]);
    }



    public function selesai(Antrian $antrian)
    {
        $antrian->status = 'completed';
        $antrian->save();

        return back()->with('succes', 'antrian selesai');
    }

    public function terlewat(Antrian $antrian)
    {
        $antrian->status = 'unserved';
        $antrian->save();

        return back()->with('succes', 'antrian terlewat');
    }

    public function monitor(){
        $sisaAntrianUmum = Antrian::where('isPriority', false)
        ->where('status', 'inComplete')
        ->count();

        $sisaAntrianPrioritas = Antrian::where('isPriority', true)
        ->where('status', 'inComplete')
        ->count();

        return view('user.monitor', [
            'sisaUmum' => $sisaAntrianUmum,
            'sisaPrioritas' => $sisaAntrianPrioritas,
            'title' => 'Puskesmas | Monitor',
        ]);
    }

    public function cluster($jenis){
        return view('user.claster', [
            'title' => 'Cluster',
            'jenis' => $jenis,
        ]);
    }
}
