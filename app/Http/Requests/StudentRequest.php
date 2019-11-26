<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
             'nisn'                     => 'required|unique:teachers,nisn',
             'name'                     => 'required|min:4|max:100',
             'start_year'               => 'required|numeric|digits:4',
             'classroom_id'             => 'required',
             'school_year_id'           => 'required',
             'gender'                   => 'required',
             'email'                    => 'required|email|unique:teachers,email',
             'password'                 => 'required|min:8|same:confirmation_password',
             'confirmation_password'    => 'required'
         ];
     }
     public function messages()
     {
         return [
             'nisn.required'                     => 'Nomor Induk Siswa Nasional tidak boleh kosong',
             'nisn.unique'                       => 'Nomor Induk Siswa Nasional ini telah terdaftar',
             'name.required'                     => 'Nama tidak boleh kosong. Minimal 4 dan maximal 100 karakter',
             'name.min'                          => 'Nama minimal 4 karakter',
             'name.max'                          => 'Nama maximal 100 karakter',
             'start_year.required'               => 'Tahun masuk tidak boleh kosong',
             'start_year.numeric'                => 'Tahun masuk wajib menggunakan angka',
             'start_year.digits'                 => 'Tahun masuk harus sesuai standar. Misal: 2015',
             'classroom_id.required'             => 'Kelas tidak boleh kosong',
             'school_year_id.required'           => 'Tahun Ajaran tidak boleh kosong',
             'gender.required'                   => 'Jenis Kelamin tidak boleh kosong',
             'email.required'                    => 'Email tidak boleh kosong',
             'email.email'                       => 'Email harus sesuai standar. Misal: fulan@email.com',
             'email.unique'                      => 'Email ini telah terdaftar',
             'password.required'                 => 'Password tidak boleh kosong',
             'password.min'                      => 'Password minimal 8 karakter',
             'password.same'                     => 'Password tidak sama',
             'confirmation_password.required'    => 'Konfirmasi Password tidak boleh kosong',
         ];
     }
}
