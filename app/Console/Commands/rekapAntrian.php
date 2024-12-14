<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Antrian;
use App\Models\Rekap;
use Carbon\Carbon;

class rekapAntrian extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rekap:antrian';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rekap jumlah antrian harian dan menghapus data lama';

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $jumblahAntrianUmum = Antrian::whereDate('created_at', Carbon::today())
            ->where('isPriority', false)
            ->count();

        $jumblahAntrianPrioritas = Antrian::whereDate('created_at', Carbon::today())
            ->where('isPriority', true)
            ->count();

        $jumblahAntrianTdkDilayani = Antrian::whereDate('created_at', Carbon::today())
            ->where('status', 'unserved')
            ->get();

        Rekap::create([
            'tanggal' => Carbon::today(),
            'jmlh_umum' => $jumblahAntrianUmum,
            'jmlh_prioritas' => $jumblahAntrianPrioritas,
            'tdk_dilayani' => $jumblahAntrianTdkDilayani,
        ]);

        Antrian::whereDate('created_at', Carbon::today())->delete();

        $this->info('Rekap antrian berhasil dibuat dan antrian dihapus');
    }
}
