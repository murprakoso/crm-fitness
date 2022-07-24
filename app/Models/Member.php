<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function jobs()
    {
        return [
            'Mahasiswa' => 'Mahasiswa',
            'PNS' => 'PNS'
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

    /**
     * Masa tenggang
     * default: 3 hari
     */
    public function scopeTenggang($query, $masa = 3)
    {
        $masaTenggang = date("Y-m-d", strtotime("+$masa day", strtotime(date('Y-m-d'))));
        return $query->where('masa_tenggang', '<=', $masaTenggang);
    }

    // public function scopeExpire($query, $masa = 0)
    // {
    //     $masaExpire = date("Y-m-d", strtotime("+$masa day", strtotime(date('Y-m-d'))));
    //     return $query->where('masa_tenggang', '<=', $masaExpire);
    // }
}
