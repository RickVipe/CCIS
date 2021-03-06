<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GradoFormRequest extends FormRequest
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
          'nro'=>'required|integer|between:1,6',
          'seccion'=>'required|min:1|max:1',
          'nivel'=>'required',
          'anio_academico'=>'required',
          'vacantes'=>'required|integer',
      ];
    }
}
