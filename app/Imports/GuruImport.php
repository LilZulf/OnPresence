<?php

namespace App\Imports;

use App\Models\Guru;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class GuruImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $indexKe = 1;
        foreach($collection as $row){
            if($indexKe > 1){
                $data ['nama_guru'] = $row[1];
                $data ['nip'] = $row[2];
                $data ['alamat'] = $row[3];
                $data ['jenis_kelamin'] = $row[4];
                $data ['username'] = $row[5];
                $data ['password'] = $row[6];

                 Guru::create($data);
            }
            $indexKe++;
        }
    }
}
