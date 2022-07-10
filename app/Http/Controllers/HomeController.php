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
        $this->_updateStatusMember();

        return view('home.index', [
            'memberMasaTenggang' => Member::tenggang()->get()->count(),
            'memberAktif' => Member::tipe('tetap')->count(),
            'memberTerdaftar' => Member::all()->count(),
            'memberHarian' => Member::tipe('harian')->count(),
        ]);
    }

    private function _updateStatusMember()
    {
        $members = Member::tenggang()->get();
        foreach ($members as $key => $member) {
            $member->update(['status' => 3]);
        }
    }
}
