<?php

$proyecto_description =
    [
        'entity' => 'proyecto',
        'attributes' => [
            'id_proyecto' => [
                'pk' => true,
                'autoincrement' => true,
                'unique' => true,
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
            'nombre_proyecto' => [
                'unique' => true,
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
                            //'personalized' => "personalized_nombre_proyecto(['Javi','Dani'])"
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
            'descripcion_proyecto' => [
                'type' => 'string',
                'not_null' => [
                    'ADD' => true,
                    'EDIT' => true
                ],
                'rules' => [
                    'validations' => [
                        'ADD' => [
                            'min_size' => 7,
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
        ]
    ];
