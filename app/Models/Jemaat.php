<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jemaat extends Model
{
    use HasFactory;
    protected $table = 'jemaat';
    protected $primarykey = 'id';
    protected $fillable = ['user_id', 'nama_lengkap', 'jenis_kelamin', 'nomor_baptis', 'alamat', 'tanggal_lahir', 'umur', 'nama_ayah', 'nama_ibu', 'NIK', 'status_jemaat', 'status_baptis', 'status_menikah', 'status_sidi'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
