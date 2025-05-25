<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Antrian;
use Illuminate\Support\Facades\Auth;

class antrianCrontroller extends Controller
{
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
            'anak' => 'Cluster 2',
            'ortu' => 'Cluster 3',
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
            'cluster' => $cluster,
            'clusterNama' => $clusterNama,
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
            'anak' => 'Cluster 2',
            'ortu' => 'Cluster 3',
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
            'cluster' => $cluster,
            'clusterNama' => $clusterNama,
        ]);
    }

    public function simpanAntrian(Request $request)
    {
        $validateData = $request->validate([
            'nomor_antrian' => 'required',
            'no_telp' => 'nullable|numeric',
            'tanggal' => 'required',
            'waktu' => 'required',
            'cluster' => 'required',
            'catatan' => 'nullable',
            'isPriority' => 'required',
        ]);


        Antrian::create($validateData);



        return redirect('/')->with('succes', 'Antrian telah dibuat');
    }

    public function loketUmum()
    {
        $antrian = Antrian::where('status', 'onProcess')
            ->where('isPriority', false)
            ->where('loket', 1)
            ->first();

        if (!$antrian) {
            $antrian = Antrian::where('status', 'inComplete')
                ->where('isPriority', false)
                ->first();

            $antrian->status = 'onProcess';
            $antrian->loket = 1;
            $antrian->update();
        }

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
        $antrian = Antrian::where('status', 'onProcess')
            ->where('isPriority', true)
            ->where('loket', 2)
            ->first();

        if ($antrian) {
            $antrian = Antrian::where('status', 'inComplete')
                ->where('isPriority', true)
                ->first();


            $antrian->status = 'onProcess';
            $antrian->loket = 2;
            $antrian->update();
        }

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

    public function getTerbaruPrioritas()
    {
        $antrian = Antrian::orderBy('created_at', 'asc')
            ->where('status', 'onProcess')
            ->where('isPriority', true)
            ->where('loket', 2)
            ->first();

        if (!$antrian) {
            $antrian = Antrian::orderBy('created_at', 'asc')
                ->where('status', 'inComplete')
                ->where('isPriority', true)
                ->first();
            $antrian->status = 'onProcess';
            $antrian->loket = 2;
            $antrian->update();
        }
        if (!$antrian) {
            $antrian = Antrian::orderBy('created_at', 'asc')
                ->where('status', 'onProcess')
                ->where('isPriority', false)
                ->where('loket', 2)
                ->first();
        }

        if (!$antrian) {
            $antrian = Antrian::orderBy('created_at', 'asc')
                ->where('status', 'inComplete')
                ->where('isPriority', false)
                ->first();
            $antrian->status = 'onProcess';
            $antrian->loket = 2;
            $antrian->update();
        }

        $sisa = Antrian::where('isPriority', true)
            ->where('status', 'inComplete')
            ->count();

        return response()->json([
            'antrian' => $antrian,
            'sisaAntrian' => $sisa,
        ]);
    }

    public function getTerbaruUmum()
    {
        $antrian = Antrian::orderBy('created_at', 'asc')
            ->where('status', 'onProcess')
            ->where('isPriority', false)
            ->where('loket', 1)
            ->first();

        if (!$antrian) {
            $antrian = Antrian::orderBy('created_at', 'asc')
                ->where('status', 'inComplete')
                ->where('isPriority', false)
                ->first();
            $antrian->status = 'onProcess';
            $antrian->loket = 1;
            $antrian->update();
        }

        if (!$antrian) {
            $antrian = Antrian::orderBy('created_at', 'asc')
                ->where('status', 'onProcess')
                ->where('isPriority', true)
                ->where('loket', 1)
                ->first();
        }



        if (!$antrian) {
            $antrian = Antrian::orderBy('created_at', 'asc')
                ->where('status', 'inComplete')
                ->where('isPriority', true)
                ->first();
            $antrian->status = 'onProcess';
            $antrian->loket = 1;
            $antrian->update();
        }

        $sisa = Antrian::where('isPriority', false)
            ->where('status', 'inComplete')
            ->count();

        return response()->json([
            'antrian' => $antrian,
            'sisaAntrian' => $sisa,
        ]);
    }

    public function selesai(Antrian $antrian)
    {
        $antrian->status = 'completed';
        $antrian->admin_id = Auth::guard('admin')->user()->id;
        $antrian->save();

        $panggil = Antrian::where('id', $antrian->id + 2)
            ->first();

        if (!empty($panggil->no_telp)) {
            $this->kirimNotif($panggil->no_telp, 'Antrian anda sudah dekat, silahkan menuju loket');
        }

        return back()->with('succes', 'antrian selesai');
    }

    public function terlewat(Antrian $antrian)
    {
        $antrian->status = 'unserved';
        $antrian->admin_id = Auth::guard('admin')->user()->id;
        $antrian->save();

        $panggil = Antrian::where('id', $antrian->id + 2)
            ->first();

        if (!empty($panggil->no_telp)) {
            $this->kirimNotif($panggil->no_telp, 'Antrian anda sudah dekat, silahkan menuju loket');
        }

        return back()->with('succes', 'antrian terlewat');
    }

    public function monitor()
    {
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

    public function cluster($jenis)
    {
        return view('user.claster', [
            'title' => 'Puskesmas | Cluster',
            'jenis' => $jenis,
        ]);
    }

    public function kirimNotif($nomor, $pesan)
    {
        $token = 'Gd3FBw9M5DQ6ZfPCSSGh';

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.fonnte.com/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => [
                'target' => $nomor,
                'message' => $pesan,
            ],

            CURLOPT_HTTPHEADER => [
                'Authorization: ' . $token,
            ],
        ]);

        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }
}
