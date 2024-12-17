<?php

namespace App\Http\Controllers;

use App\Models\Rekap;
use Illuminate\Http\Request;

class rekapController extends Controller
{
    public function index(){
        return view('admin/rekap', [
            'rekaps' => Rekap::all(),
        ]);
    }
}
