@extends('index')
@section('content')
    <div class="container">
        <div class="row">
            <label for="">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{$data->nama}}" disabled>
        </div>
        <div class="row">
            <label for="">Nomor Pokok</label>
            <input type="text" name="np" class="form-control" value="{{$data->np}}" disabled>
        </div>
        <div class="row">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control" value="{{$data->email}}" disabled>
        </div>
        <div class="row">
            <label for="">Role</label>
            <input type="text" name="role" class="form-control" value="{{$data->role}}" disabled>
        </div>
        <div class="row">
            <label for="">Tanggal Dibuat</label>
            <input type="text" name="created_at" class="form-control" value="{{$data->created_at}}" disabled>
        </div>
        <div class="row">
            <label for="">Tanggal Diubah</label>
            <input type="text" name="updated_at" class="form-control" value="{{$data->updated_at}}" disabled>
        </div>
        <button href="{{route('pengguna.list')}}" class="btn btn-secondary">Back</button>
    </div>
@endsection