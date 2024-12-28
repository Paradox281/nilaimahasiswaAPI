<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrangTuaModel extends Model
{
    use HasFactory;

    protected $table = 'orang_tua';
    protected $primaryKey = 'id_orang_tua';
    protected $fillable = ['id_user', 'nm_orang_tua', 'alamat_orang_tua', 'no_hp_orang_tua'];
}
