<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        /* 
            AQUI PODRIA REALIZAR ALGÚN TIPO DE VALIDACIÓN INDICANDO SI EL USUARIO TIENE
            PERMISOS PARA CREAR EL RECURSO, EN ESTE CASO SOLO DEVUELVO EL true PARA INDICAR
            QUE CUALQUIER USUARIO PUEDE CREAR EL RECURSO
        */
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
            'nombre' => [
                'required', 
                'min:3', 
                Rule::unique('projects')->ignore( $this->route('project') ),
                /* 
                    OBTENEMOS EL PARAMETRO QUE VENGA POR LA RUTA => $this->route('project') 
                    AHORA CON 

                        Rule::unique('projects')->ignore( $this->route('project') ),

                    LE INDICAMOS QUE EL CAMPO nombre SEA UNICO EN LA TABLA projects E IGNORE EL PARAMETRO project 
                    QUE VIENE EN LA RUTA, DE ESTA MANERA PODREMOS EDITAR LOS PROYECTOS, SINO CUANDO INTENTAMOS EDITARLO
                    PRIMERO VA A BUSCAR EL nombre DEL PROYECTO EN LA BD Y AL ENCONTRARLO FALLA LA VALIDACIÓN
                */
            ],
            'descripcion' => 'required | min:3',
            'imagen' => [
                $this->route('project') ? 'nullable' : 'required',  
                'image',
                'max: 3072',
            ],
            'category_id' => [
                'required',
                'exists:categories,id'
            ]
        ];
    }
}
