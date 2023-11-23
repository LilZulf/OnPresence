<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwals';
    protected $fillable = ['id','hari','mulai','selesai','pengajar','kelas',];
    protected $primaryKey= 'id';
    public $incrementing = true;
    public $timestamps = false;
}
