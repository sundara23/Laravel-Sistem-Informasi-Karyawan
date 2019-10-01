@extends('layouts.main')
@section('title', 'Status Page')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Status</h1>
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
            <a href="#addstatus" class="btn btn-sm btn-primary" data-toggle="modal"><i class="fas fa-plus"></i> Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($showall as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->nama_status}}</td>
                            <td>
                                <a href="#edit{{$data->id}}" data-toggle="modal" class="btn btn-primary">Edit</a>
                                <form action="/status/{{$data->id}}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <!-- Modal Update -->
                        <div class="modal fade" id="edit{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="edit">Edit Data status</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="user" method="post" action="/status/{{$data->id}}">
                                        @method('patch')
                                        @csrf
                                        <div class="modal-body container-fluid">
                                            <div class="form-group row">
                                                <label for="nama_status" class="col-sm-3 col-form-label">Nama status</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="nama_status" class="form-control form-control-user @error('nama_status') is-invalid @enderror" id="nama_status" placeholder="Masukan Nama Karyawan" value=" {{$data->nama_status}} ">
                                                    @error('nama_status')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
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
                        <!-- endmodal -->
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal Insert -->
    <div class="modal fade" id="addstatus" tabindex="-1" role="dialog" aria-labelledby="addstatus" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addstatus">Tambah Data status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="user" method="post" action="/status/store">
                    <div class="modal-body container-fluid">
                        @csrf
                        <div class="form-group row">
                            <label for="nama_status" class="col-sm-3 col-form-label">Nama status</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_status" class="form-control form-control-user @error('nama_status') is-invalid @enderror" id="nama" placeholder="Masukan Nama Karyawan" value=" {{old('nama_status')}} ">
                                @error('nama_status')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
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

</div>
<!-- /.container-fluid -->
@endsection