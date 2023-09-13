<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function list()
    { 
        $data = Genre::get();
        return view('content.list-genre',compact('data'));
    }
    public function tambahgenre()
    {
        $validate = request()->validate([
            'nama'=>['required']
        ]);
        $nama = Genre::where('nama',request('nama'))->exists();
        if($nama){
            return redirect()->back()->with([
                'error'=>true,
                'message'=>'Nama genre'.request('nama').' Sudah Terdaftar'
            ]);
        }
        $ins = Genre::create([
            'nama'=> request('nama'),
            'created_user'=>auth()->user()->nama
        ]);
        if($ins){
            return redirect()->back()->with([
                'error'=>false,
                'message'=>'Tambah genre Berhasil'
            ]);
        }
        return redirect()->back()->with([
            'error'=>true,
            'message'=>'Tambah genre Gagal'
        ]);
    }
    public function detailGenre($id)
    {
        $data = Genre::find($id);
        if($data==null){
            return redirect()->route('genre.index')->with([
                'error'=>true,
                'message'=>'Data Tidak Ditemukan'
            ]);
        }
        return view('content.detail-genre',compact('data'));
    }
    public function updateGenre($id)
    {
        $validate = request()->validate([
            'nama'=>['required']
        ]);
        $nama = Genre::where('nama',request('nama'))->exists();
        if($nama){
            return redirect()->back()->with([
                'error'=>true,
                'message'=>'Nama genre '.request('nama').' sudah terdaftar'
            ]);
        }
        $data = Genre::find($id);
        if($data==null){
            return redirect()->route('genre.index')->with([
                'error'=>true,
                'message'=>'Data Tidak Ditemukan'
            ]);
        }
        $upd = $data->update([
            'nama'=>request('nama'),
            'updated_user'=>auth()->user()->nama
        ]);
        if($upd){
            return redirect()->route('genre.list')->with([
                'error'=>false,
                'message'=>'Ubah genre Berhasil'
            ]);
        }
        return redirect()->back()->with([
            'error'=>true,
            'message'=>'Ubah genre Gagal'
        ]);
    }
    public function editGenre($id)
    {
        $data = Genre::find($id);
        if($data==null){
            return redirect()->route('genre.list')->with([
                'error'=>true,
                'message'=>'Data Tidak Ditemukan'
            ]);
        }
        return view('content.edit-genre',compact('data'));
    }
    public function hapusGenre($id)
    {
        $delete = Genre::destroy($id);
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
