<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenLog extends Model
{
    use HasFactory;
    protected $table = 'absen_logs';
    protected $fillable = ['id_siswa', 'id_absen', 'status'];
    protected $primaryKey = 'id';
}
