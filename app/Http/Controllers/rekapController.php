<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class rekapController extends Controller
{
    public function index(){
        return view('admin/rekap');
    }
}
