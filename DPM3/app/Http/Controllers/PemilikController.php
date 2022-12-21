<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Imports\PemilikImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;


use App\Models\PemilikModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\KecamatanModel;
use App\Models\UmkmModel;
use App\Models\CategoryModel;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Symfony\Contracts\Service\Attribute\Required;


class PemilikController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->UmkmModel = new UmkmModel();
        $this->KecamatanModel = new KecamatanModel();
        $this->CategoryModel = new CategoryModel();

    }

    public function index()
    {
        $data['list_pemilik'] = PemilikModel::all();
        return view('admin.pemilik.index', $data);
    }



    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = $file->hashName();

        //temporary file
        $path = $file->storeAs('public/excel', $nama_file);
        // import data
        $filepath = public_path('app/public/excel/' . $nama_file);
        $import = Excel::import(new PemilikImport(), $filepath);

        //remove from server
        Storage::delete($path);

        if ($import) {
            //redirect
            return redirect('admin/pemilik')->with(['success' => 'Data Berhasil Diimport!']);
        }
    }



    public function create()
    {
        return view('admin.pemilik.create');
    }

    public function store(Request $request)
    {
        // dd(request()->all());
        $request->validate([
            'nama' => ['required', 'unique:tbl_pemilik,nama'],
            'email' => ['required'],
            'no_hp' => ['required'],
            'nib' => ['required', 'unique:tbl_pemilik,nib'],
            'alamat_pribadi' => ['required'],
            'status' => ['required'],
            'nik' => ['required', 'unique:tbl_pemilik,nik'],
            'jenis' => ['required']
        ]);
        $pemilik = PemilikModel::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'nib' => $request->nib,
            'alamat_pribadi' => $request->alamat_pribadi,
            'status' => $request->status,
            'nik' => $request->nik,
            'jenis' => $request->jenis,
        ]);
        return redirect('admin/pemilik')->with('success', 'Berhasil Ditambahkan');
    }

    public function show(PemilikModel $pemilik)
    {
        $data['pemilik'] = $pemilik;
        return view('admin.pemilik.show', $data);
    }

    public function edit(PemilikModel $pemilik)
    {
        $data['pemilik'] = $pemilik;
        return view('admin.pemilik.edit', $data);
    }

    public function update(Request $request, $id)
    {
        // dd(request()->all());
        $request->validate([
            'nama' => ['required'],
            'email' => ['required'],
            'no_hp' => ['required'],
            'nib' => ['required'],
            'alamat_pribadi' => ['required'],
            'status' => ['required'],
            'nik' => ['required'],
            'jenis' => ['required']
        ]);
        $pemilik = PemilikModel::findorfail($id);
        $pemilik_data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'nib' => $request->nib,
            'alamat_pribadi' => $request->alamat_pribadi,
            'status' => $request->status,
            'nik' => $request->nik,
            'jenis' => $request->jenis,
        ];
        $pemilik->update($pemilik_data);
        return redirect('admin/pemilik')->with('success', 'Berhasil Di Ubah');
    }

    public function destroy( $id)
    {
        $pemilik = PemilikModel::find($id);
        $pemilik->delete();
        return redirect('admin/pemilik')->with('success','Data anda berhasil di Hapus');

    }

}
