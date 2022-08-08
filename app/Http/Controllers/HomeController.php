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

        // $pendaftaranMembers = Member::select(
        //     DB::raw('count(id) as `data`'),
        //     DB::raw("DATE_FORMAT(created_at, '%m-%Y') new_date"),
        //     DB::raw('YEAR(created_at) year, MONTH(created_at) month')
        // )
        //     ->groupBy('year', 'month')
        //     ->get();


        /**
         * Bar Chart: pendaftaran member
         */
        $month = $this->_dates('keyMonths'); // array key months
        $dataMembers = [];
        foreach ($month as $key => $value) {
            $yearMonth =  date('Y') . '-' . $value;
            $dataMembers[] = Member::where(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"), $yearMonth)->count();
        }
        $labelMonth =  $this->_dates('labelMonths'); // array value label months


        /**
         * Pie Chart: member berdasarkan job
         */
        $labelJobs = ['Mahasiswa', 'IRT', 'Lain-lain'];
        $memberJobs = [];
        foreach ($labelJobs as $key => $value) {
            $month =  date('m');
            $memberJobs[] = Member::where(function ($query) use ($value) {
                if ($value == 'Lain-lain') {
                    $query->whereNotIn('job', ['Mahasiswa', 'IRT']);
                } else {
                    $query->where('job', $value);
                }
            })
                ->where(DB::raw("DATE_FORMAT(created_at, '%m')"), $month)
                ->count();
        }

        /**
         * Pie Chart: member berdasarkan gender
         */
        $labelGenders = ['Pria', 'Wanita'];
        $memberGenders = [];
        foreach ($labelGenders as $key => $value) {
            $month =  date('m');
            $memberGenders[] = Member::gender($value)->where(DB::raw("DATE_FORMAT(created_at, '%m')"), $month)->count();
        }

        //
        $memberMasaTenggang = Member::status(3);
        // return data to view
        return view('home.index', [
            'memberMasaTenggang'     => $memberMasaTenggang->count(),
            'memberMasaTenggangList' => $memberMasaTenggang->paginate(5),
            'memberTidakAktif'       => Member::status(2)->count(),
            'statuses'               => Member::statuses(),
            'memberAktif'            => Member::status(1)->tipe('tetap')->count(),
            'memberTerdaftar'        => Member::all()->count(),
            'memberHarian'           => Member::tipe('harian')->count(),
            'labelMonth'             => json_encode($labelMonth, JSON_NUMERIC_CHECK),
            'dataMembers'            => json_encode($dataMembers, JSON_NUMERIC_CHECK),
            'labelJobs'              => json_encode($labelJobs, JSON_NUMERIC_CHECK),
            'dataMemberJobs'         => json_encode($memberJobs, JSON_NUMERIC_CHECK),
            'labelGenders'           => json_encode($labelGenders, JSON_NUMERIC_CHECK),
            'dataMemberGenders'      => json_encode($memberGenders, JSON_NUMERIC_CHECK),
        ]);
    }


    private function _dates($key = [])
    {
        # looping awal bulan sampai bulan saat ini
        $data = [];

        $start = (int) date('01');
        $end = (int) date('m');

        for ($i = $start; $i <= $end; $i++) {
            $bln = ($i < 10) ? "0$i" : "$i";

            $data['keyMonths'][] = $bln;
            $data['labelMonths'][] = fn_bulan($bln);
        }

        if ($key) {
            return $data[$key];
        }

        return $data;
    }
}
