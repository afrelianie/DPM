<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Imports\UmkmImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\KecamatanModel;
use App\Models\UmkmModel;
use App\Models\CategoryModel;
use App\Models\PemilikModel;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Symfony\Contracts\Service\Attribute\Required;


class UmkmController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->UmkmModel = new UmkmModel();
        $this->KecamatanModel = new KecamatanModel();
        $this->CategoryModel = new CategoryModel();
        $this->PemilikModel = new PemilikModel();

    }

    public function index()
    {
        $umkm = [
            'umkm'=> $this->UmkmModel->AllData(),
        ];
        return view('admin.umkm.index', $umkm);
    }


    // public function __invoke(Request $request)
    // {
    //     $this->validate($request, [
    //         'file' => 'required|mimes:csv,xls,xlsx'
    //     ]);
    //     $file = $request->file('file');

    //     // membuat nama file unik
    //     $nama_file = $file->hashName();

    //     //temporary file
    //     $path = $file->storeAs('public/excel', $nama_file);
    //     // import data
    //     $filepath = public_path('app/public/excel/' . $nama_file);
    //     $import = Excel::import(new UmkmImport(), $filepath);

    //     //remove from server
    //     Storage::delete($path);

    //     if ($import) {
    //         //redirect
    //         return redirect('admin/umkm')->with(['success' => 'Data Berhasil Diimport!']);
    //     }
    // }


    public function create()
    {
        $umkm = [
            'umkm'=> $this->UmkmModel->AllData(),
            'kecamatan'=> $this->KecamatanModel->AllData(),
            'category'=> $this->CategoryModel->AllData(),
            'pemilik'=> $this->PemilikModel->AllData(),
        ];
        return view('admin.umkm.create', $umkm);
    }

    public function show($id_umkm)
    {
        $umkm = [
            'umkm'=> $this->UmkmModel->DetailData($id_umkm),
            'kecamatan'=> $this->KecamatanModel->AllData(),
            'category'=> $this->CategoryModel->AllData(),
            'pemilik'=> $this->PemilikModel->AllData(),
        ];
        return view('admin.umkm.show',$umkm);
    }


    public function edit($id_umkm)
    {
        $umkm = [
            'umkm'=> $this->UmkmModel->DetailData($id_umkm),
            'kecamatan'=> $this->KecamatanModel->AllData(),
            'category'=> $this->CategoryModel->AllData(),
            'pemilik'=> $this->PemilikModel->AllData(),
        ];
        return view('admin.umkm.edit',$umkm);
    }

    // public function store(Request $request) {
    // // dd($request->all());
    // $request->validate([
    //     'umkm' => ['required'],
    //     'id_pemilik' => ['required'],
    //     'id_category' => ['required'],
    //     'id_kecamatan' => ['required'],
    //     'kbli' => ['required'],
    //     'sektor' => ['required'],
    //     'alamat' => ['required'],
    //     'lokasi' => ['required'],
    //     'deskripsi' => ['required'],
    //     'tahun' => ['required'],
    //     'tki' => ['required'],
    //     'foto' => ['required'],
    //     'photo' => ['required']
    // ]);
    // $image = $request->foto;
    // $new_image = time() . $image->getClientOriginalName();
    // $umkm = UmkmModel::create([
    //     'umkm' => $request->umkm,
    //     'id_pemilik' => $request->id_pemilik,
    //     'id_category' => $request->id_category,
    //     'id_kecamatan' => $request->id_kecamatan,
    //     'kbli' => $request->kbli,
    //     'sektor' => $request->sektor,
    //     'alamat' => $request->alamat,
    //     'lokasi' => $request->lokasi,
    //     'deskripsi' => $request->deskripsi,
    //     'tahun' => $request->tahun,
    //     'tki' => $request->tki,
    //     'foto' => 'app/umkm/' . $new_image,
    //     'photo' => 'app/umkm/' . $new_image,

    // ]);
    // $image->move('app/umkm/', $new_image);
    // return redirect('admin/umkm')->with('success', 'Berhasil Ditambahkan');
    // }



    public function store(Request $request)
    {
        // dd ($extensi, $namafile);
        $request->validate([
            'umkm' => ['required'],
            'id_pemilik' => ['required'],
            'id_category' => ['required'],
            'id_kecamatan' => ['required'],
            'kbli' => ['required'],
            'sektor' => ['required'],
            'alamat' => ['required'],
            'lokasi' => ['required'],
            'deskripsi' => ['required'],
            'tahun' => ['required'],
            'tki' => ['required'],
            'photo' => ['required'],
            'foto' => ['required']
        ]);

        $randomStr = Str::random(5);
        $randomStr1 = Str::random(6);
        $ds = public_path("app/umkm");

        $extensi = $request->file('foto')->getClientOriginalExtension();
        $namafile = $request->file('foto')->getClientOriginalName();

        $umkm = new UmkmModel;
        $umkm->umkm = $request->umkm;
        $umkm->id_pemilik = $request->id_pemilik;
        $umkm->id_category = $request->id_category;
        $umkm->id_kecamatan = $request->id_kecamatan;
        $umkm->kbli = $request->kbli;
        $umkm->sektor = $request->sektor;
        $umkm->alamat = $request->alamat;
        $umkm->lokasi = $request->lokasi;
        $umkm->deskripsi = $request->deskripsi;
        $umkm->tahun = $request->tahun;
        $umkm->tki = $request->tki;
        $umkm->foto = $request->foto;
        $umkm->photo = $request->tki;


        // HeandleFotoumkm
        $foto = $request->file('foto');
        $fo = $randomStr.'.'.$foto->extension();
        $uf = $foto->move($ds, $fo);

        $photo = $request->file('photo');
        $ph = $randomStr1.'.'.$photo->extension();
        $up = $photo->move($ds, $ph);

        $umkm->foto = 'app/umkm/'.$fo;
        $umkm->photo = 'app/umkm/'.$ph;

        $umkm->save();

        return redirect('admin/umkm')->with('success', 'Berhasil Ditambahkan');

    }



    public function update(Request $request, $id_umkm)
    {

    if (Request()->foto <> "")
    {
        $umkm = $this->UmkmModel->DetailData($id_umkm);
        if ($umkm->foto <> "") {
            unlink(public_path('/') . '/' . $umkm->foto);

        }
        // Jika ingin ganti gambar
        $image = Request()->foto;
        $new_image = time().$image->getClientOriginalName();
        $image->move('app/umkm/', $new_image);
        $data = [
            'umkm' => Request()->umkm,
            'id_pemilik' => Request()->id_pemilik,
            'id_category' => Request()->id_category,
            'id_kecamatan' => Request()->id_kecamatan,
            'alamat' => Request()->alamat,
            'lokasi' => Request()->lokasi,
            'deskripsi' => Request()->deskripsi,
            'tahun' => Request()->tahun,
            'tki' => Request()->tki,
            'foto' => 'app/umkm/' . $new_image,
        ];
        $this->UmkmModel->UpdateData($id_umkm, $data);

    }
    if (Request()->photo <> "")
    {
        $umkm = $this->UmkmModel->DetailData($id_umkm);
        if ($umkm->photo <> "") {
            unlink(public_path('/') . '/' . $umkm->photo);

        }
        // Jika ingin ganti gambar
        $image = Request()->photo;
        $new_image = time().$image->getClientOriginalName();
        $image->move('app/umkm/', $new_image);
        $data = [
            'umkm' => Request()->umkm,
            'id_pemilik' => Request()->id_pemilik,
            'id_category' => Request()->id_category,
            'id_kecamatan' => Request()->id_kecamatan,
            'alamat' => Request()->alamat,
            'lokasi' => Request()->lokasi,
            'deskripsi' => Request()->deskripsi,
            'tahun' => Request()->tahun,
            'tki' => Request()->tki,
            'photo' => 'app/umkm/' . $new_image,
        ];
        $this->UmkmModel->UpdateData($id_umkm, $data);

    }else {
        // Jika tidak ganti icon
        $data = [
            'umkm' => Request()->umkm,
            'id_pemilik' => Request()->id_pemilik,
            'id_category' => Request()->id_category,
            'id_kecamatan' => Request()->id_kecamatan,
            'alamat' => Request()->alamat,
            'lokasi' => Request()->lokasi,
            'deskripsi' => Request()->deskripsi,
            'tahun' => Request()->tahun,
            'tki' => Request()->tki,
        ];
        $this->UmkmModel->UpdateData($id_umkm, $data);
    }

   return redirect('admin/umkm')->with('success','Data UMKM anda berhasil di Update');
}




    public function delete($id_umkm)
    {

        $umkm = $this->UmkmModel->DetailData($id_umkm);
        if ($umkm->foto <> "") {
            unlink(public_path('/') . '/' . $umkm->foto);
        }
        if ($umkm->photo <> "") {
            unlink(public_path('/') . '/' . $umkm->photo);
        }
        $this->UmkmModel->DeleteData($id_umkm);
        return redirect('admin/umkm')->with('success','Data anda berhasil di Hapus');

    }







}





