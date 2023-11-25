<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;

class DashboardController extends Controller
{
    public function index() {

        $jumlahSiswa = Siswa::count(); 
        $jumlahKelas = Kelas::count();
        $jumlahGuru = Guru::count();
        return view('dashboard', ['jumlahGuru' => $jumlahGuru,'jumlahKelas' => $jumlahKelas, 'jumlahSiswa' => $jumlahSiswa]);
    }
    
}
