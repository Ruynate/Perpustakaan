@extends('index')
@section('content')
<div class="container">
    <form action="{{route('barang.update',[$data->id])}}" method="POST">
        @csrf
        @method("PUT")
        <div class="row">
            <label for="">Nama</label>
            <input type="text" name="nama" class="form-control"  value="{{$data->nama}}" required>
            @if ($errors->has('nama'))
                <span class="text-danger">{{ $errors->first('nama') }}</span>
            @endif
        </div>
        <div class="row">
            <label for="">Kategori</label>
            <select name="kategori_id" class="form-control"  required>
                <option value="">Pilih Kategori</option>
                @foreach(\App\Models\Kategori::all() as $val)
                    <option {{$val->id == $data->kategori_id?'selected':''}} value="{{$val->id}}">{{$val->nama}}</option>
                @endforeach
            </select>
            @if ($errors->has('kategori_id'))
                <span class="text-danger">{{ $errors->first('kategori_id') }}</span>
            @endif
        </div>
        <div class="row">
            <label for="">Harga</label>
            <input type="number" name="harga" class="form-control"  value="{{$data->harga}}"required>
            @if ($errors->has('harga'))
                <span class="text-danger">{{ $errors->first('harga') }}</span>
            @endif
        </div>
        <div class="row">
            <label for="">Tanggal Expired</label>
            <input type="date" name="expired_at" class="form-control"  value="{{$data->expired_at}}" required>
            @if ($errors->has('expired_at'))
                <span class="text-danger">{{ $errors->first('expired_at') }}</span>
            @endif
        </div>
        <div class="row">
            <label for="">Deskripsi</label>
            <textarea name="deskripsi" class="form-control"  value="">{{$data->deskripsi}}</textarea>
            @if ($errors->has('deskripsi'))
                <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
            @endif
        </div>
        <div class="row">
            <label for="">Foto</label>
            <input type="file" name="foto" class="form-control" accept=".jpg,.jpeg,.png">
            @if ($errors->has('foto'))
                <span class="text-danger">{{ $errors->first('foto') }}</span>
            @endif
        </div>
        <div class="row d-flex justify-content-center">
            <img src="/storage/images/{{$data->foto}}" class="img-fluid col-6" alt="">
        </div>
        <div class="row mt-2">
            <button type="submit" class="btn btn-success">Ubah Data</button>
        </div>
    </form>
</div>
@endsection