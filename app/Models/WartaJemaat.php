<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WartaJemaat extends Model
{
    use HasFactory;
    protected $table = 'warta_jemaat';
    protected $primarykey = 'id';
    protected $fillable = ['user_id', 'tanggal','judul', 'ayat', 'isi', 'nama_khutbah'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function pelayananSepekan() {
        return $this->hasMany(PelayananSepekan::class);
    }

    public function pengumuman() {
        return $this->hasOne(Pengumuman::class);
    }
}
