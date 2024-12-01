<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Antrian;

class antrianCrontroller extends Controller
{
    //

    public function makeAntrianUmum()
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

        $newQueueNumber = 'B' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

        return view('user.antrianUmum', [
            'antrian' => $newQueueNumber,
            'tanggal' => $date,
            'waktu' => $time,
        ]);
    }

    public function makeAntrianPrioritas()
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

        return view('user.antrianPrioritas', [
            'antrian' => $newQueueNumber,
            'tanggal' => $date,
            'waktu' => $time,
        ]);
    }

    public function simpanAntrian(Request $request)
    {

        $validateData = $request->validate([
            'nomor_antrian' => 'required',
            'no_telp' => 'required|numeric',
            'tanggal' => 'required',
            'waktu' => 'required',
            'isPriority' => 'required',
        ]);

        Antrian::create($validateData);

        $redirectRoute = $validateData['isPriority'] ? '/antrianPrioritas' : '/antrianUmum';

        return redirect($redirectRoute)->with('succes', 'Antrian telah dibuat');
    }

    public function loketUmum()
    {

        $antrian = Antrian::where('status', 'inComplete')
            ->where('isPriority', false)
            ->first();

        return view('admin.loketSatu', [
            'antrian' => $antrian,
        ]);
    }

    public function loketPrioritas()
    {
        $antrian = Antrian::where('status', 'inComplete')
            ->where('isPriority', true)
            ->first();

        return view('admin.loketDua', [
            'antrian' => $antrian,
        ]);
    }



    public function selesai(Antrian $antrian)
    {
        $antrian->status = 'completed';
        $antrian->save();

        return back()->with('succes', 'antrian selesai');
    }

    public function terlewat(Antrian $antrian){
        $antrian->status = 'unserved';
        $antrian->save();

        return back()->with('succes', 'antrian terlewat');
    }
}
