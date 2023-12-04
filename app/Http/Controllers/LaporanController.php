<?php

namespace App\Http\Controllers;

use App\Exports\LaporanExport;
use Illuminate\Http\Request;
use App\Models\AbsenLog;
use Illuminate\Support\Facades\DB;
use Excel;
use PDF;
use Illuminate\Support\Facades\Validator;

class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.laporan');
    }

    public function prosesLaporan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mulai' => 'required',
            'selesai' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('/laporan')->withErrors($validator)->withInput();
        }

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


        if ($request->input('action') == 'filter') {
            // Proses filter
            return view('laporan.laporan', ['siswaAbsen' => $siswaAbsen]);
        } elseif ($request->input('action') == 'excel') {
            // Proses export Excel
            $export = new LaporanExport($siswaAbsen);

            return Excel::download($export, 'rekap_' . $tanggalMulai . ' - ' . $tanggalSelesai . '.xlsx');
        } else {
            $pdf = PDF::loadView('laporan.pdf', ['siswaAbsen' => $siswaAbsen]);
            return $pdf->download('rekap_' . $tanggalMulai . ' - ' . $tanggalSelesai . '.pdf');
        }
    }

}
