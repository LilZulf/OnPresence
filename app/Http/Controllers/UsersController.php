<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use SebastianBergmann\Type\VoidType;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function index() {
        $user = User::paginate(10);
        return view('admin.admin',['user' => $user]);
    }
    public function tambah()  {
        return view('admin/adminTambah');
    }
    public function create(Request $request) {
        // Validasi input menggunakan Validator
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:6',
        ]);
    
        // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan pesan error
        if ($validator->fails()) {
            return redirect('/admin/tambah')->withErrors($validator)->withInput();


        }
    
        // Jika validasi berhasil, lanjutkan dengan proses penambahan data
        User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => $request->password,
        ]);
    
        return redirect('/admin')->with('success', "Berhasil menambahkan Data Admin");
    }
    
    public function edit($id)  {
       $user = User::where('id','=', $id)->get()->first();
       return view('admin/adminEdit',['user'=> $user]);
    }

    public function editproses($id, Request $request) {
        // Validasi input menggunakan Validator
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id, // Tambahkan pengecualian untuk email yang sudah ada
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return redirect('/admin/edit/' .$id)->withErrors($validator)->withInput();
        }

        $user = User::find($id);
        $user->update([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => $request->password,
        ]);
    
        return redirect('/admin')->with('success', "Berhasil Mengupdate Data Admin");
    }

    public function delete($id)  {
        $user =  User::find($id);

        $user->delete();

        return redirect('/admin')->with('success', "Berhasil menhapus Data Admin");
        
    }
}
