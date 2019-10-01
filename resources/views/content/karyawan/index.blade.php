@extends('layouts.main')
@section('title', 'Karyawan Page')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Karyawan</h1>
        @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="#addkaryawan" class="btn btn-sm btn-primary" data-toggle="modal"><i class="fas fa-plus"></i> Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered dt-responsive nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Karyawan</th>
                            <th>Umur</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>No. HP</th>
                            <th>Tanggal Lahir</th>
                            <th>Tempat Lahir</th>
                            <th>Jabatan</th>
                            <th>Tanggal Masuk</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Karyawan</th>
                            <th>Umur</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>No. HP</th>
                            <th>Tanggal Lahir</th>
                            <th>Tempat Lahir</th>
                            <th>Jabatan</th>
                            <th>Tanggal Masuk</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($showAll as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->nama}}</td>
                            <td>{{$data->umur}}</td>
                            @if($data->jk == 'L')
                            <td>Laki - Laki</td>
                            @else
                            <td>Perempuan</td>
                            @endif
                            <td>{{$data->alamat}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->no_tlp}}</td>
                            <td>{{$data->tgl_lahir}}</td>
                            <td>{{$data->tmp_lahir}}</td>
                            <td>{{$data->jabatan->nama_jabatan}}</td>
                            <td>{{$data->tgl_masuk}}</td>
                            <td>{{$data->status->nama_status}}</td>
                            <td>
                                <a href="#edit{{$data->id}}" data-toggle="modal" class="btn btn-primary">Edit</a>
                                <a href="#delete{{$data->id}}" data-toggle="modal" class="btn btn-danger">Delete</a>

                            </td>
                        </tr>
                        <!-- Delete Modal  -->
                        <div class="modal fade" id="delete{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="delete">Are You Sure Deleted <b style="color:red">{{$data->nama}}</b> </h5>
                                    </div>
                                    <form action="/karyawan/{{$data->id}}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Delete Modal  -->
                        <!-- Modal Update -->
                        <div class="modal fade" id="edit{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="edit">Update Data Karyawan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="user" method="post" action="/karyawan/{{$data->id}}">
                                        @method('patch')
                                        @csrf
                                        <div class="modal-body container-fluid">
                                            <div class="form-group row">
                                                <label for="nama" class="col-sm-3 col-form-label">Nama Karyawan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="nama" class="form-control form-control-user @error('nama') is-invalid @enderror" id="nama" placeholder="Masukan Nama Karyawan" value=" {{$data->nama }} ">
                                                    @error('nama')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="umur" class="col-sm-3 col-form-label">Umur</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="umur" class="form-control form-control-user @error('umur') is-invalid @enderror" id="umur" placeholder="Masukan Umur" value=" {{$data->umur }} ">
                                                    @error('umur')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="jk" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                                <div class="col-sm-4 custom-control custom-radio">
                                                    <input type="radio" id="ujk1" name="jk" class="custom-control-input" value="L" @if($data->jk == 'L') checked @endif>
                                                    <label class="custom-control-label" for="jk1">Laki -Laki</label>
                                                </div>
                                                <div class="col-sm-4 custom-control custom-radio">
                                                    <input type="radio" id="ujk2" name="jk" class="custom-control-input" value="P" @if($data->jk == 'P') checked @endif>
                                                    <label class="custom-control-label" for="jk2">Perempuan</label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                                <div class="col-sm-9">
                                                    <textarea name="alamat" class="form-control form-control-user @error('alamat') is-invalid @enderror" placeholder="Masukan alamat domisili">{{$data->alamat }}</textarea>
                                                    @error('alamat')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="email" name="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" placeholder="Masukan email" value=" {{$data->email }} ">
                                                    @error('email')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="no_tlp" class="col-sm-3 col-form-label">No. Hp</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="no_tlp" class="form-control form-control-user @error('no_tlp') is-invalid @enderror" id="no_tlp" value=" {{$data->no_tlp }} ">
                                                    @error('no_tlp')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="tgl_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                                <div class="col-sm-9">
                                                    <input type="date" name="tgl_lahir" class="form-control form-control-user @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir" value=" {{$data->tgl_lahir }} ">
                                                    @error('tgl_lahir')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="tmp_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="tmp_lahir" class="form-control form-control-user @error('tmp_lahir') is-invalid @enderror" id="tmp_lahir" value=" {{$data->tmp_lahir }} ">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                                                <div class="col-sm-9">
                                                    <select class="custom-select" name="id_jabatan">
                                                        @foreach($showAllJabatan as $jabatan)
                                                        <option value="{{$jabatan->id}}" @if($jabatan->id == $data->id_jabatan) selected @endif>{{$jabatan->nama_jabatan}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="tgl_masuk" class="col-sm-3 col-form-label">Tanggal Masuk</label>
                                                <div class="col-sm-9">
                                                    <input type="date" name="tgl_masuk" class="form-control form-control-user @error('tgl_masuk') is-invalid @enderror" id="tgl_masuk" value=" {{old('tgl_masuk')}} ">
                                                    @error('tgl_masuk')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="status" class="col-sm-3 col-form-label">Status</label>
                                                <div class="col-sm-9">
                                                    <select class="custom-select" name="id_status">
                                                        @foreach($showAllStatus as $status)
                                                        <option value="{{$status->id}}" @if($status->id == $data->id_status) selected @endif>{{$status->nama_status}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end modal update  -->
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="addkaryawan" tabindex="-1" role="dialog" aria-labelledby="addkaryawan" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addkaryawan">Tambah Data Karyawan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="user" method="post" action="/karyawan/store">
                    @csrf
                    <div class="modal-body container-fluid">
                        <div class="form-group row">
                            <label for="nama" class="col-sm-3 col-form-label">Nama Karyawan</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama" class="form-control form-control-user @error('nama') is-invalid @enderror" id="nama" placeholder="Masukan Nama Karyawan" value=" {{old('nama')}} ">
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="umur" class="col-sm-3 col-form-label">Umur</label>
                            <div class="col-sm-9">
                                <input type="text" name="umur" class="form-control form-control-user @error('umur') is-invalid @enderror" id="umur" placeholder="Masukan Umur" value=" {{old('umur')}} ">
                                @error('umur')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jk" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-4 custom-control custom-radio">
                                <input type="radio" id="jk1" name="jk" class="custom-control-input" value="L">
                                <label class="custom-control-label" for="jk1">Laki -Laki</label>
                            </div>
                            <div class="col-sm-4 custom-control custom-radio">
                                <input type="radio" id="jk2" name="jk" class="custom-control-input" value="P">
                                <label class="custom-control-label" for="jk2">Perempuan</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                <textarea name="alamat" class="form-control form-control-user @error('alamat') is-invalid @enderror" placeholder="Masukan alamat domisili"></textarea>
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" placeholder="Masukan email" value=" {{old('email')}} ">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_tlp" class="col-sm-3 col-form-label">No. Hp</label>
                            <div class="col-sm-9">
                                <input type="number" name="no_tlp" class="form-control form-control-user @error('no_tlp') is-invalid @enderror" id="no_tlp" placeholder="No. Hp ..." value=" {{old('no_tlp')}} ">
                                @error('no_tlp')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tgl_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-9">
                                <input type="date" name="tgl_lahir" class="form-control form-control-user @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir" value=" {{old('tgl_lahir')}} ">
                                @error('tgl_lahir')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tmp_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-9">
                                <input type="text" name="tmp_lahir" class="form-control form-control-user @error('tmp_lahir') is-invalid @enderror" id="tmp_lahir" value=" {{old('tmp_lahir')}} ">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                            <div class="col-sm-9">
                                <select class="custom-select" name="id_jabatan">
                                    <option selected>Choose...</option>
                                    @foreach($showAllJabatan as $jabatan)
                                    <option value="{{$jabatan->id}}">{{$jabatan->nama_jabatan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tgl_masuk" class="col-sm-3 col-form-label">Tanggal Masuk</label>
                            <div class="col-sm-9">
                                <input type="date" name="tgl_masuk" class="form-control form-control-user @error('tgl_masuk') is-invalid @enderror" id="tgl_masuk" value=" {{old('tgl_masuk')}} ">
                                @error('tgl_masuk')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select class="custom-select" name="id_status">
                                    <option selected>Choose...</option>
                                    @foreach($showAllStatus as $status)
                                    <option value="{{$status->id}}">{{$status->nama_status}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection