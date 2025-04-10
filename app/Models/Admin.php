<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admins';
    
    protected $fillable = [
        'nama',
        'username',
        'password',
    ];

    public function antrian(){
        return $this->hasMany(Antrian::class);
    }
}
