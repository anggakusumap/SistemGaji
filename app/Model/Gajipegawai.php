<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Gajipegawai extends Model
{
    protected $table = "tb_gaji_pegawai";

    protected $primaryKey = 'id_gaji_pegawai';

    protected $fillable = [
        'bulan_gaji',
        'grand_total_gaji',
        'status_penerimaan_lain',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;

    public function Detailpegawai()
    {
        return $this->belongsToMany(User::class,'tb_detail_gaji_pegawai','id_gaji_pegawai','id')
                    ->withPivot('gaji_pokok','tunjangan_istrisuami','tunjangan_anak','tunjangan_jabatan_struktural','tunjangan_jabatan_fungsional',
                    'tunjangan_umum','tunjangan_beras','tunjangan_pph','pembulatan','jumlah_kotor','iuran_wajib','bpjs','sewa_rumah','pph_pasal_21',
                    'jumlah_potongan','jumlah_bersih_gaji','tunjangan_kinerja','jumlah_potongan_lainnya','penerimaan_total','nama',
                    'potongan_absen','potongan_absen_persen','tunj_setelah_pot_absen','potongan_dana_punia','potongan_mushola','potongan_nasrani',
                    'potongan_ar', 'potongan_bpd','potongan_bjb','potongan_cakti_buddhi_bhakti','potongan_anak_asuh','potongan_futsal',
                    'potongan_umum','potongan_paguyuban','potongan_pinjaman_cbb','potongan_kop_bali_sedana','potongan_jumlah',
                    'tukin_setelah_potongan2','rapel_tukin','tukin_dibayarkan');
    }
    public function Detailgaji(){
        return $this->hasMany(DetailGajipegawai::class, 'id_gaji_pegawai');
    }
}
