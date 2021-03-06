<?php

namespace App\Imports;

use App\Model\DetailGajipegawai;
use App\Model\Gajipegawai;
use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class FileImport implements  
        ToModel, 
        WithHeadingRow, 
        WithCalculatedFormulas, 
        WithBatchInserts,
        WithChunkReading
{
  
   /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
  
    public function model(array $row)
    {
        $data = Gajipegawai::latest('id_gaji_pegawai')->first();
        $tes = $data->id_gaji_pegawai;

        $user = User::where('nama_pegawai', $row['nama'])->first();
      
        // $temp = 0;
        // foreach($row['penerimaantotal'] as $das){
        //     $temp = $temp + $das;
        // }

        // $data->grand_total_gaji = $temp;
        // $data->save();

        return new DetailGajipegawai([
            'id_gaji_pegawai' => $tes,
            'id' => $user->id ?? null,
            'nama' => $row['nama'],
            'gaji_pokok' => $row['gajipokok'] ?? 0,
            'tunjangan_istrisuami' => $row['tunjanganistri'] ?? 0,
            'tunjangan_anak' => $row['tunjangananak']?? 0,
            'tunjangan_umum' => $row['tunjanganumum']?? 0,
            'tunjangan_jabatan_struktural' => $row['tunjanganstruktural']?? 0,
            'tunjangan_jabatan_fungsional' => $row['tunjanganfungsional']?? 0,
            'pembulatan'=> $row['pembulatan']?? 0,
            'tunjangan_beras' => $row['tunjanganberas']?? 0,
            'tunjangan_pph' => $row['tunjanganpph']?? 0,
            'jumlah_kotor' => $row['jumlahkotor']?? 0,
            'iuran_wajib' => $row['iwp']?? 0,
            'bpjs' => $row['bpjs']?? 0,
            'pph_pasal_21' => $row['potonganpph']?? 0,
            'sewa_rumah' => $row['potongansewarumah']?? 0,
            'jumlah_potongan' => $row['jumlahpotongan']?? 0,
            'jumlah_bersih_gaji' => $row['bersih']?? 0,
            'jumlah_potongan_lainnya' => $row['penerimaanlainlain']?? 0,
            'penerimaan_total' => $row['penerimaantotal']?? 0,
            'tunjangan_kinerja' => $row['tunjangankinerja']?? 0,
            'potongan_absen' => $row['potongan_absen']?? 0,
            'potongan_absen_persen' => $row['potongan_absen_persen']?? 0,
            'tunj_setelah_pot_absen' => $row['tunjangan_setelah_potongan_absen']?? 0,
            'potongan_dana_punia' => $row['potongan_dana_punia']?? 0,
            'potongan_mushola' => $row['potongan_mushola']?? 0,
            'potongan_nasrani'=> $row['potongan_nasrani']?? 0,
            'potongan_ar'=> $row['potongan_ar']?? 0,
            'potongan_bpd'=> $row['potongan_bpd']?? 0,
            'potongan_bjb'=> $row['potongan_bjb']?? 0,
            'potongan_cakti_buddhi_bhakti'=> $row['potongan_cakti_buddhi_bhakti']?? 0,
            'potongan_anak_asuh'=> $row['potongan_anak_asuh']?? 0,
            'potongan_futsal'=> $row['potongan_futsal']?? 0,
            'potongan_umum'=> $row['potongan_umum']?? 0,
            'potongan_paguyuban'=> $row['potongan_paguyuban']?? 0,
            'potongan_pinjaman_cbb'=> $row['potongan_pinjaman_cbb']?? 0,
            'potongan_kop_bali_sedana'=> $row['potongan_kop_bali_sedana']?? 0,
            'potongan_jumlah'=> $row['potongan_jumlah']?? 0,
            'tukin_setelah_potongan2'=> $row['tukin_setelah_potongan2']?? 0,
            'rapel_tukin'=> $row['rapel_tukin']?? 0,
            'tukin_dibayarkan'=> $row['tukin_dibayarkan']?? 0,
        ]);

        

        
    }

    public function batchSize(): int
    {
        return 200;
    }

    public function chunkSize(): int
    {
        return 100;
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
