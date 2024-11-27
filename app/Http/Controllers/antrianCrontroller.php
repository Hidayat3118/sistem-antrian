<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Antrian;

class antrianCrontroller extends Controller
{
    //

    public function makeAntrian(){
        $date = Carbon::now()->translatedFormat('l, d F Y');
        $time = Carbon::now()->translatedFormat('H:i');

        $lastQueue = Antrian::latest('id')->first();

        if($lastQueue){

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

    public function simpanAntrian(Request $request){
        $validateData = $request->validate([
                'nomor_antrian' => 'required',
        ]);
    }
}
