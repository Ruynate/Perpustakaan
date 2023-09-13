@extends('index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahGudangModal">Tambah
                    Gudang</button>
            </div>
        </div>
        <div class="row">
            <div class="col card">
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Kapasitas</th>
                                <th>Dibuat Oleh</th>
                                <th>Diedit Oleh</th>
                                <th>Tanggal Dibuat</th>
                                <th>Tanggal Diedit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$item->nama}}</td>
                                    <td>{{$item->alamat}}</td>
                                    <td>{{$item->kapasitas}}</td>
                                    <td>{{$item->created_user}}</td>
                                    <td>{{$item->updated_user}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->updated_at}}</td>
                                    <th>
                                        <a href="{{route('gudang.detail',[$item->id])}}" class="btn btn-success">Detail</a>
                                        <a href="{{route('gudang.edit',[$item->id])}}" class="btn btn-secondary">Edit</a>
                                        <a onclick="deleteData(this)" data-src="{{route('gudang.hapus',[$item->id])}}" href="#" class="btn btn-danger">Hapus</a>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="tambahGudangModal" tabindex="-1" role="dialog" aria-labelledby="tambahGudangModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahGudangModalLabel">Tambah Gudang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('gudang.tambah') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <label for="">Nama</label>
                                <input type="text" name="nama" class="form-control" required>
                                @if ($errors->has('nama'))
                                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                                @endif
                            </div>
                            <div class="row">
                                <label for="">Alamat</label>
                                <textarea name="alamat" class="form-control" required></textarea>
                                @if ($errors->has('alamat'))
                                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                                @endif
                            </div>
                            <div class="row">
                                <label for="">Kapasitas</label>
                                <input type="number" name="kapasitas" class="form-control" required>
                                @if ($errors->has('kapasitas'))
                                    <span class="text-danger">{{ $errors->first('kapasitas') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                </form>

            </div>
        </div>
    </div>
@endsection