@extends('template_a.header')
@section('judul','DPMPTSP | Skala UMKM')
@section('sub_judul','Tabel Usaha')
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
                        <h5 class="card-header">Data Usaha</h5>
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
                            <th width="20px">No</th>
                            <th width="90px">Action</th>
                            <th>Skala Umkm</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        @foreach ($category as $result => $hasil)

                        <tr>
                            <td> {{ $no++ }} </td>
                            <td><center>
                                <div class="btn btn-group">
                                  <a href="{{ url('admin/category/show', $hasil->id_category) }}" class="btn btn-warning">
                                    <i class="fa fa-eye"></i>
                                  </a>
                                  <form action="{{ url('admin/category/delete', $hasil->id_category) }}" method="post" onclick="return confirm('Yakin ingin menghapus data ini ?!');">
                                      @csrf
                                      <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                      </button>
                                  </form>
                                </div>
                            </td></center>
                            <td> {{$hasil-> name}} </td>
                            <td> {{$hasil-> content}} </td>
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
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

        <!-- ============================================================== -->
        <!-- basic form  -->
        <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                        <form action="{{ url('admin/category/store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Skala Umkm</label>
                                <select name="name" class="form-control">
                                    <option value="" selected disabled>-- Pilih Skala Usaha --</option>
                                    <option value="Mikro">Mirko</option>
                                    <option value="Kecil">Kecil</option>
                                    <option value="Menengah">Menengah</option>
                                </select>
                                @error('name')
                                    <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                              <label for="inputText3" class="col-form-label">Logo</label>
                              <input type="file" name="image" accept="image/png" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Deskripsi</label>
                                <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Deskripsi Usaha"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
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





 <!-- jQuery -->
 <script src="{{ url('/') }}/plugins/jquery/jquery.min.js"></script>
 <!-- Bootstrap 4 -->
 <script src="{{ url('/') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- bootstrap color picker -->
 <script src="{{ url('/') }}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>

  <script>

     //Colorpicker
     $('.my-colorpicker1').colorpicker()
     //color picker with addon
     $('.my-colorpicker2').colorpicker()

     $('.my-colorpicker2').on('colorpickerChange', function(event) {
       $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
     })

 </script>



@endsection


