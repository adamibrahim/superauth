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

    'accepted'             => ':attribute должны быть приняты.',
    'active_url'           => ':attribute не является допустимым URL.',
    'after'                => ':attribute должен быть датой после: date.',
    'after_or_equal'       => ':attribute должен быть датой после или равной: date.',
    'alpha'                => ':attribute могут содержать только буквы.',
    'alpha_dash'           => ':attribute могут содержать только буквы, цифры и тире.',
    'alpha_num'            => ':attribute могут содержать только буквы и цифры.',
    'array'                => ':attribute должен быть массивом.',
    'before'               => ':attribute должна быть дата до: date.',
    'before_or_equal'      => ':attribute должна быть дата до или равна :date.',
    'between'              => [
        'numeric' => ':attribute должно быть между :min и :max.',
        'file'    => ':attribute должно быть между :min и :max kilobytes.',
        'string'  => ':attribute должно быть между :min и :max characters.',
        'array'   => ':attribute должно быть между :min и :max Предметы.',
    ],
    'boolean'              => ':attribute поле должно быть истинным или ложным.',
    'confirmed'            => ':attribute подтверждение не соответствует.',
    'date'                 => ':attribute не является действительной датой.',
    'date_format'          => ':attribute не соответствует формату :format.',
    'different'            => ':attribute и :other должны быть разными.',
    'digits'               => ':attribute должно быть :digits цифры.',
    'digits_between'       => ':attribute должно быть между :min и :max цифры.',
    'dimensions'           => ':attribute имеет недопустимые размеры изображения.',
    'distinct'             => ':attribute поле имеет повторяющееся значение.',
    'email'                => ':attribute Адрес эл. почты должен быть действительным.',
    'exists'               => 'Выбранный :attribute является недействительным.',
    'file'                 => ':attribute должен быть файлом.',
    'filled'               => 'attribute поле должно иметь значение.',
    'image'                => ':attribute должен быть образ.',
    'in'                   => 'Выбранный :attribute является недействительным.',
    'in_array'             => ':attribute поле не существует в :other.',
    'integer'              => ':attribute должно быть целым числом.',
    'ip'                   => ':attribute должен быть действительным IP-адресом.',
    'ipv4'                 => ':attribute должен быть действительным адресом IPv4.',
    'ipv6'                 => ':attribute должен быть действительным адресом IPv6.',
    'json'                 => ':attribute должна быть действительной строкой JSON.',
    'max'                  => [
        'numeric' => ':attribute может быть не больше :max.',
        'file'    => ':attribute может быть не больше :max килобайт.',
        'string'  => ':attribute может быть не больше :max персонажи.',
        'array'   => ':attribute может не быть больше, чем :max Предметы.',
    ],
    'mimes'                => ':attribute должен быть файлом type: :values.',
    'mimetypes'            => ':attribute должен быть файлом type: :values.',
    'min'                  => [
        'numeric' => ':attribute должен быть не менее :min.',
        'file'    => ':attribute должен быть не менее :min килобайты.',
        'string'  => ':attribute должен быть не менее :min персонажи.',
        'array'   => ':attribute должен иметь по крайней мере :min Предметы.',
    ],
    'not_in'               => 'Выбранный :attribute является недействительным.',
    'numeric'              => ':attribute должен быть числом.',
    'present'              => ':attribute поле должно присутствовать.',
    'regex'                => ':attribute формат недействителен.',
    'required'             => ':attribute Поле, обязательное для заполнения.',
    'required_if'          => ':attribute поле требуется, когда :other является :value.',
    'required_unless'      => ':attribute поле требуется, если :other в :values.',
    'required_with'        => ':attribute поле требуется, когда :values настоящее.',
    'required_with_all'    => ':attribute поле требуется, когда  :values настоящее.',
    'required_without'     => ':attribute поле требуется, когда  :values нет.',
    'required_without_all' => ':attribute поле требуется, если ни один из :values присутствуют.',
    'same'                 => ':attribute и :other должен совпадать.',
    'size'                 => [
        'numeric' => ':attribute должно быть :size.',
        'file'    => ':attribute должно быть :size килобайты.',
        'string'  => ':attribute должно быть :size персонажи.',
        'array'   => ':attribute должен содержать :size Предметы.',
    ],
    'string'               => ':attribute должен быть строкой.',
    'timezone'             => ':attribute должна быть действительной зоной.',
    'unique'               => ':attribute уже был взят.',
    'uploaded'             => ':attribute не удалось загрузить.',
    'url'                  => ':attribute формат недействителен.',

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

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
