<?php

namespace App\Model;

use App\Model\Admin\Pegawai;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailGajipegawai extends Model
{
    protected $table = "tb_detail_gaji_pegawai";

    protected $primaryKey = 'id_detail_gaji';

    protected $fillable = [
        'id_gaji_pegawai',
        'id',
        'gaji_pokok',
        'tunjangan_istrisuami',
        'tunjangan_anak',
        'tunjangan_jabatan_struktural',
        'tunjangan_jabatan_fungsional',
        'tunjangan_umum',
        'tunjangan_beras',
        'tunjangan_pph',
        'pembulatan',
        'jumlah_kotor',
        'iuran_wajib',
        'bpjs',
        'sewa_rumah',
        'pph_pasal_21',
        'jumlah_potongan',
        'jumlah_bersih_gaji',
        'potongan_lainnya',
        'jumlah_potongan_lainnya',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;

    public function User(){
        return $this->belongsTo(User::class,'id','id');
    }
    
    public function Gaji(){
        return $this->belongsTo(Gajipegawai::class,'id_gaji_pegawai','id_gaji_pegawai');
    }
}
