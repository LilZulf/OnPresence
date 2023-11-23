<?php

namespace App\Imports;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class SiswaImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $indexKe = 1;
        foreach($collection as $row){
            if($indexKe > 1){
                $data ['nama'] = $row[2];
                $data ['nisn'] = $row[1];
                $kelas = Kelas::where('nama_kelas', $row[3])->first();
                if($kelas){
                    $data['id_kelas'] = $kelas->id; 
                }
                $data ['jenis_kelamin'] = $row[4];

                 Siswa::create($data);
            }
            $indexKe++;
        }
    }
}
