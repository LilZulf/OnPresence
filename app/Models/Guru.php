<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Guru extends Authenticatable
{
    use HasFactory;
    protected $table = 'gurus';
    protected $fillable = ['id','nama_guru','nip','alamat','jenis_kelamin','email','password'];
    protected $primaryKey= 'id';
    public $incrementing = true;
    public $timestamps = false;

    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'id_guru');
    }
}
