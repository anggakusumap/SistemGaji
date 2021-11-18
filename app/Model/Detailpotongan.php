<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detailpotongan extends Model
{
    protected $table = "tb_detail_potongan_tukin";

    protected $primaryKey = 'id_potongan_tukin';

    protected $fillable = [
        'id_detail_gaji',
        'nama_potongan_tukin',
        'jumlah_potongan=_tukin',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;

    public function Detailgaji(){
        return $this->belongsTo(DetailGajipegawai::class, 'id_detail_gaji','id_detail_gaji');
    }
}
