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
}
