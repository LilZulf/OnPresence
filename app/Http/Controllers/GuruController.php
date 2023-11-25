<?php

namespace App\Http\Controllers;

use App\Imports\GuruImport;
use App\Models\Guru;
use Illuminate\Http\Request;
use Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

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
         // Validasi input menggunakan Validator
        $validator = Validator::make($request->all(), [
            'nama_guru' => 'required',
            'nip' => 'required|unique:gurus',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required|email|unique:gurus|max:255',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return redirect('/guru/tambah')->withErrors($validator)->withInput();
        }
        // $this->validate($request,[
        //     'nama_guru' => 'required',
        //     'nip' => 'required|unique:gurus',
        //     'alamat' => 'required',
        //     'jenis_kelamin' => 'required',
        //     'email' => 'required|email|unique:users|max:255',
        //     'password' => 'required']);

            Guru::create([
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'password' => Hash::make($request->password)
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

        $validator = Validator::make($request->all(), [
            'nama_guru' => 'required',
            'nip' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required|email|unique:gurus|max:255',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return redirect('/guru/edit/'.$id)->withErrors($validator)->withInput();
        }

        $guru->update([
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
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
