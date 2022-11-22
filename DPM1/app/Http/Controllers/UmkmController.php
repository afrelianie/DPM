<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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

    public function store(Request $request) {
     // dd($request->all());
    $request->validate([
        'umkm' => ['required'],
        'id_pemilik' => ['required'],
        'id_category' => ['required'],
        'id_kecamatan' => ['required'],
        'alamat' => ['required'],
        'lokasi' => ['required'],
        'deskripsi' => ['required'],
        'foto' => ['required']
    ]);
    $image = $request->foto;
    $new_image = time() . $image->getClientOriginalName();
    $umkm = UmkmModel::create([
        'umkm' => $request->umkm,
        'id_pemilik' => $request->id_pemilik,
        'id_category' => $request->id_category,
        'id_kecamatan' => $request->id_kecamatan,
        'alamat' => $request->alamat,
        'lokasi' => $request->lokasi,
        'deskripsi' => $request->deskripsi,
        'foto' => 'public/uploads/' . $new_image,

    ]);
    $image->move('public/uploads/', $new_image);
    return redirect('admin/umkm')->with('success', 'Berhasil Ditambahkan');
    }


    public function update(Request $request, $id_umkm)
    {
        $request->validate(
            [
            'umkm' => 'required',
            'id_pemilik' => 'required',
            'id_category' => 'required',
            'id_kecamatan' => 'required',
            'alamat' => 'required',
            'lokasi' => 'required',
            'deskripsi' => 'required',
            'foto' => 'max:1024',

            ],
            [
            'umkm.required' => 'Wajib di Isi !!!',
            'id_pemilik.required' => 'Wajib di Isi !!!',
            'id_category.required' => 'Wajib di Isi !!!',
            'id_kecamatan.required' => 'Wajib di Isi !!!',
            'alamat.required' => 'Wajib di Isi !!!',
            'lokasi.required' => 'Wajib di Isi !!!',
            'deskripsi.required' => 'Wajib di Isi !!!',
            'foto.max' => 'Gambar Max 1024kb !!!',
            ]
        );

        if (Request()->foto <> "")
        {
            $umkm = $this->UmkmModel->DetailData($id_umkm);
            if ($umkm->foto <> "") {
                unlink(public_path('/') . '/' . $umkm->foto);

            }
            // Jika ingin ganti gambar
            $image = Request()->foto;
            $new_image = time().$image->getClientOriginalName();
            $image->move('public/uploads/', $new_image);
            $data = [
                'umkm' => Request()->umkm,
                'id_pemilik' => Request()->id_pemilik,
                'id_category' => Request()->id_category,
                'id_kecamatan' => Request()->id_kecamatan,
                'alamat' => Request()->alamat,
                'lokasi' => Request()->lokasi,
                'deskripsi' => Request()->deskripsi,
                'foto' => 'public/uploads/' . $new_image,
            ];
            $this->UmkmModel->UpdateData($id_umkm, $data);

        } else {
            // Jika tidak ganti icon
            $data = [
                'umkm' => Request()->umkm,
                'id_pemilik' => Request()->id_pemilik,
                'id_category' => Request()->id_category,
                'id_kecamatan' => Request()->id_kecamatan,
                'alamat' => Request()->alamat,
                'lokasi' => Request()->lokasi,
                'deskripsi' => Request()->deskripsi,
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
        $this->UmkmModel->DeleteData($id_umkm);
        return redirect('admin/umkm')->with('success','Data anda berhasil di Hapus');

    }







}





