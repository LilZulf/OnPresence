<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswas';
    protected $fillable = ['id','nama','nisn','id_kelas','jenis_kelamin'];
    protected $primaryKey= 'id';
    public $incrementing = true;
    public $timestamps = false;

}
