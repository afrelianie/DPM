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
                    <!-- Button trigger modal -->
                    {{-- <button type="button" class="btn btn-danger float-end mt-2 mb-2" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    <i class="fa fa-file-import"></i>
                    Import Data Umkm
                    </button> --}}
                </div>
            </div>
        </div>



            <!-- Modal -->
        {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import Data Umkm</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action="/admin/umkm/import" method="POST" enctype="multipart/form-data">
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
                </div>
                    </form>
            </div>
        </div> --}}
        <!-- akhir Modal -->



            <div class="card-body">
                {{-- <table class="table dataTable"> --}}
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="30px">No</th>
                            <th width="100px">Action</th>
                            <th>Pemilik Usaha</th>
                            <th>Merek Usaha</th>
                            <th>NIB</th>
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
                            <td>{{ $data->nib }}</td>
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


