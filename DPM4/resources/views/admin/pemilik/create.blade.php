@extends('template_a.header')
@section('judul','Kepemilikan Usaha')
@section('sub_judul','Tambah Kepemilikan Usaha')
@section('content')





<div class="row justify-content-center">
    <div class="col-md-11">


    <div class="card">
        <div class="card-header">
            <div class="card-title">
                Tambah Data Pemilik
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('pemilik.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="control-label">Pemilik Usaha</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama">
                            @error('nama')
                                <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="control-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                            @error('email')
                                <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="control-label">Nomor Hp</label>
                            <input type="number" name="no_hp" class="form-control" placeholder="Nomor Hp Pemilik Usaha">
                            @error('no_hp')
                                <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="control-label">NIK</label>
                            <input type="number" name="nik" class="form-control" placeholder="NIK Pemilik Usaha">
                            @error('nik')
                                <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="control-label">No Induk Berusaha (NIB)</label>
                            <input type="number" name="nib" class="form-control" placeholder="Nomor Induk Berusaha">
                            @error('nib')
                                <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="control-label">Jenis</label>
                            <input type="text" name="jenis" class="form-control" placeholder="Jenis Perusahaan">
                            @error('jenis')
                                <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Alamat Pemilik Usaha</label>
                        <textarea name="alamat_pribadi" class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Alamat Pemilik Usaha" ></textarea>
                    </div>
                    @error('alamat')
                        <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div class="modal-footer">
                    <a href="{{ url('admin/pemilik') }}" class="btn btn-secondary">Kembali</a>
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    </div>
</div>

@endsection
