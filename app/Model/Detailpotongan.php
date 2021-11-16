<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Detailpotongan extends Model
{
    protected $table = "tb_detail_potongan";

    protected $primaryKey = 'id_potongan';

    protected $fillable = [
        'id_detail_gaji',
        'nama_potongan_utama',
        'jumlah_potongan_utama',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;

    public function Detailgaji(){
        return $this->belongsTo(DetailGajipegawai::class, 'id_detail_gaji','id_detail_gaji');
    }
}
