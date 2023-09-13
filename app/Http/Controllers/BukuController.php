<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function list()
    { 
        $data = Buku::with(['data_kategori'])->get();
        return view('content.list-buku',compact('data'));
    }
}
