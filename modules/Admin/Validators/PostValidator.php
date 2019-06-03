<?php

namespace Modules\Admin\Validators;
use Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class PostValidator extends LaravelValidator {
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'title' => 'required|unique:posts|max:100',
            'content' => 'required',
            'capa' => 'required',
            'category_id' => 'required',
            'tags' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'title' => 'required|unique:posts|max:100',
            'content' => 'required',
            'category_id' => 'required',
            'tags' => 'required'
        ]
    ];

    protected $messages = [
        'title.required' => 'O seu post deve ter um título.',
        'title.unique' => 'Já existe um post cadastrado com esse título, por favor escolha outro título.',
        'title.max' => 'O título não pode ser maior que 100 caracteres',
        'content.required' => 'O seu post deve conter algum texto.',
        'category_id.required' => 'O seu post deve ter uma categoria',
        'capa.required' => 'Deve ser enviada uma foto de capa para o post.',
        'tags.required' => 'Deve ser cadastrada pelo menos uma tag no post.'
    ];

}