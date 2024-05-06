<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranMenikah extends Model
{
    use HasFactory;
    protected $table = 'pendaftaran_menikah';
    protected $primarykey = 'id';
    protected $fillable = ['jemaat_id', 'nama_pasangan', 'nama_ayah_pasangan', 'nama_ibu_pasangan', 'umur_pasangan', 'tanggal_lahir_pasangan', 'nomor_baptis_pasangan', 'tanggal_pernikahan'];

    public function jemaat() {
        return $this->belongsTo(Jemaat::class);
    }
}
