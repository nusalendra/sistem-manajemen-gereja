<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranBaptis extends Model
{
    use HasFactory;
    protected $table = 'pendaftaran_baptis';
    protected $primarykey = 'id';
    protected $fillable = ['jemaat_id', 'sertifikat', 'tanggal_baptis'];

    public function jemaat() {
        return $this->belongsTo(Jemaat::class);
    }
}
