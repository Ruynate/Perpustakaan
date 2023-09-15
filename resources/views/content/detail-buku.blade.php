@extends('index')
@section('content')
<div class="container">
    <div class="row">
        <label for="">Nama</label>
        <input type="text" name="nama" class="form-control" value="{{$data->nama}}" disabled>
    </div>
    <div class="row">
        <label for="">Kategori</label>
        <input type="text" name="kategori" class="form-control" value="{{$data->data_kategori->nama}}" disabled>
    </div>
    <div class="row">
        <label for="">Harga</label>
        <input type="text" name="harga" class="form-control" value="Rp {{number_format($data->harga)}}" disabled>
    </div>
    <div class="row">
        <label for="">Tanggal Expired</label>
        <input type="text" name="expired_at" class="form-control" value="{{$data->expired_at}}" disabled>
    </div>
    <div class="row">
        <label for="">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" disabled>{{$data->deskripsi}}</textarea>
    </div>
    <div class="row">
        <label for="">Dibuat Oleh</label>
        <input type="text" name="created_user" class="form-control" value="{{$data->created_user}}" disabled>
    </div>
    <div class="row">
        <label for="">Tanggal Dibuat</label>
        <input type="text" name="created_at" class="form-control" value="{{$data->created_at}}" disabled>
    </div>
    <div class="row">
        <label for="">Tanggal Diedit</label>
        <input type="text" name="updated_at" class="form-control" value="{{$data->updated_at}}" disabled>
    </div>
    <div class="row d-flex justify-content-center">
        <img src="/storage/images/{{$data->foto}}" class="img-fluid col-6" alt="">
    </div>
</div>
@endsection