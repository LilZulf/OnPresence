<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $fillable = ['nama_kelas','id_guru'];
    protected $primaryKey= 'id_kelas';
    
    public function siswas()
    {
        return $this->hasMany(Siswa::class, 'id_kelas');
    }
}
