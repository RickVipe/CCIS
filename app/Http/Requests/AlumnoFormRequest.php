<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlumnoFormRequest extends FormRequest
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
            'dni'=>'required|min:3',
            'nombres'=>'required|min:3',
            'apellidos'=>'required|min:3',
            'fecha_nacimiento'=>'required',
            'email' => 'required',
            'direccion'=>'required|min:3',
            'apoderado'=>'required|min:3',
            'telefono'=>'required|min:3'

        ];
    }
}
