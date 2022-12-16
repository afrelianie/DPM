<?php

namespace App\Imports;

use App\Models\PemilikModel as MasterDataPemilik;
use App\Models\PemilikModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class PemilikImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MasterDataPemilik([
            'nama'  => $row[1],
            'status'  => $row [2],
            'jenis' => $row[3],
            'nib' => $row[4],
            'nik' => $row[5],
            'email' => $row[6],
            'no_hp' => $row[7],
            'alamat_pribadi' =>$row[8],

        ]);
    }
}
