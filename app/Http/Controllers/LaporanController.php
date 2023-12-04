<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AbsenLog;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.laporan');
    }

    public function filter(Request $request)
    {
        $tanggalMulai = $request->input('mulai');
        $tanggalSelesai = $request->input('selesai');

        $siswaAbsen = DB::table('absen_logs')
            ->join('siswas', 'absen_logs.id_siswa', '=', 'siswas.id')
            ->select('siswas.id', 'siswas.nama')
            ->addSelect(DB::raw('SUM(CASE WHEN absen_logs.status = 1 THEN 1 ELSE 0 END) AS hadir'))
            ->addSelect(DB::raw('SUM(CASE WHEN absen_logs.status = 2 THEN 1 ELSE 0 END) AS sakit'))
            ->addSelect(DB::raw('SUM(CASE WHEN absen_logs.status = 3 THEN 1 ELSE 0 END) AS izin'))
            ->addSelect(DB::raw('SUM(CASE WHEN absen_logs.status = 4 THEN 1 ELSE 0 END) AS alpha'))
            ->whereBetween('absen_logs.created_at', [$tanggalMulai, $tanggalSelesai])
            ->groupBy('siswas.id', 'siswas.nama')
            ->get();

        return view('laporan.laporan', ['siswaAbsen' => $siswaAbsen]);
    }

}
