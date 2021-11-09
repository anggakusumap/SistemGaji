<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MasterGrade extends Model
{
    protected $table = "tb_master_grade";

    protected $primaryKey = 'id_grade';

    protected $fillable = [
        'nama_grade',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;
    
    
}
