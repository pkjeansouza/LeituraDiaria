<?php

class Lembrete extends AppModel
{
    public $actsAs = ['Linkable', 'Containable'];

    public $belongsTo = [
        'Livro' => [
            'className' => 'Livro',
            'foreignKey' => 'livro_id'
        ]
    ];
}