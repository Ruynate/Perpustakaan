@extends('index')
@section('content')
    <div class="container-fluid">
        <form action="{{route('scan.simpan')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12">
                    <label for="">Nama Barang</label>
                    <select name="barang_id" class="form-control" required >
                        <option value="">Pilih Barang</option>
                        @foreach (\App\Models\Barang::all() as $item)
                            <option value="{{$item->id}}" {{old('barang_id')==$item->id?'selected':''}}>{{$item->nama}}</option>

                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="">Nama Gudang</label>
                    <select name="gudang_id" class="form-control" required>
                        <option value="">Pilih Gudang</option>
                        @foreach (\App\Models\Gudang::all() as $item)
                            <option value="{{$item->id}}" {{old('gudang_id')==$item->id?'selected':''}}>{{$item->nama}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="">Kuantiti</label>
                    <input type="number" class="form-control" name="kuantiti" value="{{old('kuantiti')}}">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="">Pilih Status</option>
                       <option value="Keluar" {{old('status')=='Keluar'?'selected':''}}>Keluar</option>
                       <option value="Masuk" {{old('status')=='Masuk'?'selected':''}}>Masuk</option>
                    </select>
                </div>
                <div class="col-12 mt-2">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Nama Gudang</th>
                            <th>Kuantiti</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$item->data_barang->nama}}</td>
                            <td>{{$item->data_gudang->nama}}</td>
                            <td>{{$item->kuantiti}}</td>
                            <td>{{$item->status}}</td>
                            <td>{{$item->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection