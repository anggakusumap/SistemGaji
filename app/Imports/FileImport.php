<?php

namespace App\Imports;

use App\Model\DetailGajipegawai;
use App\Model\Gajipegawai;
use App\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;


class FileImport implements  ToModel, WithHeadingRow, WithCalculatedFormulas
{
  

    // private $gaji;

    // public function __construct()
    // {
    //     // $this->gaji = Gajipegawai::latest()->pluck('id_gaji_pegawai')->get();
    //     $this->gaji = Gajipegawai::latest()->first()->id;
       

    // }

   /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    
    public function model(array $row)
    {
        $data = Gajipegawai::latest('id_gaji_pegawai')->first();
        $tes = $data->id_gaji_pegawai;

        $nama = User::where('nama',$row['nama'])->first();
        $id_pegawai = $nama->id_pegawai;

        return new DetailGajipegawai([
            'id_gaji_pegawai' => $tes,
            'id' => $id_pegawai,
            'nama' => $row['nama'],
            'gaji_pokok' => $row['gajipokok'],
            'tunjangan_istrisuami' => $row['tunjanganistri'],
            'tunjangan_anak' => $row['tunjangananak'],
            'tunjangan_umum' => $row['tunjanganumum'],
            'tunjangan_jabatan_struktural' => $row['tunjanganstruktural'],
            'tunjangan_jabatan_fungsional' => $row['tunjanganfungsional'],
            'pembulatan'=> $row['pembulatan'],
            'tunjangan_beras' => $row['tunjanganberas'],
            'tunjangan_pph' => $row['tunjanganpph'],
            'jumlah_kotor' => $row['jumlahkotor'],
            'iuran_wajib' => $row['iwp'],
            'bpjs' => $row['bpjs'],
            'pph_pasal_21' => $row['potonganpph'],
            'sewa_rumah' => $row['potongansewarumah'],
            'jumlah_potongan' => $row['jumlahpotongan'],
            'jumlah_bersih_gaji' => $row['bersih'],
            'jumlah_potongan_lainnya' => $row['penerimaanlainlain'],
            'penerimaan_total' => $row['penerimaantotal'],
            'tunjangan_kinerja' => $row['tunjangankinerja']
        ]);
    }

   

  
   
    // public function collection(Collection $rows)
    // {
    //     foreach ($rows as $row) 
    //     {
    //        $gaji = Gajipegawai::create([

    //        ]);
           
    //        $gaji->Detailgaji()->create([
    //             'nama' => $row['NAMA'],
    //             'gaji_pokok' => $row['GAJI POKOK'],
    //             'tunjangan_istrisuami' => $row['TUNJANGAN ISTRI'],
    //             'tunjangan_anak' => $row['TUNJANGAN ANAK'],
    //             'tunjangan_umum' => $row['TUNJANGAN UMUM'],
    //             'tunjangan_jabatan_struktural' => $row['TUNJANGAN STRUKTURAL'],
    //             'tunjangan_jabatan_fungsional' => $row['TUNJANGAN FUNGSIONAL'],
    //             'pembulatan'=> $row['PEMBULATAN'],
    //             'tunjangan_beras' => $row['TUNJANGAN BERAS'],
    //             'tunjangan_pph' => $row['TUNJANGAN PPH'],
    //             'jumlah_kotor' => $row['JUMLAH KOTOR'],
    //             'iuran_wajib' => $row['IWP'],
    //             'bpjs' => $row['BPJS'],
    //             'pph_pasal_21' => $row['POTONGAN PPH'],
    //             'sewa_rumah' => $row['POTONGAN SEWA RUMAH'],
    //             'jumlah_potongan' => $row['JUMLAH POTONGAN'],
    //             'jumlah_bersih_gaji' => $row['BERSIH'],
    //             'jumlah_potongan_lainnya' => $row['PENERIMAAN LAIN-LAIN'],
    //             'penerimaan_total' => $row['PENERIMAAN TOTAL'],
    //             'tunjangan_kinerja' => $row['TUNJANGAN KINERJA']
    //        ]);
    //     }
    // }

   
}
