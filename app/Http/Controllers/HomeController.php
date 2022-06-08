<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // $masa = 3;
        // $masaTenggang = date("Y-m-d", strtotime("+$masa day", strtotime(date('Y-m-d'))));
        // $members = Member::select('nama')->where('masa_tenggang', '<=', $masaTenggang)->get();
        // dd($masaTenggang);

        return view('home.index', [
            'memberMasaTenggang' => Member::tenggang()->get()->count(),
            'memberAktif' => Member::tipe('tetap')->count(),
            'memberTerdaftar' => Member::all()->count(),
            'memberHarian' => Member::tipe('harian')->count(),
        ]);
    }
}
