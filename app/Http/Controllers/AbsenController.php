<?php

namespace App\Http\Controllers;

use App\Models\AbsenLog;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Models\Absen;
use App\Models\Guru;
use App\Models\MataPelajaran;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Query\Builder;

class AbsenController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::join('kelas', 'kelas.id_kelas', '=', 'jadwals.id_kelas')
            ->join('mata_pelajarans', 'mata_pelajarans.id_mapel', '=', 'jadwals.id_pelajaran')
            ->join('absens', 'absens.id_jadwal', '=', 'jadwals.id')
            ->get(['absens.*', 'mata_pelajarans.nama_mapel', 'kelas.nama_kelas', 'jadwals.hari']);

        return view('absen.absen', ['jadwal' => $jadwal]);

    }

    public function tambah()
    {
        $guru = Auth::guard('guru')->user();
        $jadwal = Jadwal::join('kelas', 'kelas.id_kelas', '=', 'jadwals.id_kelas')->
            join('mata_pelajarans', 'mata_pelajarans.id_mapel', '=', 'jadwals.id_pelajaran')->
            where('jadwals.id_guru', $guru->id)->get(['jadwals.*', 'mata_pelajarans.nama_mapel', 'kelas.nama_kelas']);
        return view('absen.absenTambah', ['guru' => $guru, 'jadwal' => $jadwal]);
    }


    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jadwal' => 'required',
            'materi' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('/guru/absen/tambah')->withErrors($validator)->withInput();
        }


        Absen::create([
            'id_guru' => $request->guru,
            'id_jadwal' => $request->jadwal,
            'materi' => $request->materi,
        ]);
        return redirect('/guru/absen')->with('success', "Berhasil menambahkan Jadwal");
    }

    public function edit($id)
    {
        $guru = Auth::guard('guru')->user();
        $jadwal = Absen::join('jadwals', 'jadwals.id', '=', 'absens.id_jadwal')
            ->join('mata_pelajarans', 'mata_pelajarans.id_mapel', '=', 'jadwals.id_pelajaran')
            ->join('kelas', 'kelas.id_kelas', '=', 'jadwals.id_kelas')
            ->find($id, ['absens.*', 'mata_pelajarans.nama_mapel', 'kelas.nama_kelas', 'jadwals.hari', 'jadwals.id_kelas']);
        $siswa = Siswa::where('id_kelas', $jadwal->id_kelas)
            ->whereNotIn('id', function ($query) use ($jadwal) {
                $query->select('id_siswa')
                    ->from('absen_logs')
                    ->where('id_absen', $jadwal->id); // Add your condition for absen_logs here
            })
            ->orderBy('nisn', 'asc')
            ->get();
        $siswaAbsen = AbsenLog::join('siswas', 'siswas.id', '=', 'absen_logs.id_siswa')
            ->where('id_absen', $id)
            ->get(['absen_logs.*', 'siswas.nama', 'siswas.nisn']);

        return view('absen.absenEdit', ['guru' => $guru, 'jadwal' => $jadwal, 'siswas' => $siswa, 'siswaAbsens' => $siswaAbsen]);
    }


    public function editproses($id, Request $request)
    {
        $jadwal = Absen::find($id);

        $validator = Validator::make($request->all(), [
            'materi' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('/guru/absen/edit/' . $id)->withErrors($validator)->withInput();
        }
        $jadwal->update([
            'id_guru' => $request->guru,
            'id_jadwal' => $request->id_jadwal,
            'materi' => $request->materi,
        ]);
        return redirect('/guru/absen')->with('success', "Berhasil Mengupdate Absen");
    }

    public function delete($id)
    {
        $absen = Absen::find($id);

        $absen->delete();

        return redirect('/guru/absen')->with('success', "Berhasil Menghapus Absen");

    }

    public function absenLog(Request $request, $id_absen)
    {
        $validator = Validator::make($request->all(), [
            'siswa' => 'required',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('/guru/absen/edit/' . $id_absen)->withErrors($validator)->withInput();
        }
        AbsenLog::create([
            'id_siswa' => $request->siswa,
            'status' => $request->status,
            'id_absen' => $id_absen
        ]);
        return redirect('/guru/absen/edit/' . $id_absen)->with('success', "Berhasil Absen");
    }

    public function deleteLog($id_log,$id_absen)
    {
        $log = AbsenLog::find($id_log);
        
        $log->delete();
        return redirect('/guru/absen/edit/' . $id_absen)->with('success', "Berhasil Absen");
    }
}
