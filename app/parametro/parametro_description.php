<?php
$parametro_description =
    [
        'entity' => 'parametro',
        'attributes' => [
            'id_parametro' => [
                'pk' => true,
                'autoincrement' => true,
                'type' => 'integer',
                'not_null' => [
                    'EDIT' => true,
                    'DELETE' => true,
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
            'nombre_parametro' => [
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
            'descripcion_parametro' => [
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
            'tipo_parametro' => [
                'type' => 'string',
                'not_null' => [
                    'ADD' => true,
                    'EDIT' => true
                ],
                'rules' => [
                    'validations' => [
                        'ADD' => [
                            'min_size' => 1,
                            'max_size' => 45,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/',

                        ],
                        'EDIT' => [
                            'min_size' => 1,
                            'max_size' => 45,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/',

                        ],
                        'SEARCH' => [
                            'max_size' => 45,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]*$/',

                        ]
                    ]
                ]
            ],
            'formato_parametro' => [
                'type' => 'string',
                'not_null' => [
                ],
                'rules' => [
                    'validations' => [
                        'ADD' => [
                            'max_size' => 45,
                            'exp_reg' => '/.*/',

                        ],
                        'EDIT' => [
                            'max_size' => 45,
                            'exp_reg' => '/.*/',

                        ],
                        'SEARCH' => [
                            'max_size' => 45,
                            'exp_reg' => '/.*/',

                        ]
                    ]
                ]
            ],
            'rango_desde_parametro' => [
                'type' => 'integer',
                'not_null' => [
                ],
                'rules' => [
                    'validations' => [
                        'ADD' => [
                            'max_size' => 45,
                            'exp_reg' => '/.*/',

                        ],
                        'EDIT' => [
                            'max_size' => 45,
                            'exp_reg' => '/.*/',

                        ],
                        'SEARCH' => [
                            'max_size' => 45,
                            'exp_reg' => '/.*/',

                        ]
                    ]
                ]
            ],
            'rango_hasta_parametro' => [
                'type' => 'numeric',
                'not_null' => [
                ],
                'rules' => [
                    'validations' => [
                        'ADD' => [
                            'max_size' => 45,
                            'exp_reg' => '/.*/',

                        ],
                        'EDIT' => [
                            'max_size' => 45,
                            'exp_reg' => '/.*/',

                        ],
                        'SEARCH' => [
                            'max_size' => 45,
                            'exp_reg' => '/.*/',

                        ]
                    ]
                ]
            ]
        ],
        'associations' => [
            'OneToMany' => [
                [
                    'entity' => 'unidad', 
                    'attributes-own' => ['id_parametro'],
                    'attributes-rel' => ['id_parametro']
                ]
            ]
        ],

    ];


    /*
    // decia algo como esto. se recorre el onetomany y por cada uno se recoge la entidad y los atributos involucrados
    
            'OneToMany' => [
                [
                    'entity' => 'unidad', 
                    'attributes-own' => ['id_parametro'],
                    'attributes-rel' => ['id_parametro']
                ],
                [
                    'entity' => 'otraentidad', 
                    'attributes-own' => ['id_otraentidad'],
                    'attributes-rel' => ['id_otraentidad']
                ]
            ]

    */