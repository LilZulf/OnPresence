<?php

namespace App\Http\Controllers;

use App\Imports\SiswaImport;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Excel;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;
use SebastianBergmann\Type\VoidType;

class SiswaController extends Controller
{
    public function index() {
        $siswa = Siswa::paginate(1000);
        return view('siswa/siswa', ['siswa' => $siswa ]);
    }
    public function tambah()  {
        return view('siswa/siswaTambah');
    }
    public function create(Request $request)  {
        $this->validate($request,[
            'nama' => 'required',
            'nisn' => 'required|unique:siswas',
            'id_kelas' => 'required',
            'jenis_kelamin' => 'required']);

        Siswa::create([
            'nama' => $request->nama,
            'nisn' => $request->nisn,
            'id_kelas' => $request->id_kelas,
            'jenis_kelamin' => $request->jenis_kelamin
        ]);
        return redirect('/siswa');
    }
    public function edit($id)  {
       $siswa = siswa::where('id','=', $id)->get()->first();
    //    dd($siswa);
       return view('siswa/siswaEdit',['siswa'=> $siswa]);
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

    public function import() {
        return view('siswa/uploadExcel');
    }

    public function importPro(Request $request)  {
        // dd($request->all());
        $request->validate([
            'file' => 'required|file|mimes:xlsx', // Adjust allowed file types and size as needed
        ]);
        Excel::import(new SiswaImport(),$request->file('file'));

        return redirect('/siswa');
    }
}
