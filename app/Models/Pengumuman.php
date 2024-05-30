<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;
    protected $table = 'pengumuman';
    protected $primarykey = 'id';
    protected $fillable = ['warta_jemaat_id', 'judul', 'isi'];

    public function wartaJemaat() {
        return $this->belongsTo(WartaJemaat::class);
    }
}
