<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'name'                     => 'required|min:4|max:30',
            'classroom_id'             => 'required',
            'teacher_id'               => 'required',
        ];
    }

    public function message()
    {
        return [
            'name.min'                          => 'Nama minimal 4 karakter',
            'name.max'                          => 'Nama maximal 30 karakter',
            'classroom_id.required'             => 'Kelas tidak boleh kosong',
            'teacher_id.required'               => 'Nama Guru tidak boleh kosong',
        ];
    }
}
