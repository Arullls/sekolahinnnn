<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $fillable = [
        'nis',
        'nama',
        'email',
        'kelas_id',       // pakai kelas_id, bukan kelas
        'user_id',
        'jenis_kelamin',
        'tanggal_lahir',
        'no_hp',
        'alamat',
        'foto',
        'tahun_masuk',
        'aktif',
    ];

    protected $hidden = ['password'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
