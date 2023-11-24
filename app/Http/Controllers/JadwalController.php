<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use SebastianBergmann\Type\VoidType;


class JadwalController extends Controller
{
    public function index() {
        // $siswa = Siswa::paginate(10);
        return view('jadwal.jadwal');
    }
    public function tambah()  {
        return view('jadwal/jadwalTambah');
    }
    public function create(Request $request)  {
        $this->validate($request,[
            'mulai' => 'required',
            'selesai' => 'required',
            'hari' => 'required',
            'pengajar' => 'required',
            'kelas' => 'required']);

        Jadwal::create([
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
            'hari' => $request->hari,
            'pengajar' => $request->pengajar,
            'kelas' => $request->kelas
        ]);
        return redirect('/jadwal');
    }
    public function edit($id)  {
       $siswa = siswa::where('id','=', $id)->get()->first();
    //    dd($siswa);
       return view('jadwal/jadwalEdit',['siswa'=> $siswa]);
    }

    public function editproses($id,Request $request){
        $siswa = Siswa::find($id);

        $this->validate($request,[
            'nama' => 'required',
            'nisn' => 'required',
            'id_kelas' => 'required',
            'jenis_kelamin' => 'required']);

        $siswa->update([
            'nama' => $request->nama,
            'nisn' => $request->nisn,
            'id_kelas' => $request->id_kelas,
            'jenis_kelamin' => $request->jenis_kelamin
        ]);
        return redirect('/siswa');
    }

    public function delete($id)  {
        $siswa =  Siswa::find($id);

        $siswa->delete();

        return redirect('/siswa');
        
    }
}
