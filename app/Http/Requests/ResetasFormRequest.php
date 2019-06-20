<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetasFormRequest extends FormRequest
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
            'titulo'=> 'required|string',
            'imagen'=> 'file|mimes:jpeg,png',
            'preparacion'=> 'required|string|max:200',
            'fk_autor'=> 'required|exists:autores,id_autor',
            'categoria'=> 'required|string',
            'dificultad'=> 'required|string',
            'tiempo_preparacion'=> 'required|string',
        ];
    }
}
