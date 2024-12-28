<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasSantriModel extends Model
{
    use HasFactory;

    protected $table = 'kelas_santri';
    protected $primaryKey = 'id_kelas_santri';
    protected $fillable = ['id_kelas', 'id_santri', 'id_tahun_ajaran'];

    public function nilai()
    {
        return $this->hasMany(NilaiModel::class, 'id_santri', 'id_santri');
    }
}
