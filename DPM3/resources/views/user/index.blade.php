@extends('template_a.header')
@section('judul','Data User')
@section('sub_judul','User')
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
    <div class="col-md-9">

    <div class="card">
        <div class="container">
            <div class="row card-header col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="col-6">
                    <h5 class="card-header">Tabel User</h5>
                </div>
                <div class="col-6">
                        <!-- Modal -->
                    <button type="button" class="btn btn-dark float-right" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
        </div>



        <div class="card-body">
            <table class="table dataTable">
                <thead>
                    <tr>
                        <th width="30px"> No </th>
                        <th width="100px"> Action </th>
                        <th> Nama </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list_user as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <div class="btn btn-group">
                                <a href="{{ url('admin/user', $user->id) }}user/edit"
                                    class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                @include('utils.delete', [
                                    'url' => url('admin/user', $user->id),
                                ])
                            </div>
                        </td>
                        <td>{{ $user->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



        <!-- Modal Tambah Kategori -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tambah User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

        <!-- ============================================================== -->
        <!-- basic form  -->
        <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Nama</label>
                                    <input id="inputText3" type="text" class="form-control" placeholder="Nama Kategori" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">Password</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-primary">Simpan</button>
                                </div>
                            </form>

                        </div>
                    </div>
        <!-- ============================================================== -->
        <!-- end basic form  -->
        <!-- ============================================================== -->

                </div>
            </div>
        </div>
    </div>
    </div>
</div>






@endsection
