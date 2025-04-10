<?php

$proyecto_description =
    array(
        'entity' => 'proyecto',
        'attributes' => array(
            'id_proyecto' => array(
                'pk' => true,
                'autoincrement' => true,
                'unique' => true,
                'type' => 'integer',
                'not_null' => array(
                    'EDIT' => true,
                    'DELETE' => true
                ),
                'rules' => array(
                    'validations' => array(
                        'ADD' => array(
                            'max_size' => 10,
                            'exp_reg' => '/.*/',

                        ),
                        'EDIT' => array(
                            'max_size' => 10,
                            'exp_reg' => '/.*/',

                        ),
                        'SEARCH' => array(
                            'max_size' => 10,
                            'exp_reg' => '/.*/',

                        )
                    )
                )
            ),
            'nombre_proyecto' => array(
                'unique' => true,
                'type' => 'string',
                'not_null' => array(
                    'ADD' => true,
                    'EDIT' => true
                ),
                'rules' => array(
                    'validations' => array(
                        'ADD' => array(
                            'min_size' => 3,
                            'max_size' => 25,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/',
                            //'personalized' => "personalized_nombre_proyecto(Array('Javi','Dani'))"
                        ),
                        'EDIT' => array(
                            'min_size' => 3,
                            'max_size' => 25,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/',

                        ),
                        'SEARCH' => array(
                            'max_size' => 25,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]*$/',

                        )
                    )
                )
            ),
            'descripcion_proyecto' => array(
                'type' => 'string',
                'not_null' => array(
                    'ADD' => true,
                    'EDIT' => true
                ),
                'rules' => array(
                    'validations' => array(
                        'ADD' => array(
                            'min_size' => 7,
                            'max_size' => 255,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/',

                        ),
                        'EDIT' => array(
                            'min_size' => 1,
                            'max_size' => 255,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/',

                        ),
                        'SEARCH' => array(
                            'max_size' => 255,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]*$/',

                        )
                    )
                )
            ),
        )
    );
