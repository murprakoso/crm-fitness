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

    /** Scope: search */
    public function scopeSearch($query, $nama)
    {
        return $query->where('nama', 'LIKE', "%{$nama}%");
    }

    public function scopeTipe($query, $tipe = 'tetap')
    {
        return $query->where('tipe_member', '=', "$tipe");
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
}
