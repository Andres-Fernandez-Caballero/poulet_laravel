<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutorCreateFormRequest extends FormRequest
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
            'nombre'=> 'required|string',
            'apellido' => 'required|string',
            'imagen'=> 'file|mimes:jpeg,png,gif',
            'biografia'=> 'required|string|max:200',
        ];
    }
    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre es obligatorio',
            'apellido.required' => 'El campo apellido es obligatorio',
            'imagen.mimes' => 'Tipo de imagen no admitido',
            'biografia.required' => 'Debe ingresar la biografia'
        ];
    }
}
