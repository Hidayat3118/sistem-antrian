<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antrian;

class antrianCrontroller extends Controller
{
    //

    public function makeAntrian(){
        $last = Antrian::latest('id_antrian')->first();

        dd($last);
    }
}
