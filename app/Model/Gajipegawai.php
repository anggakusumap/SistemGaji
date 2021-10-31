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
        'status_penerimaan',
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
                    'jumlah_potongan','jumlah_bersih_gaji','tunjangan_kinerja','jumlah_potongan_lainnya','penerimaan_total','nama');
    }
    public function Detailgaji(){
        return $this->hasMany(DetailGajipegawai::class, 'id_gaji_pegawai');
    }
}
