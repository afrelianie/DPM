<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KecamatanModel extends Model
{

    protected $table = 'tbl_kecamatan';
    protected $guarded =['id_kecamatan'];


    public function products(){
    return $this->belongsTo('App\Models\KecamatanModel');
    }


    public function AllData()
    {
       return DB::table('tbl_kecamatan')->get();
    }

    public function StoreData($data)
    {
       DB::table('tbl_kecamatan')->store($data);
    }

    public function DetailData($id_kecamatan)
    {
        return DB::table('tbl_kecamatan')
            ->where('id_kecamatan', $id_kecamatan)->first();
    }

    public function UpdateData($id_kecamatan, $data)
    {
        DB::table('tbl_kecamatan')
            ->where('id_kecamatan', $id_kecamatan)
            ->update($data);
    }

    public function DeleteData($id_kecamatan)
    {
        DB::table('tbl_kecamatan')
            ->where('id_kecamatan', $id_kecamatan)
            ->delete();
    }


}
