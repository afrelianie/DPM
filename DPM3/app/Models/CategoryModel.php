<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class CategoryModel extends Model
{
    protected $table = 'tbl_category';
    protected $guarded =['id_category'];

    public function products(){
    return $this->belongsTo('App\Models\CategoryModel');
    }

    public function AllData()
    {
       return DB::table('tbl_category')->get();
    }

    public function StoreData($data)
    {
       DB::table('tbl_category')->store($data);
    }

    public function DetailData($id_category)
    {
        return DB::table('tbl_category')
            ->where('id_category', $id_category)->first();
    }

    public function UpdateData($id_category, $data)
    {
        DB::table('tbl_category')
            ->where('id_category', $id_category)
            ->update($data);
    }

    public function DeleteData($id_category)
    {
        DB::table('tbl_category')
            ->where('id_category', $id_category)
            ->delete();
    }



}

