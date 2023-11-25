<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;

use SebastianBergmann\Type\VoidType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MataPelajaranController extends Controller
{
    public function index()
    {
        $mapel = MataPelajaran::paginate(1000);
        return view('mapel/mapel', ['mapel' => $mapel ]);
    }

    public function tambah()  {
        return view('mapel/mapelTambah');
    }

    public function create(Request $request)  {
        // Validasi input menggunakan Validator
        $validator = Validator::make($request->all(), [
            'kode_mapel' => 'required|unique:mata_pelajarans',
            'nama_mapel' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/mapel/tambah')->withErrors($validator)->withInput();
        }

        MataPelajaran::create([
             'kode_mapel' => $request->kode_mapel,
             'nama_mapel' => $request->nama_mapel
        ]);
        return redirect('/mapel')->with('success', "Berhasil menambahkan Data Mata Pelajaran");
    }

    public function edit($id)  {
        $mapel = MataPelajaran::where('id_mapel','=', $id)->get()->first();

        return view('mapel/mapelEdit',['mapel'=> $mapel]);
    }

    public function editproses($id,Request $request){
        // Validasi input menggunakan Validator
        $validator = Validator::make($request->all(), [
            'kode_mapel' => 'required|unique:mata_pelajarans',
            'nama_mapel' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/mapel/edit/' .$id)->withErrors($validator)->withInput();
        }

        $mapel = MataPelajaran::find($id);
        // $this->validate($request,[
        //     'kode_mapel' => 'required',
        //     'nama_mapel' => 'required']);

        $mapel->update([
            'kode_mapel' => $request->kode_mapel,
            'nama_mapel' => $request->nama_mapel
        ]);
        return redirect('/mapel')->with('success', "Berhasil Mengupdate Data Mata Pelajaran");
    }

    public function delete($id)  {
        $mapel =  MataPelajaran::find($id);

        $mapel->delete();

        return redirect('/mapel')->with('success', "Berhasil Menghapus Data Mata Pelajaran");
    }
}
