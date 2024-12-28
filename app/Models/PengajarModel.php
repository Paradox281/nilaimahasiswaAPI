<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajarModel extends Model
{
    use HasFactory;

    protected $table = 'pengajar';
    protected $primaryKey = 'id_pengajar';
    protected $fillable = ['id_user', 'nip', 'nm_pengajar', 'pendidikan', 'alamat_pengajar', 'no_hp_pengajar'];
}
