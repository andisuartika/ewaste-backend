<?php

namespace App\Models;

use App\Models\User;
use App\Models\Perjalanan;
use App\Models\TransaksiItems;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'transaksi';

    protected $fillable = [
        'id_nasabah',
        'id_petugas',
        'id_perjalanan',
        'total',
        'jenisTransaksi',
        'status',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'id_nasabah,id_petugas', 'id');
    }

    public function perjalanan()
    {
        return $this->belongsTo(Perjalanan::class, 'id_perjalanan', 'id');
    }

    public function items()
    {
        return $this->hasMany(TransaksiItems::class, 'id_transaksi', 'id');
    }
}
