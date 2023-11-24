<?php

namespace App\Http\Controllers;

use App\Imports\GuruImport;
use App\Models\Guru;
use Illuminate\Http\Request;
use Excel;

class GuruController extends Controller
{

    public function index_guru() {
        $guru = Guru::paginate(1000);
        return view('guru/guru', ['guru' => $guru ]);
    }
    public function tambah()  {
        return view('guru/guruTambah');
    }
    public function create(Request $request)  {
        // dd($request->jenis_kelamin);
        $this->validate($request,[
            'nama_guru' => 'required',
            'nip' => 'required|unique:gurus',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'username' => 'required',
            'password' => 'required']);

            Guru::create([
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'username' => $request->username,
            'password' => $request->password
        ]);
        return redirect('/guru');
    }
    public function edit($id)  {
       $guru = Guru::where('id','=', $id)->get()->first();
    //    dd($siswa);
       return view('guru/guruEdit',['guru'=> $guru]);
    }

    public function editproses($id,Request $request){
        $guru = Guru::find($id);
        // dd($guru);

        $this->validate($request,[
            'nama_guru' => 'required',
             'nip' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'username' => 'required',
            'password' => 'required']);

        $guru->update([
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'username' => $request->username,
            'password' => $request->password
        ]);
        return redirect('/guru');
    }

    public function delete($id)  {
        $guru =  Guru::find($id);

        $guru->delete();

        return redirect('/guru');
    }

    public function import() {
        return view('guru/uploadExcel');
    }

    public function importPro(Request $request)  {
        // dd($request->all());
        $request->validate([
            'file' => 'required|file|mimes:xlsx', // Adjust allowed file types and size as needed
        ]);
        Excel::import(new GuruImport(),$request->file('file'));

        return redirect('/guru');
    }
}
