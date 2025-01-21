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
                'foreign_key' => array(
                    'table' => false,
                    'attribute' => false
                ),
                'not_null' => array(
                    'ADD' => false,
                    'EDIT' => true,
                    'DELETE' => true,
                    'SEARCH' => false
                ),
                'default_value' => false,
                'rules' => array(
                    'validations' => array(
                        'ADD' => array(
                            'tam_min' => false,
                            'tam_max' => 10,
                            'exp_reg' => '/.*/', //'/^[0-9]+$/', 
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => false,
                            'tam_max' => 10,
                            'exp_reg' => '/.*/',
                            'personalized' => true
                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 10,
                            'exp_reg' => '/.*/',
                            'personalized' => true
                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'tam_min' => 'KO_tam_min_id_usuario',
                            'tam_max' => 'KO_tam_max_id_usuario',
                            'exp_reg' => 'KO_exp_reg_id_usuario',
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => 'KO_tam_min_id_usuario',
                            'tam_max' => 'KO_tam_max_id_usuario',
                            'exp_reg' => 'KO_exp_reg_id_usuario',
                            'personalized' => true
                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 'KO_tam_max_id_usuario',
                            'exp_reg' => 'KO_exp_reg_id_usuario',
                            'personalized' => true
                        )
                    )
                )
            ),
            'nombre_usuario' => array(
                'pk' => false,
                'autoincrement' => false,
                'numeric' => false,
                'foreign_key' => array(
                    'table' => false,
                    'attribute' => false
                ),
                'not_null' => array(
                    'ADD' => true,
                    'EDIT' => true,
                    'DELETE' => false,
                    'SEARCH' => false
                ),
                'default_value' => false,
                'rules' => array(
                    'validations' => array(
                        'ADD' => array(
                            'tam_min' => 3,
                            'tam_max' => 25,
                            'exp_reg' => '/^[a-zA-Z][a-zA-Z0-9_-]+$/', // empieza por letra y puede contener numeros, guiones y guiones bajos
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => 3,
                            'tam_max' => 25,
                            'exp_reg' => '/^[a-zA-Z][a-zA-Z0-9_-]+$/',
                            'personalized' => true
                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 25,
                            'exp_reg' => '/^([a-zA-Z][a-zA-Z0-9_-]+)?$/',
                            'personalized' => true
                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'tam_min' => 'KO_tam_min_nombre_usuario',
                            'tam_max' => 'KO_tam_max_nombre_usuario',
                            'exp_reg' => 'KO_exp_reg_nombre_usuario',
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => 'KO_tam_min_nombre_usuario',
                            'tam_max' => 'KO_tam_max_nombre_usuario',
                            'exp_reg' => 'KO_exp_reg_nombre_usuario',
                            'personalized' => true
                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 'KO_tam_max_nombre_usuario',
                            'exp_reg' => 'KO_exp_reg_nombre_usuario',
                            'personalized' => true
                        )
                    )
                )
            ),

            'organizacion_usuario' => array(
                'pk' => false,
                'autoincrement' => false,
                'numeric' => false,
                'foreign_key' => array(
                    'table' => false,
                    'attribute' => false
                ),
                'not_null' => array(
                    'ADD' => true,
                    'EDIT' => true,
                    'DELETE' => false,
                    'SEARCH' => false
                ),
                'default_value' => false,
                'rules' => array(
                    'validations' => array(
                        'ADD' => array(
                            'tam_min' => 3,
                            'tam_max' => 45,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/',
                            'personalized' => true //no se
                        ),
                        'EDIT' => array(
                            'tam_min' => 3,
                            'tam_max' => 45,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/',
                            'personalized' => true //no se
                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 45,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]*$/',
                            'personalized' => true //no se
                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'tam_min' => 'KO_tam_min_organizacion_usuario',
                            'tam_max' => 'KO_tam_max_organizacion_usuario',
                            'exp_reg' => 'KO_exp_reg_organizacion_usuario',
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => 'KO_tam_min_organizacion_usuario',
                            'tam_max' => 'KO_tam_max_organizacion_usuario',
                            'exp_reg' => 'KO_exp_reg_organizacion_usuario',
                            'personalized' => true
                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 'KO_tam_max_organizacion_usuario',
                            'exp_reg' => 'KO_exp_reg_organizacion_usuario',
                            'personalized' => true
                        )
                    )
                )
            ),
            'puesto_usuario' => array(
                'pk' => false,
                'autoincrement' => false,
                'numeric' => false,
                'foreign_key' => array(
                    'table' => false,
                    'attribute' => false
                ),
                'not_null' => array(
                    'ADD' => true,
                    'EDIT' => true,
                    'DELETE' => false,
                    'SEARCH' => false
                ),
                'default_value' => 'alumno',
                'rules' => array(
                    'validations' => array(
                        'ADD' => array(
                            'tam_min' => 6,
                            'tam_max' => 45,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/',
                            'personalized' => true //no se
                        ),
                        'EDIT' => array(
                            'tam_min' => 6,
                            'tam_max' => 45,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/',
                            'personalized' => true //no se
                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 45,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]*$/',
                            'personalized' => true //no se
                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'tam_min' => 'KO_tam_min_puesto_usuario',
                            'tam_max' => 'KO_tam_max_puesto_usuario',
                            'exp_reg' => 'KO_exp_reg_puesto_usuario',
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => 'KO_tam_min_puesto_usuario',
                            'tam_max' => 'KO_tam_max_puesto_usuario',
                            'exp_reg' => 'KO_exp_reg_puesto_usuario',
                            'personalized' => true
                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 'KO_tam_max_puesto_usuario',
                            'exp_reg' => 'KO_exp_reg_puesto_usuario',
                            'personalized' => true
                        )
                    )
                )
            ),

            'direccion_usuario' => array(
                'pk' => false,
                'autoincrement' => false,
                'numeric' => false,
                'foreign_key' => array(
                    'table' => false,
                    'attribute' => false
                ),
                'not_null' => array(
                    'ADD' => true,
                    'EDIT' => true,
                    'DELETE' => false,
                    'SEARCH' => false
                ),
                'default_value' => false,
                'rules' => array(
                    'validations' => array(
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
                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 200,
                            'exp_reg' => '/^[a-zA-Záéíóú0-9\s\,\-\.\#\'\(\)º]*$/',
                            'personalized' => true //no se
                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'tam_min' => 'KO_tam_min_direccion_usuario',
                            'tam_max' => 'KO_tam_max_direccion_usuario',
                            'exp_reg' => 'KO_exp_reg_direccion_usuario',
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => 'KO_tam_min_direccion_usuario',
                            'tam_max' => 'KO_tam_max_direccion_usuario',
                            'exp_reg' => 'KO_exp_reg_direccion_usuario',
                            'personalized' => true
                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 'KO_tam_max_direccion_usuario',
                            'exp_reg' => 'KO_exp_reg_direccion_usuario',
                            'personalized' => true
                        )
                    )
                )
            ),

            'correo_usuario' => array(
                'pk' => false,
                'autoincrement' => false,
                'numeric' => false,
                'foreign_key' => array(
                    'table' => false,
                    'attribute' => false
                ),
                'not_null' => array(
                    'ADD' => true,
                    'EDIT' => true,
                    'DELETE' => false,
                    'SEARCH' => false
                ),
                'default_value' => false,
                'rules' => array(
                    'validations' => array(
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
                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 45,
                            'exp_reg' => '/^([a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})?$/',  //posiblemente
                            'personalized' => true //no se
                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'tam_min' => 'KO_tam_min_correo_usuario',
                            'tam_max' => 'KO_tam_max_correo_usuario',
                            'exp_reg' => 'KO_exp_reg_correo_usuario',
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => 'KO_tam_min_correo_usuario',
                            'tam_max' => 'KO_tam_max_correo_usuario',
                            'exp_reg' => 'KO_exp_reg_correo_usuario',
                            'personalized' => true
                        ),
                        'SEARCH' => array(
                            'tam_min' => 'KO_tam_min_correo_usuario',
                            'tam_max' => 'KO_tam_max_correo_usuario',
                            'exp_reg' => 'KO_exp_reg_correo_usuario',
                            'personalized' => true
                        )
                    )
                )
            )
        )
    );
