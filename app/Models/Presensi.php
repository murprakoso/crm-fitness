<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    protected $guarded = [];

    /** relasi ke member */
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    /** scope */
    public function scopeFilter($query, $name, $date)
    {
        return $query->join('members', function ($join) {
            $join->on('members.id', '=', 'presensis.member_id');
        })
            ->where('members.nama', 'LIKE', "%{$name}%")
            ->when($date, function ($q) use ($date) {
                if ($date) {
                    $q->whereDate('presensis.created_at', '=', $date);
                }
            })
            ->select('presensis.*', 'members.nama');
    }
}
