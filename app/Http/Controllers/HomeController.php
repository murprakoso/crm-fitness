<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // $masa = 3;
        // $masaTenggang = date("Y-m-d", strtotime("+$masa day", strtotime(date('Y-m-d'))));
        // $members = Member::select('nama')->where('masa_tenggang', '<=', $masaTenggang)->get();

        return view('home.index', [
            'memberMasaTenggang' => Member::status(3)->count(),
            'memberMasaTenggangList' => Member::status(3)->paginate(5),
            'statuses' => Member::statuses(),
            'memberAktif' => Member::tipe('tetap')->count(),
            'memberTerdaftar' => Member::all()->count(),
            'memberHarian' => Member::tipe('harian')->count(),
        ]);
    }
}
