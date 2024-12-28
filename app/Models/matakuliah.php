<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matakuliah extends Model
{
    use HasFactory;
    protected $table = "matakuliah";
    protected $primaryKey ='id';
    protected $fillable =['kode','nama','sks','semester','jurusan'];

    //Kolom-kolom timestamps
    public $timestamps = true;

    // Format default kolom timestamp
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
