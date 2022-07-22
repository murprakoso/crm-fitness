<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /** relasi ke member */
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    /** Scope */
    public function scopeSearch($query, $search)
    {
        return $query->join('members', function ($join) {
            $join->on('members.id', '=', 'transaksis.member_id');
        })
            ->select('transaksis.*', 'members.nama')
            ->where('members.nama', 'LIKE', "%{$search}%")
            ->orWhere('transaksis.harga', 'LIKE', "%{$search}")
            ->orWhere('transaksis.jenis_member', 'LIKE', "%{$search}")
            ->orWhere('transaksis.tipe_member', 'LIKE', "%{$search}")
            ->orWhere('transaksis.tanggal_daftar', 'LIKE', "%{$search}");
    }

    public function scopeTipe($query, $tipe = 'tetap')
    {
        return $query->where('tipe_member', '=', "$tipe");
    }

    public function scopeJenis($query, $jenis = 'gym')
    {
        return $query->where('jenis_member', '=', "$jenis");
    }
}
