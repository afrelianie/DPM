@extends('template_a.header')
@section('judul','DPMPTSP | UMKM Ketapang')
@section('sub_judul','Data UMKM')
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
        <div class="container">
            <div class="row card-header col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="col-6">
                    <h5 class="card-header">Tabel UMKM</h5>
                </div>
                <div class="col-6">
                    <a href="{{ url('admin/umkm/create') }}" class="btn btn-dark float-right"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>


        <div class="card-body">
            {{-- <table class="table dataTable"> --}}
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="30px">No</th>
                        <th width="100px">Action</th>
                        <th>Pemilik Usaha</th>
                        <th>Merek Usaha</th>
                        <th>Skala</th>
                        <th>Kecamatan</th>
                        <th>Alamat Usaha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach ($umkm as $data )
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>
                            <div class="btn btn-group">
                                <a href="{{ url('admin/umkm/show', $data->id_umkm) }}"
                                    class="btn btn-success"><i class="fa fa-eye"></i></a>
                                <a href="{{ url('admin/umkm/edit', $data->id_umkm) }}"
                                    class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                <form action="{{ url('admin/umkm/delete', $data->id_umkm) }}" method="post" onclick="return confirm('Yakin ingin menghapus data ini ?!');">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                      <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->umkm }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->kecamatan }}</td>
                        <td>{{ $data->alamat }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    </div>
</div>





@endsection


