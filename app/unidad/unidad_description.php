<?php

$unidad_description =
    [
        'entity' => 'unidad',
        'attributes' => [
            'id_unidad' => [
                'pk' => true,
                'autoincrement' => true,
                'type' => 'integer',
                'not_null' => [
                    'EDIT' => true,
                    'DELETE' => true
                ],
                'rules' => [
                    'validations' => [
                        'ADD' => [
                            'max_size' => 10,
                            'exp_reg' => '/.*/',
                            
                        ],
                        'EDIT' => [
                            'max_size' => 10,
                            'exp_reg' => '/.*/',
                            
                        ],
                        'SEARCH' => [
                            'max_size' => 10,
                            'exp_reg' => '/.*/',
                            
                        ]
                    ]
                ]
            ],
            'nombre_unidad' => [
                'type' => 'string',
                'not_null' => [
                    'ADD' => true,
                    'EDIT' => true
                ],
                'rules' => [
                    'validations' => [
                        'ADD' => [
                            'min_size' => 3,
                            'max_size' => 25,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/',
                            
                        ],
                        'EDIT' => [
                            'min_size' => 3,
                            'max_size' => 25,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/',
                            
                        ],
                        'SEARCH' => [
                            'max_size' => 25,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]*$/',
                            
                        ]
                    ]
                ]
            ],
            'descripcion_unidad' => [
                'type' => 'string',
                'not_null' => [
                    'ADD' => true,
                    'EDIT' => true
                ],
                'rules' => [
                    'validations' => [
                        'ADD' => [
                            'min_size' => 1,
                            'max_size' => 255,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/',
                            
                        ],
                        'EDIT' => [
                            'min_size' => 1,
                            'max_size' => 255,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/',
                            
                        ],
                        'SEARCH' => [
                            'max_size' => 255,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]*$/',
                            
                        ]
                    ]
                ]
            ],
            'id_parametro' => [
                'type' => 'integer',
               /* 'foreign_key' => [
                    'table' => ['parametro'],
                    'attribute' => ['id_parametro']
                ],*/
                'not_null' => [
                    'ADD' => true,
                    'EDIT' => true
                ],
                'rules' => [
                    'validations' => [
                        'ADD' => [
                            'max_size' => 10,
                            'exp_reg' => '/.*/',
                            
                        ],
                        'EDIT' => [
                            'max_size' => 10,
                            'exp_reg' => '/.*/',
                            
                        ]
                    ]
                ]
            ]
        ],
        'associations' => [
            'BelongsTo' => [
                /*[
                    'entity' => 'unidad', 
                    'attributes-own' => ['id_unidad','id_parametro'],
                    'attributes-rel' => ['id_javi','id2_javi']
                ],*/
                [
                    'entity' => 'parametro', 
                    'attributes-own' => ['id_parametro'],
                    'attributes-rel' => ['id_parametro']
                ],
            ],
        ]
    ];
