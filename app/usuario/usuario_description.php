<?php
$usuario_description =
    array(
        'entity' => 'usuario',
        'onetomany-rel' => array(
            'attributes-own' => array('id_usuario'),
            'entity-rel' => 'notas',
            'attributes-rel' => array('id_usuario')
        ),
        'attributes' => array(
            'id_usuario' => array(
                'pk' => true,
                'autoincrement' => true,
                'numeric' => true,
                'not_null' => array(
                    'ADD' => false,
                    'EDIT' => true,
                    'DELETE' => true,
                ),
                'default_value' => false,
                'rules' => array(
                    'validations' => array(
                        'ADD' => array(
                            'tam_min' => false,
                            'tam_max' => 10,
                            'exp_reg' => '/^[0-9]+$/',
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => false,
                            'tam_max' => 10,
                            'exp_reg' => '/^[0-9]+$/',
                            'personalized' => true
                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'tam_min' => 'KO_tam_min_id_usuario',
                            'tam_max' => 10,
                            'exp_reg' => false,
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => false,
                            'tam_max' => 10,
                            'exp_reg' => false,
                            'personalized' => true
                        )
                    )
                )
            ),
            'nombre_usuario' => array(
                'pk' => false,
                'autoincrement' => false,
                'numeric' => false,
                'not_null' => array(
                    'ADD' => true,
                    'EDIT' => true,
                    'DELETE' => false,
                ),
                'default_value' => false,
                'test' => array(
                    'ADD' => array(
                        'tam_min' => 3,
                        'tam_max' => 25,
                        'exp_reg' => '/^[a-zA-Z][a-zA-Z0-9_-]$/', // empieza por letra y puede contener numeros, guiones y guiones bajos
                        'personalized' => true
                    ),
                    'EDIT' => array(
                        'tam_min' => 3,
                        'tam_max' => 25,
                        'exp_reg' => '/^[a-zA-Z][a-zA-Z0-9_-]$/',
                        'personalized' => true
                    )
                )
            ),

            'organizacion_usuario' => array(
                'pk' => false,
                'autoincrement' => false,
                'numeric' => false,
                'not_null' => array(
                    'ADD' => true,
                    'EDIT' => true,
                    'DELETE' => false
                ),
                'default_value' => false,
                'test' => array(
                    'ADD' => array(
                        'tam_min' => 3,
                        'tam_max' => 45,
                        'exp_reg' => '/^[a-zA-Z]+$/',
                        'personalized' => true //no se
                    ),
                    'EDIT' => array(
                        'tam_min' => 3,
                        'tam_max' => 45,
                        'exp_reg' => '/^[a-zA-Z]+$/',
                        'personalized' => true //no se
                    )
                )
            ),
            'puesto_usuario' => array(
                'pk' => false,
                'autoincrement' => false,
                'numeric' => false,
                'not_null' => array(
                    'ADD' => true,
                    'EDIT' => true,
                    'DELETE' => false
                ),
                'default_value' => 'alumno',
                'test' => array(
                    'ADD' => array(
                        'tam_min' => 6,
                        'tam_max' => 45,
                        'exp_reg' => '/^[a-zA-Z]+$/',
                        'personalized' => true //no se
                    ),
                    'EDIT' => array(
                        'tam_min' => 6,
                        'tam_max' => 45,
                        'exp_reg' => '/^[a-zA-Z]+$/',
                        'personalized' => true //no se
                    )
                )
            ),

            'direccion_usuario' => array(
                'pk' => false,
                'autoincrement' => false,
                'numeric' => false,
                'not_null' => array(
                    'ADD' => true,
                    'EDIT' => true,
                    'DELETE' => false
                ),
                'default_value' => false,
                'test' => array(
                    'ADD' => array(
                        'tam_min' => 10,
                        'tam_max' => 200,
                        'exp_reg' => '/^[a-zA-Záéíóú0-9\s\,\-\.\#\'\(\)º]+$/',
                        'personalized' => true //no se
                    ),
                    'EDIT' => array(
                        'tam_min' => 10,
                        'tam_max' => 200,
                        'exp_reg' => '/^[a-zA-Záéíóú0-9\s\,\-\.\#\'\(\)º]+$/',
                        'personalized' => true //no se
                    )
                )
            ),

            'correo_usuario' => array(
                'pk' => false,
                'autoincrement' => false,
                'numeric' => false,
                'not_null' => array(
                    'ADD' => true,
                    'EDIT' => true,
                    'DELETE' => false
                ),
                'default_value' => false,
                'test' => array(
                    'ADD' => array(
                        'tam_min' => 6,  //a@m.com
                        'tam_max' => 45,
                        'exp_reg' => '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', //posiblemente
                        'personalized' => true //no se
                    ),
                    'EDIT' => array(
                        'tam_min' => 6,
                        'tam_max' => 45,
                        'exp_reg' => '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',  //posiblemente
                        'personalized' => true //no se
                    )
                )
            )
        )
    );
