<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'El campo :attribute debe ser aceptado.',
    'active_url'           => 'Esta no es una URL válida.',
    'after'                => 'Debe ser una fecha después de :date.',
    'after_or_equal'       => 'Debe ser una fecha después o igual a :date.',
    'alpha'                => 'El campo :attribute solo puede contener letras.',
    'alpha_dash'           => 'El campo :attribute solo puede contener letras, números, guiones y guiones bajos.',
    'alpha_num'            => 'El campo :attribute solo puede contener letras y números.',
    'array'                => 'El campo :attribute debe ser un array (colección).',
    'before'               => 'Debe ser una fecha antes de :date.',
    'before_or_equal'      => 'Debe ser una fecha anterior o igual a :date.',
    'between'              => [
        'numeric' => 'El valor debe ser entre :min y :max.',
        'file'    => 'El archivo debe ser entre :min y :max kilobytes.',
        'string'  => 'El texto debe ser entre :min y :max caracteres.',
        'array'   => 'El contenido debe tener entre :min y :max elementos.',
    ],
    'boolean'              => 'El campo :attribute debe ser verdadero o falso.',
    'confirmed'            => 'La confirmación no coincide.',
    'date'                 => 'Esta no es una fecha válida.',
    'date_equals'          => 'El campo :attribute debe ser una fecha igual a :date.',
    'date_format'          => 'El campo :attribute no corresponde al formato :format.',
    'different'            => 'El valor deben ser diferente de :other.',
    'digits'               => 'Debe tener :digits dígitos.',
    'digits_between'       => 'Debe tener entre :min y :max dígitos.',
    'dimensions'           => 'Las dimensiones de esta imagen son inválidas.',
    'distinct'             => 'El campo :attribute tiene un valor duplicado.',
    'email'                => 'No es un correo válido.',
    'ends_with'            => 'Debe finalizar con uno de los siguientes valores: :values.',
    'exists'               => 'El valor seleccionado es inválido.',
    'file'                 => 'El campo :attribute debe ser un archivo.',
    'filled'               => 'El campo :attribute debe tener un valor.',
    'gt'                   => [
        'numeric' => 'El valor del campo :attribute debe ser mayor que :value.',
        'file'    => 'El archivo debe ser mayor que :value kilobytes.',
        'string'  => 'El texto debe ser mayor de :value caracteres.',
        'array'   => 'El contenido debe tener mas de :value elementos.',
    ],
    'gte'                  => [
        'numeric' => 'El valor debe ser mayor o igual que :value.',
        'file'    => 'El tamaño del archivo debe ser mayor o igual que :value kilobytes.',
        'string'  => 'El texto debe ser mayor o igual de :value caracteres.',
        'array'   => 'El contenido debe tener :value elementos o más.',
    ],
    'image'                => 'Esta debe ser una imagen.',
    'in'                   => 'El valor seleccionado es inválido.',
    'in_array'             => 'Este valor no existe en :other.',
    'integer'              => 'Esto debe ser un entero.',
    'ip'                   => 'Debe ser una dirección IP válida.',
    'ipv4'                 => 'Debe ser una dirección IPv4 válida.',
    'ipv6'                 => 'Debe ser una dirección IPv6 válida.',
    'json'                 => 'Debe ser un texto válido en JSON.',
    'lt'                   => [
        'numeric' => 'El valor debe ser menor que :value.',
        'file'    => 'El tamaño del archivo debe ser menor a :value kilobytes.',
        'string'  => 'El texto debe ser menor de :value caracteres.',
        'array'   => 'El contenido debe tener menor de :value elementos.',
    ],
    'lte'                  => [
        'numeric' => 'El valor debe ser menor o igual que :value.',
        'file'    => 'El tamaño del archivo debe ser menor o igual que :value kilobytes.',
        'string'  => 'El texto debe ser menor o igual de :value caracteres.',
        'array'   => 'El contenido no debe tener más de :value elementos.',
    ],
    'max'                  => [
        'numeric' => 'El valor no debe ser mayor de :max.',
        'file'    => 'El tamaño del archivo no debe ser mayor a :max kilobytes.',
        'string'  => 'El texto no debe ser mayor a :max caracteres.',
        'array'   => 'El contenido no debe tener más de :max elementos.',
    ],
    'mimes'                => 'Debe ser un archivo de tipo: :values.',
    'mimetypes'            => 'Debe ser un archivo de tipo: :values.',
    'min'                  => [
        'numeric' => 'El valor debe ser al menos de :min.',
        'file'    => 'El tamaño del archivo debe ser al menos de :min kilobytes.',
        'string'  => 'El texto debe ser al menos de :min caracteres.',
        'array'   => 'El contenido debe tener al menos :min elementos.',
    ],
    'multiple_of'          => 'Este valor debe ser múltiplo de :value',
    'not_in'               => 'El valor seleccionado es inválido.',
    'not_regex'            => 'Este formato es inválido.',
    'numeric'              => 'Debe ser un número.',
    'password'             => 'La contraseña es incorrecta.',
    'present'              => 'El campo :attribute debe estar presente.',
    'regex'                => 'Este formato es inválido.',
    'required'             => 'El campo :attribute es requerido.',
    'required_if'          => 'El campo :attribute es requerido cuando :other es :value.',
    'required_unless'      => 'El campo :attribute es requerido a menos que :other esté en :values.',
    'required_with'        => 'El campo :attribute es requerido cuando :values está presente.',
    'required_with_all'    => 'El campo :attribute es requerido cuando :values están presentes.',
    'required_without'     => 'El campo :attribute es requerido cuando :values no está presente.',
    'required_without_all' => 'El campo :attribute es requerido cuando ninguno de :values están presentes.',
    'same'                 => 'El valor de el campo :attribute debe ser igual a :other.',
    'size'                 => [
        'numeric' => 'El valor debe ser :size.',
        'file'    => 'El tamaño del archivo debe ser de :size kilobytes.',
        'string'  => 'El texto debe ser de :size caracteres.',
        'array'   => 'El contenido debe tener :size elementos.',
    ],
    'starts_with'          => 'Debe comenzar con alguno de los siguientes valores: :values.',
    'string'               => 'Debe ser un texto.',
    'timezone'             => 'Debe ser de una zona horaria válida.',
    'unique'               => 'El campo :attribute ya ha sido tomado.',
    'uploaded'             => 'Falló al subir.',
    'url'                  => 'Este formato es inválido.',
    'uuid'                 => 'Debe ser un UUID válido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

];
