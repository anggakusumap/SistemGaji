<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{

    protected $table = "tb_master_pegawai";

    protected $primaryKey = 'id_pegawai';

    protected $fillable = [
        'id_jabatan',
        'id_ptkp',
        'id_golongan',
        'id_unit_kerja',
        'id_bank',
        'username',
        'password',
        'email',
        'role',
        'nama_pegawai',
        'nip_pegawai',
        'nik_pegawai',
        'npwp_pegawai',
        'jenis_kelamin',
        'alamat',
        'agama',
        'no_telp',
        'no_rek'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;
}
