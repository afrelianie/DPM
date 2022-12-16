@extends('template_a.header')
@section('judul','DPMPTSP | Sistem Informasi UMKM Ketapang')
@section('sub_judul','Edit User')
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


    <div class="container">
        <div class="row">
            <div class="col-md-11 mt-4">
                <div class="card">
                    <div class="card-header">
                        Edit Data User
                    </div>

                    <div class="card-body">
                        <form action="{{ url('admin/user', $user->id) }}" method="post">
                            @csrf
                            @method('PUT')


                            <div class="form-group">
                                <label for="" class="control-label">Nama</label>
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                            </div>

                            <div class="form-group">
                                <label for="" class="control-label">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>

                            <button class="btn btn-primary float-end"><i class="fa fa-save"> Simpan</i></button>
                            <a href="{{ url('admin/user') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
