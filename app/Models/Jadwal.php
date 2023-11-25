<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;
use App\Models\Guru;
use App\Models\MataPelajaran;

class Jadwal extends Model
{
    protected $table = 'jadwals';
    protected $fillable = ['id','id_guru','id_pelajaran','id_kelas','hari','jam',];
    protected $primaryKey= 'id';
    public $incrementing = true;
    public $timestamps = false;

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }

    public function pelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'id_pelajaran');
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
}
