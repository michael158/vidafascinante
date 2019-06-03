<?php

namespace Modules\Admin\Validators;
use Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class UserValidator extends LaravelValidator {
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|max:45',
            'email' => 'email|required|unique:users|max:45',
            'description' => 'required',
            'password' => 'required',
            'admin' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required|max:45',
            'email' => 'required|unique:users|max:45',
            'description' => 'required',
            'admin' => 'required'
        ]
    ];

    protected $messages = [
        'name.required' => 'O usuário deve ter um nome.',
        'name.max' => 'O nome não pode ser maior que 45 caracteres',
        'email.required' => 'Deve ser cadastrado um endereço de email',
        'email.email' => 'Deve ser cadastrado um endereço de email válido',
        'email.unique' => 'Já existe um usuário cadastrado com esse endereço email, por favor escolha outro endereço email.',
        'email.max' => 'O título não pode ser maior que 45 caracteres',
        'password.required' => 'Deve ser cadastrada uma senha para o usuário',
        'description.required' => 'O usuário deve ter uma descrição',
        'admin.required' => 'Deve ser cadastrado o tipo de usuário'
    ];

}