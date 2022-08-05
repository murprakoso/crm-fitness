<?php

use App\Models\Member;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;


/**
 * Set active menu
 */
if (!function_exists('set_active')) {
    function set_active($uri, $output = 'active')
    {
        if (is_array($uri)) {
            foreach ($uri as $u) {
                if (Route::is($u)) {
                    return $output;
                }
            }
        } else {
            if (Route::is($uri)) {
                return $output;
            }
        }
    }
}


/**
 * Format nomor hp 62
 * @param int $number
 */
if (!function_exists('phone_number')) {
    function phone_number($nohp)
    {
        if (substr($nohp, 0, 2) === "62") {
            return $nohp;
        }
        // kadang ada penulisan no hp 0811 239 345
        $nohp = str_replace(" ", "", $nohp);
        // kadang ada penulisan no hp (0274) 778787
        $nohp = str_replace("(", "", $nohp);
        // kadang ada penulisan no hp (0274) 778787
        $nohp = str_replace(")", "", $nohp);
        // kadang ada penulisan no hp 0811.239.345
        $nohp = str_replace(".", "", $nohp);

        // cek apakah no hp mengandung karakter + dan 0-9
        if (!preg_match('/[^+0-9]/', trim($nohp))) {
            // cek apakah no hp karakter 1-3 adalah 62
            if (substr(trim($nohp), 0, 3) == '62') {
                $hp = trim($nohp);
            }
            // cek apakah no hp karakter 1 adalah 0
            elseif (substr(trim($nohp), 0, 1) == '0') {
                $hp = '62' . substr(trim($nohp), 1);
            }
        }
        return $hp;
    }
}


/**
 * Format Rupiah
 * Fungsi menampilkan format rupiah
 */
if (!function_exists('rupiah')) {
    function rupiah($angka)
    {
        $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
        return $hasil_rupiah;
    }
}

/** Menampilkan tanggal format indonesia */
if (!function_exists('date_id')) {
    function date_id($timestamp, $format = 'D MMMM, YYYY')
    {
        return Carbon::parse($timestamp)->isoFormat($format);
    }
}

/** Menampilkan jam format indonesia */
if (!function_exists('time_id')) {
    function time_id($timestamp, $format = 'h:i a')
    {
        return Carbon::parse($timestamp)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format($format);
    }
}


/**
 * Update Status member
 */
if (!function_exists('update_status_member')) {
    function update_status_member()
    {
        // echo 'running';
        // die;
        $members = Member::all();
        foreach ($members as $key => $member) {
            $member->update(['status' => status_member_by_date($member->masa_tenggang)]);
        }
    }
}

if (!function_exists('status_member_by_date')) {
    function status_member_by_date($expireDate)
    {
        $tenggang = date("Y-m-d", strtotime("-2 day", strtotime(date('Y-m-d'))));
        $currDate = date('Y-m-d');

        // tidak aktif karena melewati masa tenggang
        if (($expireDate < $currDate) && ($expireDate <= $tenggang)) {
            return 2;
        }
        // berada dalam masa tenggang 3 hari
        elseif (($expireDate <= $currDate) && ($expireDate > $tenggang)) {
            return 3;
        }
        return 1;
    }
}


if (!function_exists('fn_bulan')) {
    function fn_bulan($bln)
    {
        switch ($bln) {
            case 1:
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;
        }
    }
}
