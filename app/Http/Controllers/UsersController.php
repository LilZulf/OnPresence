<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use SebastianBergmann\Type\VoidType;

class UsersController extends Controller
{
    public function index() {
        $user = User::paginate(10);
        return view('admin.admin',['user' => $user]);
    }
    public function tambah()  {
        return view('admin/adminTambah');
    }
    public function create(Request $request)  {
        // dd($request);
        // $this->validate($request,[
        //     'name' => 'required',
        //     'email' => 'required',
        //     'password' => 'required']);

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

    public function editproses($id,Request $request){
        $user = User::find($id);

        // $this->validate($request,[
        //     'name' => 'required',
        //     'email' => 'required|unique:users',
        //     'password' => 'required|min:6']);
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
