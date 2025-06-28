<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Antrian;
use App\Models\Rekap;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
    protected $description = 'Merekap data antrian harian ke dalam tabel rekap dan membersihkan data antrian yang sudah lama.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Memulai proses rekapitulasi antrian harian...');

        $tanggalHariIni = Carbon::today();

        try {
            // Menggunakan DB Transaction untuk memastikan semua operasi berhasil atau tidak sama sekali (Atomicity)
            DB::transaction(function () use ($tanggalHariIni) {

                // 1. Ambil semua data hari ini dengan SATU query untuk efisiensi
                $semuaAntrianHariIni = Antrian::whereDate('created_at', $tanggalHariIni)->get();

                // Jika tidak ada antrian sama sekali, hentikan proses lebih awal.
                if ($semuaAntrianHariIni->isEmpty()) {
                    $this->line('Tidak ada antrian untuk direkap pada tanggal: ' . $tanggalHariIni->toDateString());
                    return;
                }

                // 2. Hitung statistik dari hasil query (Collections), bukan query baru ke DB
                $jumblahAntrianUmum = $semuaAntrianHariIni->where('isPriority', false)->count();
                $jumblahAntrianPrioritas = $semuaAntrianHariIni->where('isPriority', true)->count();

                // Menghitung semua antrian yang belum selesai pada akhir hari sebagai 'tidak dilayani'
                // Anda bisa menyesuaikan logika status ini sesuai kebutuhan
                $jumblahAntrianTdkDilayani = $semuaAntrianHariIni
                    ->whereIn('status', ['unserved', 'inComplete', 'onProcess', 'waiting'])
                    ->count();

                // 3. Buat entri rekap baru
                Rekap::create([
                    'tanggal' => $tanggalHariIni,
                    'jmblh_umum' => $jumblahAntrianUmum,
                    'jmblh_prioritas' => $jumblahAntrianPrioritas,
                    'tdk_dilayani' => $jumblahAntrianTdkDilayani,
                ]);

                $this->info('Rekap antrian untuk tanggal ' . $tanggalHariIni->toDateString() . ' berhasil dibuat.');
                $this->comment('-> Jumlah Umum     : ' . $jumblahAntrianUmum);
                $this->comment('-> Jumlah Prioritas : ' . $jumblahAntrianPrioritas);
                $this->comment('-> Tidak Dilayani  : ' . $jumblahAntrianTdkDilayani);

                // 4. (PALING AMAN) Hapus data LAMA, yaitu data SEBELUM hari ini.
                // Ini memastikan antrian hari ini yang mungkin masih berjalan tidak akan terhapus.
                $jumlahDihapus = Antrian::whereDate('created_at', '<', $tanggalHariIni)->delete();

                if ($jumlahDihapus > 0) {
                    $this->info($jumlahDihapus . ' data antrian lama telah berhasil dihapus.');
                } else {
                    $this->line('Tidak ada data antrian lama untuk dihapus.');
                }

            });

            $this->info('Proses rekapitulasi selesai dengan sukses.');

        } catch (\Throwable $e) {
            // Jika terjadi error di dalam transaction, semua perubahan akan dibatalkan (rollback).
            $this->error('Terjadi kesalahan selama proses rekapitulasi: ' . $e->getMessage());
            // Catat error ke file log untuk diinvestigasi nanti
            Log::channel('daily')->error(
                'Gagal menjalankan rekap antrian: ' . $e->getMessage(),
                ['exception' => $e]
            );
            return 1; // Mengindikasikan command gagal
        }

        return 0; // Mengindikasikan command berhasil
    }
}