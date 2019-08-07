<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecetaUpdateRequest extends FormRequest
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
            'imagen'=> 'file|mimes:jpeg,png,gif',
            'preparacion'=> 'required|string|max:200',
            'fk_autor'=> 'required|exists:autores,id_autor',
            'categoria'=> 'required|exists:recetas,categoria',
            'dificultad'=> 'required|exists:recetas,dificultad',
            'tiempo_preparacion'=> 'required|exists:recetas,tiempo_preparacion',
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'El campo tipo titulo es obligatorio',
            'imagen.mimes' => 'Timpo de imagen no admitido',
            'fk_autor.exists' => 'Seleccione una opcion en el campo Autor',
            'categoria.exists' => 'Seleccione una opcion en el campo Categoria',
            'dificultad.exists' => 'Seleccione una opcion en el campo Dificultad',
            'tiempo_preparacion.exists' => 'Seleccione una opcion en el campo Tiempo',
            'preparacion.required' => 'Debe ingresar la preparacion'
        ];
    }

}
