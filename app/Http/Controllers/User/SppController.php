<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Spp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SppController extends Controller
{
    public function data()
    {
        $spp = Spp::with('student')->where('nik_murid', Auth::user()->nik_murid)->get();

       return view('user.Spp', [
           'spp' => $spp
       ]);
    }
}
