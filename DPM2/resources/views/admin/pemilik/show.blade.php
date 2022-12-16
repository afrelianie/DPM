@extends('template_a.header')
@section('judul','Kepemilikan Usaha')
@section('sub_judul','Detail Kepemilikan Usaha')
@section('content')




<div class="row justify-content-center">
    <div class="col-md-11">

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">DETAIL DATA PEMILIK USAHA</h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <strong><i class="fas fa-user-alt mr-1"></i> Nama Pemilik Usaha</strong>
                        <p class="text-muted">{{ $pemilik->nama }}</p><hr>

                        <strong><i class="fas fa-pencil-alt mr-1"></i> Nomor Induk Berusaha</strong>
                        <p class="text-muted">{{ $pemilik->nib }}</p><hr>

                        <strong><i class="fab fa-fw fa-wpforms"></i> NIK</strong>
                        <p class="text-muted">{{ $pemilik->nik }}</p><hr>

                        <strong><i class="fas fa-solid fa-phone"></i> Contact</strong>
                        <p class="text-muted">{{ $pemilik->no_hp }}</p><hr>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="form-group">

                        <strong><i class="fas fa-solid fa-envelope"></i> Email</strong>
                        <p class="text-muted">{{ $pemilik->email }}</p><hr>

                        <strong><i class="fas fa-book mr-1"></i> Status PM</strong>
                        <p class="text-muted">{{ $pemilik->status }}</p><hr>

                        <strong><i class="fas fa-table"></i> Jenis</strong>
                        <p class="text-muted">{{ $pemilik->jenis }}</p><hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat Pemilik Usaha</strong>
                        <p class="text-muted">{{ $pemilik->alamat_pribadi }}</p><hr>

                    </div>
                </div>

                {{-- <div class="col-md-11">
                    <div class="form-group">


                    </div>
                </div> --}}
            </div>
        </div>
        <div class="col-md-12">
            <div class="modal-footer">
                <a href="{{ url('admin/pemilik') }}" class="btn btn-success">Kembali</a>
            </div>
        </div>
    </div>

    </div>
</div>


@endsection
