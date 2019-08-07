<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactoRequest extends FormRequest
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
            'apellido'=> 'required|string',
            'mail'=> 'required|regex:/^.+@.+$/i|string',
            'comentario'=> 'required|string|max:200',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo tipo titulo es obligatorio',
            'apellido.required' => 'El campo tipo titulo es obligatorio',
            'mail.required' => 'El campo tipo titulo es obligatorio',
            'comentario.required' => 'El campo tipo titulo es obligatorio',
        ];
    }
}
