<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list()
    {
        $data = User::get();
        return view('content.list-user',compact('data'));
    }
    public function tambahUser()
    {
        $val = request()->validate([
            'nama'=>['required'],
            'email'=>['required','email'],
            'password'=>['required'],
            'retype_password'=>['required','same:password'],
            'np'=>['required','numeric'],
            'role'=>['required'],
        ]);
        $email = User::where('email',request('email'))->exists();
        if($email){
            return redirect()->back()->with([
                'error'=>true,
                'message'=>'email'.request('email').'sudah terdaftar'
            ]);
        }
        $np = User::where('np',request('np'))->exists();
        if($np){
            return redirect()->back()->with([
                'error'=>true,
                'message'=>'np'.request('np').' sudah terdaftar'
            ]);
        }
        $ins = User::create([
            'nama'=> request('nama'),
            'np'=> request('np'),
            'email'=> request('email'),
            'role'=> request('role'),
            'password'=> bcrypt(request('password')),
        ]);
        if($ins){
            return redirect()->back()->with([
                'error'=>false,
                'message'=>'Tambah Pengguna Berhasil'
            ]);
        }
        return redirect()->back()->with([
            'error'=>true,
            'message'=>'Tambah Pengguna Gagal'
        ]);
    }
    public function detailUser($id)
    {
        $data =User::find($id);
        if($data==null){
            return redirect()->route('pengguna.list')->with([
                'error'=>true,
                'message'=>'Data Tidak Ditemukan'
            ]);
        }
        return view('content.detail-user',compact('data'));
    }
    public function updateUser($id)
    {
        $validate = request()->validate([
            'nama'=>['required'],
            'np'=>['required','numeric'],
            'email'=>['required','email'],
            'role'=>['required'],
            'password'=>['nullable'],
            'retype_password'=>['nullable','same:password']
        ]);
        $pengguna = User::where('email',request('email'));
        $oldEmail = $pengguna->first()->email;
        if($oldEmail != request('email')){
            if($pengguna->exist()){
                return redirect()->back()->with([
                    'error'=>true,
                    'message'=>'email'.request('email').'sudah terdaftar'
                ]);
            }
        }
        $data = User::find($id);
        if($data==null){
            return redirect()->route('pengguna.list')->with([
                'error'=>true,
                'message'=>'Data Tidak Ditemukan'
            ]);
        }
        $updateData =[
            'nama'=>request('nama'),
            'np'=>request('np'),
            'email'=>request('email'),
            'role'=>request('role')
        ];
        if(request()->has('password')&& request('password')!=null){
            $updateData['password']=bcrypt(Request('password'));
        }
        $upd = $data->update($updateData);
        if($upd){
            return redirect()->route('pengguna.list')->with([
                'error'=>false,
                'message'=>'Ubah User Berhasil'
            ]);
        }
        return redirect()->back()->with([
            'error'=>true,
            'message'=>'Ubah User Gagal'
        ]);
    }
    public function editUser($id)
    {
        $data = User::find($id);
        if($data==null){
            return redirect()->route('pengguna.list')->with([
                'error'=>true,
                'message'=>'Data Tidak Ditemukan'
            ]);
        }
        return view('content.edit-user',compact('data'));
    }
    public function hapusUser($id)
    {
        $delete = User::destroy($id);
        if($delete){
            return redirect()->back()->with([
                'error'=>false,
                'message'=>'Item Dihapus'
            ]);
        }
        return redirect()->back()->with([
            'error'=>true,
            'message'=>'Item Gagal Dihapus'
        ]);
    }
}
