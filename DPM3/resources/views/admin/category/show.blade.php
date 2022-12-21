@extends('template_a.header')
@section('judul','DPMPTSP | Kepemilikan Usaha')
@section('sub_judul','Edit dan Detail Usaha')
@section('content')



<div class="row justify-content-center">
    <div class="col-md-11">

            <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="image" width="290" height="190" src="{{ asset($category-> image)}}"
                                            alt="image">
                                </div>
                                    <h4 class="profile-username text-center">Skala {{ $category->name }}</h4>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>{{ $category->content }}</b>
                                    </li>
                                </ul>
                            </div>
                                <!-- /.card-body -->
                        </div>
                            <!-- /.card -->
                    </div>
                        <!-- /.col -->
                <div class="col-md-8">
                    <div class="card card-secondary">
                        <div class="card-header">
                          <h3 class="card-title">EDIT SKALA USAHA</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            {{-- <div class="tab-pane" id="settings"> --}}
                                <div class="container">
                                <form action="{{ url('admin/category/update', $category->id_category) }}"
                                    class="form-horizontal" method="post" enctype="multipart/form-data">
                                @csrf

                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Skala Usaha</label>
                                        <div class="col-sm-10">
                                            <select name="name" class="form-control">
                                                <option value="{{ $category->name }}">{{ $category->name }}</option>
                                                <option value="Mikro">Mikro</option>
                                                <option value="Kecil">Kecil</option>
                                                <option value="Menengah">Menengah</option>
                                            </select>
                                            @error('name')
                                                <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 col-form-label">Logo</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" id="" name="image" accept="image/png">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputExperience" class="col-sm-2 col-form-label">Deskripsi</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="inputName1" placeholder="Content" rows="4"
                                                name="content">{{ $category->content }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <a href="{{ url('admin/category') }}" class="btn btn-secondary">Kembali</a>
                                            <button class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div><!-- /.tab-pane -->
                        </div><!-- /.card-body -->
                    </div>
                        </div>      <!-- /.col -->
                </div>
                    <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
            <!-- /.content -->



    </div>
</div>





@endsection
