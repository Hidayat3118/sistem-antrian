<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'no_telp',
        'nomor_antrian',
        'tanggal',
        'waktu',
        'catatan',
        'isPriority',
        'cluster',
        'status',
    ];

    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
