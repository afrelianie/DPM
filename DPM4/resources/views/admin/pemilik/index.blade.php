@extends('template_a.header')
@section('judul','Kepemilikan Usaha')
@section('sub_judul','Tabel Kepemilikan Usaha')
@section('content')



@if(count($errors)>0)
@foreach ($errors->all() as $error)
<div class="alert alert-danger" role="alert">
    {{ $error }}
</div>
@endforeach
@endif

@if (Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session('success') }}
</div>
@endif




<div class="row justify-content-center">
    <div class="col-md-11">





    <div class="card">
        {{-- <div class="card-header">
            <div class="card-title">
                Data Pemilik Usaha
            </div>
            <div class="col-md-12">
                <a href="{{ url('admin/pemilik/create')}}" class="float-right btn btn-dark"><i class="fa fa-plus"></i></a>
                <button type="button" class="btn btn-danger float-end mt-2 mb-2" data-bs-toggle="modal"data-bs-target="#exampleModal">
                    <i class="fa fa-file-import"></i>
                    Import Data Umkm
                </button>
            </div>
        </div> --}}


        <div class="card-header">
            <div class="card-title">
                <h5 class="mx-4 pt-2">
                    Data Pemilik Usaha
                </h5>
            </div>
            <div class="float-right">
                <button type="button" class="btn btn-danger float-end mt-2 mb-2" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    <i class="fa fa-file-import"></i>
                    Import Data Umkm
                </button>
                <!-- Button trigger modal -->
                <a href="{{ url('admin/pemilik/create')}}"
                    class="float-end btn btn-primary mt-2 mb-2 mx-3"><i class="fa fa-plus mx-1"></i>Tambah
                    Data</a>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import Data Umkm</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action="/admin/pemilik/import" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="modal-body">
                            <div class="form-group">
                                <input type="file" name="file" required="required">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- akhir Modal -->





        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
                    <th width="30px">No</th>
                    <th width="50px">Aksi</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th width="50px">No Hp</th>
                    <th>Alamat</th>
                </thead>
                <tbody>
                    @foreach ($list_pemilik as $pemilik)
                    <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ url('admin/pemilik', $pemilik->id) }}"
                                class="btn btn-success"><i class="fa fa-eye"></i></a>
                            <a href="{{ url('admin/pemilik', $pemilik->id) }}/edit"
                                class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                @include('utils.delete', [
                                    'url' => url('admin/pemilik', $pemilik->id),
                                ])
                        </div>
                    </td>
                    <td>{{$pemilik->nama}}</td>
                    <td>{{$pemilik->email}}</td>
                    <td>{{$pemilik->no_hp}}</td>
                    <td>{{$pemilik->alamat_pribadi}}</td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    </div>
</div>

@endsection
