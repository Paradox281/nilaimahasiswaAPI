<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa'; // Nama tabel yang sesuai dengan yang telah dibuat

    protected $primaryKey = 'id'; // Primary key dari tabel

    protected $fillable = [
        'nim',
        'nama',
        'alamat',
        'jeniskelamin',
        'nohp',
        'jurusan',
        'tanggallahir',
        'foto',
    ];
     // Kolom-kolom timestamps
     public $timestamps = true;

     // Format default kolom timestamp
     const CREATED_AT = 'created_at';
     const UPDATED_AT = 'updated_at';
}
