<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
            'nip'                      => 'required|unique:teachers,nip',
            'name'                     => 'required|min:4|max:100',
            'start_year'               => 'required|numeric|digits:4',
            'gender'                   => 'required',
            'email'                    => 'required|email|unique:teachers,email',
            'password'                 => 'required|min:8|same:confirmation_password',
            'confirmation_password'    => 'required'
        ];
    }
    public function messages()
    {
        return [
            'nip.required'                      => 'Nomor Induk Pegawai tidak boleh kosong',
            'nip.unique'                        => 'Nomor Induk Pegawai ini telah terdaftar',
            'name.required'                     => 'Nama tidak boleh kosong. Minimal 4 dan maximal 100 karakter',
            'name.min'                          => 'Nama minimal 4 karakter',
            'name.max'                          => 'Nama maximal 100 karakter',
            'start_year.required'               => 'Tahun masuk tidak boleh kosong',
            'start_year.numeric'                => 'Tahun masuk wajib menggunakan angka',
            'start_year.digits'                 => 'Tahun masuk harus sesuai standar. Misal: 2015',
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
