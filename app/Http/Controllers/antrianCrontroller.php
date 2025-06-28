<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Antrian;
use Illuminate\Support\Facades\Auth;

class antrianCrontroller extends Controller
{
    /**
     * Fungsi publik untuk menampilkan halaman antrian UMUM.
     */
    public function makeAntrianUmum($cluster)
    {
        // Panggil helper untuk membuat nomor baru (false = tidak prioritas)
        $newQueueNumber = $this->generateNewQueueNumber(false);

        // Hitung sisa antrian HARI INI yang belum selesai
        $sisaAntrian = Antrian::whereDate('created_at', Carbon::today())
            ->where('isPriority', false)
            ->whereIn('status', ['inComplete', 'unserved', 'waiting'])
            ->count();

        return $this->prepareAntrianView($cluster, $newQueueNumber, $sisaAntrian, 'Umum', false);
    }

    /**
     * Fungsi publik untuk menampilkan halaman antrian PRIORITAS.
     */
    public function makeAntrianPrioritas($cluster)
    {
        // Panggil helper untuk membuat nomor baru (true = prioritas)
        $newQueueNumber = $this->generateNewQueueNumber(true);

        // Hitung sisa antrian HARI INI yang belum selesai
        $sisaAntrian = Antrian::whereDate('created_at', Carbon::today())
            ->where('isPriority', true)
            ->whereIn('status', ['inComplete', 'unserved', 'waiting'])
            ->count();

        return $this->prepareAntrianView($cluster, $newQueueNumber, $sisaAntrian, 'Prioritas', true);
    }


    private function generateNewQueueNumber(bool $isPriority): string
    {
        // 1. Tentukan Prefix: 'A' untuk Prioritas, 'B' untuk Umum/Biasa
        $prefix = $isPriority ? 'A' : 'B';

        // 2. Kueri yang BENAR: Cari antrian terakhir HARI INI untuk TIPE yang sama
        $lastQueue = Antrian::whereDate('created_at', Carbon::today()) // <-- KUNCI RESET HARIAN
            ->where('isPriority', $isPriority)     // <-- HANYA membedakan prioritas
            ->latest('id')
            ->first();

        // 3. Hitung nomor berikutnya
        $newNumber = 1; // Default nomor adalah 1
        if ($lastQueue) {
            // Ambil bagian angka dari nomor antrian terakhir (misal: dari 'A005' ambil '005')
            $lastNumberPart = substr($lastQueue->nomor_antrian, 1);
            $newNumber = (int) $lastNumberPart + 1;
        }

        // 4. Format nomor antrian baru dengan gabungkan prefix dan padding nol
        return $prefix . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
    }

    private function prepareAntrianView($cluster, $newQueueNumber, $sisaAntrian, $tipeTitle, $isPriority)
    {
        $clusterTeks = [
            'anak' => 'Poli Anak',
            'ortu' => 'Poli Umum',
            'gigi' => 'Poli Gigi'
        ];

        return view($isPriority ? 'user.antrianPrioritas' : 'user.antrianUmum', [
            'antrian' => $newQueueNumber,
            'tanggal' => Carbon::now()->translatedFormat('l, d F Y'),
            'waktu' => Carbon::now()->translatedFormat('H:i'),
            'sisaAntrian' => $sisaAntrian,
            'title' => 'Puskesmas | Antrian ' . $tipeTitle,
            'cluster' => $cluster,
            'clusterNama' => $clusterTeks[$cluster],
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
        return view('admin.loketSatu', [
            'title' => 'Admin | Loket Umum',
            'active' => 'umum',
        ]);
    }

    public function loketPrioritas()
    {
        return view('admin.loketDua', [
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
            if ($antrian) {
                $antrian->status = 'onProcess';
                $antrian->loket = 2;
                $antrian->update();
            }
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
            if ($antrian) {
                $antrian->status = 'onProcess';
                $antrian->loket = 2;
                $antrian->update();
            }
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

            if ($antrian) {
                $antrian->status = 'onProcess';
                $antrian->loket = 1;
                $antrian->update();
            }
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

            if ($antrian) {
                $antrian->status = 'onProcess';
                $antrian->loket = 1;
                $antrian->update();
            }
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
