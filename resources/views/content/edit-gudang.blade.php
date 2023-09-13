@extends('index')
@section('content')
    <div class="container">
        <form action="{{route('gudang.update',[$data->id])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <label for="">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $data->nama }}" required>
                @if ($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
            </div>
            <div class="row">
                <label for="">Alamat</label>
                <textarea name="alamat" class="form-control" required>{{ $data->alamat }}</textarea>
                @if ($errors->has('alamat'))
                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                @endif
            </div>
            <div class="row">
                <label for="">Kapasitas</label>
                <input type="number" name="kapasitas" class="form-control" value="{{ $data->kapasitas }}" required>
                @if ($errors->has('kapasitas'))
                    <span class="text-danger">{{ $errors->first('kapasitas') }}</span>
                @endif
            </div>
            <div class="row mt-2">
                <button type="submit" class="btn btn-success">Ubah Data</button>
            </div>
        </form>
    </div>
@endsection