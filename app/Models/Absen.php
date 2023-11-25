<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Guru;
use App\Models\MataPelajaran;

class Absen extends Model
{
    use HasFactory;
    protected $table = 'absens';
    protected $fillable = ['id_guru','id_jadwal','materi'];
    protected $primaryKey= 'id';
    public $incrementing = true;
    public $timestamps = true;

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }
    
    public function pelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'id_mapel');
    }
}
