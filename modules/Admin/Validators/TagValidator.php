<?php

namespace Modules\Admin\Validators;
use Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class TagValidator extends LaravelValidator {
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|unique:tags',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required|unique:tags'
        ]
    ];

    protected $messages = [
        'name.required' => 'O campo nome é obrigatório',
        'name.unique' => 'Já existe uma tag cadastrada com esse nome, por favor escolha outro nome.'
    ];

}