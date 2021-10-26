<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Unitkerja extends Model
{
    protected $table = "tb_master_unit_kerja";

    protected $primaryKey = 'id_unit_kerja';

    protected $fillable = [
        'nama_unit',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;
}
