<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;
    protected $table = 'mata_pelajarans';
    protected $fillable = ['kode_mapel','nama_mapel'];
    protected $primaryKey= 'id_mapel';
    public $incrementing = true;
    public $timestamps = false;

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class, 'id_mapel');
    }
}
