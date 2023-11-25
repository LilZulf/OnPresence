<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Guru;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;
use SebastianBergmann\Type\VoidType;
use Illuminate\Support\Facades\Validator;


class JadwalController extends Controller
{
    public function index() {
        $jadwals = Jadwal::with(['guru', 'pelajaran','kelas'])->get();
        return view('jadwal.jadwal', ['jadwals' => $jadwals]);
    }
    public function tambah()  {
        $guru = Guru::all();
        $kelas = Kelas::all();
        $mapel = MataPelajaran::all();
        return view('jadwal/jadwalTambah', ['guru' => $guru, 'kelas' => $kelas, 'mapel' => $mapel]);

    }
    public function create(Request $request)  {
        $validator = Validator::make($request->all(), [
            'guru' => 'required|string|max:255',
            'hari' => 'required|string|max:255',
            'jam' => 'required|string|max:255',
            'kelas' => 'required',
            'pelajaran' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('/jadwal/tambah')->withErrors($validator)->withInput();
        }


        Jadwal::create([
            'id_guru' => $request->guru,
            'hari' => $request->hari,
            'jam' => $request->jam,
            'id_pelajaran' => $request->pelajaran,
            'id_kelas' => $request->kelas
        ]);
        return redirect('/jadwal')->with('success', "Berhasil menambahkan Jadwal");
    }
    public function edit($id) {
        $jadwal = Jadwal::with(['guru', 'pelajaran','kelas'])->find($id);
        $guruList = Guru::all();
        $pelajaranList = MataPelajaran::all();
        $kelasList = Kelas::all();
        return view('jadwal/jadwalEdit', ['jadwal' => $jadwal, 'guruList' => $guruList, 'pelajaranList' => $pelajaranList,'kelasList' => $kelasList]);
    }

    public function editproses($id,Request $request){
        $jadwal= Jadwal::find($id);

        $validator = Validator::make($request->all(), [
            'guru' => 'required|string|max:255',
            'hari' => 'required|string|max:255',
            'jam' => 'required|string|max:255',
            'kelas' => 'required',
            'pelajaran' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/jadwal/tambah')->withErrors($validator)->withInput();
        }
        $jadwal->update([
            'id_guru' => $request->guru,
            'hari' => $request->hari,
            'jam' => $request->jam,
            'id_pelajaran' => $request->pelajaran,
            'id_kelas' => $request->kelas
        ]);
        return redirect('/jadwal')->with('success', "Berhasil Mengupdate Jadwal");
    }

    public function delete($id)  {
        $jadwal =  Jadwal::find($id);

        $jadwal->delete();

        return redirect('/jadwal')->with('success', "Berhasil Menghapus Jadwal");
        
    }
}
