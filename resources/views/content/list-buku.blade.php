@extends('index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahBukuModal">Tambah Buku</button>
            </div>
        </div>
        <div class="row">
            <div class="col card">
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Genre</th>
                                <th>Sinopsis</th>
                                <th>Pengarang</th>
                                <th>Tanggal Kembali</th>
                                <th>Dibuat Oleh</th>
                                <th>Tanggal Dibuat</th>
                                <th>Diubah Oleh</th>
                                <th>Tanggal Diedit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Hari Sudah Gelap</td>
                                <td>Horor</td>
                                <td>Dahulu kala ada sebuah budak kecil sedang main petak umpat di waktu surup</td>
                                <td>John F Kennedy</td>
                                <td>Rabu, 20 September 2023</td>
                                <td>Rusdi</td>
                                <td>Selasa, 12 September 2023</td>
                                <td></td>
                               <td></td>
                                <th>
                                    <a href="#" class="btn btn-sm btn-success">Detail</a>
                                    <a href="#" class="btn btn-sm btn-secondary">Edit</a>
                                    <a href="#" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                                </th>
                            </tr>                     
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="tambahBukuModal" tabindex="-1" role="dialog" aria-labelledby="tambahBukuModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahBukuModalLabel">Tambah Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('buku.tambah')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <label for="">judul</label>
                                <input type="text" name="judul" class="form-control" required>
                                @if ($errors->has('judul'))
                                    <span class="text-danger">{{ $errors->first('judul') }}</span>
                                @endif
                            </div>
                            <div class="row">
                                <label for="">Kategori</label>
                                <select name="kategori_id" class="form-control" required>
                                    <option value="">Pilih Kategori</option>
                                    {{-- @foreach(App\Models\Kategori::all() as $val)
                                    <option value="{{$val->id}}">{{$val->judul}}</option>
                                    @endforeach --}}
                                </select>
                                @if ($errors->has('kategori_id'))
                                    <span class="text-danger">{{ $errors->first('kategori_id') }}</span>
                                @endif
                            </div>
                            <div class="row">
                                <label for="">Harga</label>
                                <input type="number" name="harga" class="form-control" required>
                                @if ($errors->has('harga'))
                                    <span class="text-danger">{{ $errors->first('harga') }}</span>
                                @endif
                            </div>
                            <div class="row">
                                <label for="">Tanggal Expired</label>
                                <input type="date" name="expired_at" class="form-control">
                                @if ($errors->has('expired_at'))
                                    <span class="text-danger">{{ $errors->first('expired_at') }}</span>
                                @endif
                            </div>
                            <div class="row">
                                <label for="">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control"></textarea>
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