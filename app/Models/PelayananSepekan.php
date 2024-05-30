<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelayananSepekan extends Model
{
    use HasFactory;
    protected $table = 'pelayanan_sepekan';
    protected $primarykey = 'id';
    protected $fillable = ['warta_jemaat_id', 'hari', 'jam', 'kegiatan', 'firman', 'liturgos', 'gitaris', 'singer', 'musik'];

    public function wartaJemaat() {
        return $this->belongsTo(WartaJemaat::class);
    }
}
