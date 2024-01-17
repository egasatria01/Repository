<?php

namespace App\Imports;

use App\Models\Dosen;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class DosenImport implements withHeadingRow, ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Dosen([
            'nip' => $row['nip'],
            'nama' => $row['nama'],
            'alamat' => $row['alamat'],
            'email' => $row['email'],
            'tanggalLahir' => $row['tanggalLahir'],
            'kontak' => $row['kontak'],
            'programStudi' => $row['programStudi'],
            'jabatan' => $row['jabatan'],
        ]);
    }
}
