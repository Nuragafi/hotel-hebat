<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservasi extends Model
{
    use HasFactory;

    protected $table = 'reservasi';
    protected $fillable = [
        'id_client', 'id_kamar', 'mulai', 'selesai', 'total', 'status', 'jumlahKamar'
    ];

    public function client()
    {
        return $this->belongsTo(client::class, 'id_client');
    }

    public function kamar()
    {
        return $this->belongsTo(kamar::class, 'id_kamar');
    }
}
