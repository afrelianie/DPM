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
        <div class="card-header">
            <div class="card-title">
                Data Pemilik Usaha
            </div>
            <a href="{{ url('admin/pemilik/create')}}" class="float-right btn btn-dark"><i class="fa fa-plus"></i></a>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
                    <th width="30px">No</th>
                    <th width="100px">Aksi</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No Hp</th>
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
