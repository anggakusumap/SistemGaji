<?php

namespace App\Http\Requests\Request;

use Illuminate\Foundation\Http\FormRequest;

class Graderequest extends FormRequest
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
            'nama_grade' => 'required|unique:tb_master_grade,nama_grade',
        ];
    }

    public function messages()
    {
        return [
            'nama_grade.required' => 'Error! Anda Belum Mengisi Grade',
            'nama_grade.unique' => 'Error! Grade Gaji Sudah Ada',
        ];
    }
}
