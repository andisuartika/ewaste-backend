<?php

namespace App\Models;

use App\Models\bank;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransaksiPoin extends Model
{
    use HasFactory;
    protected $table = 'transaksi_poins';

    protected $fillable = [
        'id_user',
        'bank',
        'nomor',
        'nama',
        'jumlah',
        'status',
        'keterangan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }


    public function bank()
    {
        return $this->hasOne(bank::class, 'id', 'bank');
    }
}
