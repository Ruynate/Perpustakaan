@extends('index')
@section('content')
    <div class="container">
        <form action="{{route('genre.update',[$data->id])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <label for="">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{$data->nama}}" required>
            </div>
            <div class="row pt-2">
                <button type="submit" class="btn btn-success">Ubah Data</button>
            </div>
        </form>
    </div>
@endsection