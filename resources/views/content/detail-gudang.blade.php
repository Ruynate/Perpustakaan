@extends('index')
@section('content')
    <div class="container">
        <div class="row">
            <label for="">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{$data->nama}}" disabled>
        </div>
        <div class="row">
            <label for="">Alamat</label>
            <textarea name="alamat" class="form-control" disabled>{{$data->alamat}}</textarea>
        </div>
        <div class="row">
            <label for="">Kapasitas</label>
            <input type="number" name="kapasitas" class="form-control" value="{{$data->kapasitas}}" disabled>
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
    </div>
@endsection