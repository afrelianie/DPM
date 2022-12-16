<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\CategoryModel;
use App\Models\UmkmModel;
use App\Models\KecamatanModel;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Symfony\Contracts\Service\Attribute\Required;


class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->UmkmModel = new UmkmModel();
        // $this->KecamatanModel = new KecamatanModel();
        $this->CategoryModel = new CategoryModel();

    }

    public function index()
    {
        $category = [
            'category'=> $this->CategoryModel->AllData(),
        ];
        return view('admin.category.index', $category);
    }

    public function store(Request $request) {
        // dd($request->all());
        $request->validate([
            'name' => ['required'],
            'content' => ['required'],
            'image' => ['required']
        ]);
        $image = $request->image;
        $new_image = time() . $image->getClientOriginalName();
        $category = CategoryModel::create([
            'name' => $request->name,
            'content' => $request->content,
            'image' => 'public/uploads/' . $new_image,

        ]);
        $image->move('public/uploads/', $new_image);
        return back()->with('success', 'Berhasil Ditambahkan');

    }

    public function show($id_category)
    {
        $category = [
            'category'=> $this->CategoryModel->DetailData($id_category),
        ];
        return view('admin.category.show',$category);
    }

    public function update(Request $request, $id_category)
    {
        $request->validate(
            [
               'name' => 'required',
               'content' => 'required',
               'image' => 'max:1024',

            ],
            [
               'name.required' => 'Wajib di Isi !!!',
               'content.required' => 'Wajib di Isi !!!',
               'image.max' => 'Gambar Max 1024kb !!!',
            ]
           );

        if (Request()->image <> "")
           {
               $category = $this->CategoryModel->DetailData($id_category);
               if ($category->image <> "") {
                   unlink(public_path('/') . '/' . $category->image);

               }
               // Jika ingin ganti gambar
               $image = Request()->image;
               $new_image = time().$image->getClientOriginalName();
               $image->move('public/uploads/', $new_image);
               $data = [
                   'name' => Request()->name,
                   'content' => Request()->content,
                   'image' => 'public/uploads/' . $new_image,
               ];
            $this->CategoryModel->UpdateData($id_category, $data);

        } else {
               // Jika tidak ganti icon
               $data = [
                   'name' => Request()->name,
                   'content' => Request()->content,
               ];
            $this->CategoryModel->UpdateData($id_category, $data);
           }

        return redirect('admin/category')->with('success','Data Maps Umkm anda berhasil di Update');
    }

       public function delete($id_category)
       {
        $category = $this->CategoryModel->DetailData($id_category);
            if ($category->image <> "") {
                unlink(public_path('/') . '/' . $category->image);
            }
        $this->CategoryModel->DeleteData($id_category);
        return redirect('admin/category')->with('success','Data anda berhasil di Hapus');

       }
}
