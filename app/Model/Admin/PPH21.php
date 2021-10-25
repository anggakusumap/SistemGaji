<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class PPH21 extends Model
{
    protected $table = "tb_master_pph21";

    protected $primaryKey = 'id_pph';

    protected $fillable = [
        'nama_pph',
        'persentase',
        'kumulatif_tahunan',
        'besaran_ptkp',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;
}
