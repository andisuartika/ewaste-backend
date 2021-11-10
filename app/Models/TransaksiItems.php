<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransaksiItems extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'transaksi_items';

    protected $fillable = [
        'id_nasabah',
        'sampah',
        'id_transaksi',
        'kuantitas',
    ];

    public function sampah()
    {
        return $this->hasOne(Sampah::class, 'id', 'sampah');
    }
}
