<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kamar extends Model
{
    use HasFactory;

    protected $table = 'kamar';
    protected $fillable = [
        'deskripsi', 'harga', 'id_jeniskamar', 'stock', 'gambar'
    ];

    public function jeniskamar()
    {
        return $this->belongsTo(jeniskamar::class, 'id_jeniskamar');
    }
}
