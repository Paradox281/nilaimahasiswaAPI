<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasPengajarModel extends Model
{
    use HasFactory;

    protected $table = 'kelas_pengajar';
    protected $primaryKey = 'id_kelas_pengajar';
    protected $fillable = ['id_kelas', 'id_pelajaran', 'id_pengajar', 'id_tahun_ajaran'];
}
