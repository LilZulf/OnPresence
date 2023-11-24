<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Guru;

use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::join('gurus', 'kelas.id_guru', '=', 'gurus.id')
            ->get(['kelas.*', 'gurus.nama_guru']);
        //$kelas = Kelas::with('gurus')->paginate(10);
        return view ('kelas/kelas', ['kelas' => $kelas ]);
    }

    public function tambah()  {
        $guru = Guru::all();
        return view('kelas/kelasTambah',['guru'=>$guru]);
    }

    public function create(Request $request)  {
        $this->validate($request,[
            'nama_kelas' => 'required|unique:kelas',
            'id_guru' => 'required']);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'id_guru' => $request->id_guru
        ]);
        return redirect('/kelas');
    }

    public function edit($id)  {
        $guru = Guru::all();
        $kelas = Kelas::where('id_kelas','=', $id)->get()->first();

        return view('kelas/kelasEdit',['kelas'=> $kelas,'guru'=>$guru]);
    }

    public function editproses($id,Request $request){
        $kelas = Kelas::find($id);
        
        $this->validate($request,[
            'nama_kelas' => 'required',
            'id_guru' => 'required']);

        $kelas->update([
            'nama_kelas' => $request->nama_kelas,
            'id_guru' => $request->id_guru
        ]);
        return redirect('/kelas');
    }

    public function delete($id)  {
        $kelas =  Kelas::find($id);

        $kelas->delete();

        return redirect('/kelas');
    }
}
