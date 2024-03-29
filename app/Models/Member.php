<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function genders()
    {
        return [
            'pria'   => 'Pria',
            'wanita' => 'Wanita'
        ];
    }

    public static function jobs()
    {
        return [
            'Mahasiswa' => 'Mahasiswa',
            'IRT'       => 'IRT'
        ];
    }

    public static function statuses()
    {
        return [
            1 => 'Aktif',
            2 => 'Tidak Aktif',
            3 => 'Masa Tenggang',
        ];
    }

    /** relasi ke transaksi */
    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }

    /** relasi ke presensi */
    public function presensis()
    {
        return $this->hasMany(Presensi::class);
    }

    /** Scope:
     * search, name, tipe, jenis
     *
     */
    public function scopeSearch($query, $search)
    {
        return $query->where('nama', 'LIKE', "%{$search}%")
            ->orWhere('gender', 'LIKE', "%{$search}")
            ->orWhere('job', 'LIKE', "%{$search}");
    }

    public function scopeName($query, $name)
    {
        return $query->where('nama', 'LIKE', "%{$name}%");
    }

    public function scopeTipe($query, $tipe = 'tetap')
    {
        return $query->where('tipe_member', '=', "$tipe");
    }

    public function scopeJenis($query, $jenis = 'gym')
    {
        return $query->where('jenis_member', '=', "$jenis");
    }

    public function scopeJob($query, $job)
    {
        return $query->where('job', '=', "$job");
    }

    public function scopeGender($query, $gender)
    {
        return $query->where('gender', '=', "$gender");
    }

    /**
     * Masa tenggang
     * default: 3 hari
     */
    // public function scopeTenggang($query, $masa = 3)
    // {
    // $masaTenggang = date("Y-m-d", strtotime("+$masa day", strtotime(date('Y-m-d'))));
    // return $query->where('masa_tenggang', '<=', $masaTenggang);
    // }
    // public function scopeTenggang($query, $masa = 3)
    // {
    //     $masaTenggang = date("Y-m-d", strtotime("+$masa day", strtotime(date('Y-m-d'))));
    //     return $query->where('masa_tenggang', '<=', $masaTenggang);
    // }

    public function scopeStatus($query, $status = 1)
    {
        return $query->where('status', $status);
    }

    // public function scopeExpire($query, $masa = 0)
    // {
    //     $masaExpire = date("Y-m-d", strtotime("+$masa day", strtotime(date('Y-m-d'))));
    //     return $query->where('masa_tenggang', '<=', $masaExpire);
    // }
}
