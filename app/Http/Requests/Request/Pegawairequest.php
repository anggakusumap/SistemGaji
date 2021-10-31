<?php

namespace App\Http\Requests\Request;

use Illuminate\Foundation\Http\FormRequest;

class Pegawairequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama_pegawai' => 'required|unique:users,nama_pegawai|min:4|max:40',
            'nip_pegawai' => 'required|unique:users,nip_pegawai|min:18|max:18',
            'jenis_kelamin' => 'required|string|in:Laki-Laki,Perempuan',
            'pangkat' => 'required|string',
            'golongan' => 'required|string',
            'username' => 'required|unique:users,username|min:6|max:12',
            'password' => 'required|min:6|max:12',
            'email' => 'required|email|unique:users,email',
        
        ];
    }

    public function messages()
    {
        return [
            'nama_pegawai.required' => 'Error! Anda Belum Mengisi Nama Pegawai',
            'nama_pegawai.unique' => 'Error! Nama Pegawai Sudah Ada',
            'nama_pegawai.min' => 'Error! Character Minimal :min digit',
            'nama_pegawai.max' => 'Error! Character Maximal :max digit',

            'nip_pegawai.required' => 'Error! Anda Belum Mengisi NIP Pegawai',
            'nip_pegawai.unique' => 'Error! NIP Pegawai Sudah Ada',
            'nip_pegawai.min' => 'Error! Character Minimal :min digit',
            'nip_pegawai.max' => 'Error! Character Maximal :max digit',

            'jenis_kelamin.required' => 'Error! Anda Belum Mengisi Jenis Kelamin',
            'pangkat.required' => 'Error! Anda Belum Mengisi Pangkat Pegawai',
            'golongan.required' => 'Error! Anda Belum Mengisi Golongan Pegawai',

            'username.required' => 'Error! Anda Belum Mengisi Username Pegawai',
            'username.unique' => 'Error! Username Pegawai Sudah Ada',
            'username.min' => 'Error! Character Minimal :min digit',
            'username.max' => 'Error! Character Maximal :max digit',

            'password.required' => 'Error! Anda Belum Mengisi Passowrd Pegawai',
            'password.min' => 'Error! Character Minimal :min digit',
            'password.max' => 'Error! Character Maximal :max digit',

            'email.required' => 'Error! Anda Belum Mengisi Email Pegawai',
            'email.unique' => 'Error! Email Pegawai Sudah Ada',
            'email.email' => 'Error! Harus Berisikan Character Email @',

        ];
    }
}
