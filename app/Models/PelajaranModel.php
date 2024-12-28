<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelajaranModel extends Model
{
    use HasFactory;

    protected $table = 'pelajaran';
    protected $primaryKey = 'id_pelajaran';
    protected $fillable = ['kd_pelajaran', 'nm_pelajaran'];
}
