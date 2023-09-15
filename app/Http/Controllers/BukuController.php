<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function list()
    { 
        $data = Buku::with(['data_genre'])->get();
        return view('content.list-buku',compact('data'));
    }
    public function tambahBuku()
    {
        $validate = request()->validate([
            'nama'=>['required'],            
            'kategori_id'=>['required','numeric'],
            'harga'=>['required','numeric'],
            'expired_at'=>['required','date'],
            'deskripsi'=>['required'],
            'foto'=>['required','image']
        ]);
        if(request()->has('foto')){
            $filename = time().'.'.request()->foto->extension();
            Storage::disk('public')->putFileAs('/images',request()->foto,$filename);
        }
        $ins = Buku::create([
            "nama"=>request("nama"),
            "kategori_id"=>request("kategori_id"),
            "harga"=>request("harga"),
            "expired_at"=>request("expired_at"),
            "deskripsi"=>request("deskripsi"),
            "foto"=>$filename,
            "created_user"=>auth()->user()->nama
        ]);
        if($ins){
            return redirect()->back()->with([
                'error'=>false,
                'message'=>'Tambah Buku Berhasil'
            ]);
        }
        return redirect()->back()->with([
            'error'=>true,
            'message'=>'Tambah Buku Gagal'
        ]);
    }
    public function detailBuku($id){
        $data = Buku::find($id);
        if($data==null){
            return redirect()->route('buku.index')->with([
                'error'=>true,
                'message'=>'Data Tidak Ditemukan'
            ]);
        }
        return view('content.detail-buku',compact('data'));
    }
    public function editBuku($id)
    {
        $data = Buku::find($id);
        if($data==null){
            return redirect()->route('buku.index')->with([
                'error'=>true,
                'message'=>'Data Tidak Ditemukan'
            ]);
        }
        return view('content.edit-buku',compact('data'));
    }
    public function updateBuku($id)
    {
        $validate = request()->validate([
            'nama'=>['required','string'],
            'kategori_id'=>['required','string'],
            'harga'=>['required','numeric'],
            "expired_at"=>['required','date'],
            "deskripsi"=>['required','string'],
            'deskripsi'=>['required'],
            // 'foto'=>['nullable','image']
            'foto'=>['nullable','mimes:jpeg,png,jpg']
        ]);
        $data = Buku::find($id);
        if($data==null){
            return redirect()->route('Buku.list')->with([
                'error'=>true,
                'message'=>'Data Tidak Ditemukan'
            ]);
        }
        $updateData = [
            "nama"=>request("nama"),
            "kategori_id"=>request("kategori_id"),
            "harga"=>request("harga"),
            "expired_at"=>request("expired_at"),
            "deskripsi"=>request("deskripsi"),
            'updated_user'=>auth()->user()->nama
        ];
        if(request()->has('foto') && request('foto') != null){
            $filename = time().'.'.request()->foto->extension();
            Storage::disk('public')->putFileAs('/images',request()->foto,$filename);
            $upd['foto']=$filename;
        }
        $upd = $data->update($updateData);
        if($upd){
            return redirect()->route('buku.list')->with([
                'error'=>false,
                'message'=>'Ubah Barang Berhasil'
            ]);
        }
        return redirect()->back()->with([
            'error'=>true,
            'message'=>'Ubah Buku Gagal'
        ]);
    }

    public function hapusBuku($id)
    {
        $delete = Buku::destroy($id);
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
