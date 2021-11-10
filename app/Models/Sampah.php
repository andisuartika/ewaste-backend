<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sampah extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sampah';

    protected $fillable = [
        'nama',
        'harga',
    ];

    public function items()
    {
        return $this->hasMany(TransaksiItems::class, 'sampah', 'id');
    }
}
