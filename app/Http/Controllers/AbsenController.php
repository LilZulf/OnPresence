<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absen;
use App\Models\Guru;
use App\Models\MataPelajaran;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AbsenController extends Controller
{
    public function index(){
        $jadwal = Jadwal::join('kelas', 'kelas.id_kelas', '=', 'jadwals.id_kelas')
        ->join('mata_pelajarans', 'mata_pelajarans.id_mapel', '=', 'jadwals.id_pelajaran')
        ->join('absens', 'absens.id_jadwal', '=', 'jadwals.id')
        ->get(['absens.*', 'mata_pelajarans.nama_mapel', 'kelas.nama_kelas']);
    
    return view('absen.absen', ['jadwal' => $jadwal]);
    
    }

    public function tambah(){
        $guru = Auth::guard('guru')->user();
        $jadwal = Jadwal::join('kelas','kelas.id_kelas','=','jadwals.id_kelas')->
        join('mata_pelajarans','mata_pelajarans.id_mapel','=','jadwals.id_pelajaran')->
        where('jadwals.id_guru',$guru->id)->get(['jadwals.*','mata_pelajarans.nama_mapel','kelas.nama_kelas']);
        return view('absen.absenTambah',['guru' => $guru, 'jadwal' => $jadwal]);   
    }


    public function create(Request $request)  {
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

    public function edit($id) {
        $guru = Auth::guard('guru')->user();
        $jadwal = Jadwal::join('kelas', 'kelas.id_kelas', '=', 'jadwals.id_kelas')
        ->join('mata_pelajarans', 'mata_pelajarans.id_mapel', '=', 'jadwals.id_pelajaran')
        ->join('absens', 'absens.id_jadwal', '=', 'jadwals.id')
        ->get(['absens.*', 'mata_pelajarans.nama_mapel', 'kelas.nama_kelas']);
    
        return view('absen.absenEdit', ['guru'=>$guru,'jadwal' => $jadwal]);
    }
    
    
    public function editproses($id,Request $request){
        $jadwal= Absen::find($id);

        $validator = Validator::make($request->all(), [
            'materi' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('/guru/absen/edit/'. $id)->withErrors($validator)->withInput();
        }
        $jadwal->update([
            'id_guru' => $request->guru,
            'id_jadwal' => $request->jadwal,
            'materi' => $request->materi,
        ]);
        return redirect('/guru/absen')->with('success', "Berhasil Mengupdate Absen");
    }

    public function delete($id)  {
        $absen =  Absen::find($id);

        $absen->delete();

        return redirect('/guru/absen')->with('success', "Berhasil Menghapus Absen");
        
    }
}
