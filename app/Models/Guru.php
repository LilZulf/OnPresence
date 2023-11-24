<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'gurus';
    protected $fillable = ['id','nama_guru','nip','alamat','jenis_kelamin','email','password'];
    protected $primaryKey= 'id';
    public $incrementing = true;
    public $timestamps = false;
}
