@extends('template_a.header')
@section('judul','DPMPTSP | Kecamatan')
@section('sub_judul','Tabel Kecamatan')
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
                        <h5 class="card-header">Tabel Kecamatan</h5>
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
                            <th width="30px">No</th>
                            <th width="90px">Action</th>
                            <th>Kecamatan</th>
                            <th width="70px">Warna</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        @foreach ($kecamatan as $data )
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>
                                <div class="btn btn-group">
                                    <a href="{{ url('admin/kecamatan/show', $data->id_kecamatan) }}"
                                        class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                    <form action="{{ url('admin/kecamatan/delete', $data->id_kecamatan) }}" method="post" onclick="return confirm('Yakin ingin menghapus data ini ?!');">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td>{{ $data->kecamatan }}</td>
                            <td style="background-color: {{ $data->warna }} "></td>
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
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Kecamatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

        <!-- ============================================================== -->
        <!-- basic form  -->
        <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                        <form action="{{ url('admin/kecamatan/store') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Kecamatan</label>
                                <input type="text" name="kecamatan" class="form-control" placeholder="Nama Kecamatan">
                            </div>

                            <div class="form-group">
                                    <label>Warna</label>
                                <div class="input-group my-colorpicker2">
                                    <input class="form-control" name="warna" placeholder="Warna Kecamatan">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-square"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">GeoJson</label>
                                <textarea name="geojson" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="GeoJSON Kecamatan"></textarea>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
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


