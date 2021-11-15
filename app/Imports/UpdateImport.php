<?php

namespace App\Imports;

use App\Model\DetailGajipegawai;
use App\Model\Gajipegawai;
use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UpdateImport implements ToModel, WithHeadingRow, WithCalculatedFormulas, WithChunkReading
{
   
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {   
        return new DetailGajipegawai([
            'jumlah_potongan_lainnya' => $row['penerimaanlainlain']?? 0,
        ]);
    }

    public function chunkSize(): int
    {
        return 200;
    }
}
