@extends('template_a.header')
@section('judul','Kepemilikan Usaha')
@section('sub_judul','Edit Kepemilikan Usaha')
@section('content')



<div class="row justify-content-center">
    <div class="col-md-11">

    <div class="card">
        <div class="card-header">
            <div class="card-title">
                Edit Data Pemilik
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('pemilik.update', $pemilik->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="control-label">Pemilik Usaha</label>
                            <input type="text" name="nama" class="form-control" value="{{ $pemilik->nama }}">
                            @error('nama')
                                <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="control-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $pemilik->email }}">
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
                            <input type="number" name="no_hp" class="form-control" value="{{ $pemilik->no_hp }}">
                            @error('no_hp')
                                <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="control-label">NIK</label>
                            <input type="number" name="nik" class="form-control" value="{{ $pemilik->nik }}">
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
                            <input type="number" name="nib" class="form-control" value="{{ $pemilik->nib }}">
                            @error('nib')
                                <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="control-label">Klasifikasi Baku Lapangan Usaha Indonesia (KBLI)</label>
                            <input type="number" name="kbli" class="form-control" value="{{ $pemilik->kbli }}">
                            @error('kbli')
                                <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="control-label">Surat Keterangan Usaha (SKU)</label>
                        <input type="number" name="sku" class="form-control" value="{{ $pemilik->sku }}">
                        @error('sku')
                            <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Alamat Pemilik Usaha</label>
                        <textarea name="alamat_pribadi" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Alamat Pemilik Usaha">{{ $pemilik->alamat_pribadi }}</textarea>
                    </div>
                    @error('alamat_pribadi')
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
