<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perjalanan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'perjalanan';

    protected $fillable = [
        'kode',
        'id_petugas',
        'waktuTugas',
        'keterangan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_petugas', 'id');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_perjalanan', 'id');
    }
}
