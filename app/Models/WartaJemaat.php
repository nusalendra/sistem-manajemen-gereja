<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WartaJemaat extends Model
{
    use HasFactory;
    protected $table = 'warta_jemaat';
    protected $primarykey = 'id';
    protected $fillable = ['user_id', 'judul', 'ayat', 'hari', 'jam', 'nama_khutbah', 'tempat', 'liturgos'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
