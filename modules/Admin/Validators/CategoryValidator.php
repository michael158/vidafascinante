<?php

namespace Modules\Admin\Validators;
use Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class CategoryValidator extends LaravelValidator {
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|unique:categories',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required|unique:categories'
        ]
    ];

    protected $messages = [
        'name.required' => 'O campo nome é obrigatório',
        'name.unique' => 'Já existe uma categoria cadastrada com esse nome, por favor escolha outro nome.'
    ];

}