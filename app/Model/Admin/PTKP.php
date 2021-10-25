<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class PTKP extends Model
{
    protected $table = "tb_master_ptkp";

    protected $primaryKey = 'id_ptkp';

    protected $fillable = [
        'kode_ptkp',
        'nama_ptkp',
        'besaran_ptkp',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;
}
