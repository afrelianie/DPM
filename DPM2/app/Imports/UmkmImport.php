<?php

namespace App\Imports;

use App\Models\UmkmModel as MasterDataUmkm;
use App\Models\UmkmModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UmkmImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MasterDataUmkm([
            'id_pemilik'  => $row[1],
            'umkm'  => $row [2],
            'id_category' => $row[3],
            'skala' => $row[4],
            'investasi' => $row[5],
            'tki' => $row[6],
            'alamat' => $row[7],
            'id_kecamatan' =>$row[8],
            'lokasi' =>$row[9],

        ]);
    }
}
