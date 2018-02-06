<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Salon_HorarioFormRequest extends FormRequest
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
          'nro_salon'=>'required|integer',
          'dia'=>'required',
          'hora_inicial'=>'required',
          'hora_final'=>'required',
          'id_curso'=>'required',

            //
        ];
    }
}
