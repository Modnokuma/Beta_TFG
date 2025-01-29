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
                'type' => 'integer',
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
                            'tam_min' => 'TAM_MIN_ID_USUARIO_KO',
                            'tam_max' => 'TAM_MAX_ID_USUARIO_KO',
                            'exp_reg' => 'EXP_REG_ID_USUARIO_KO',
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => 'TAM_MAX_ID_USUARIO_KO',
                            'tam_max' => 'TAM_MAX_ID_USUARIO_KO',
                            'exp_reg' => 'EXP_REG_NOMBRE_USUARIO_KO',
                            'personalized' => true
                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 'TAM_MAX_ID_USUARIO_KO',
                            'exp_reg' => 'EXP_REG_ID_USUARIO_KO',
                            'personalized' => true
                        )
                    )
                )
            ),
            'nombre_usuario' => array(
                'pk' => false,
                'autoincrement' => false,
                'type' => 'string',
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
                            'tam_min' => 'TAM_MIN_NOMBRE_USUARIO_KO',
                            'tam_max' => 'TAM_MAX_NOMBRE_USUARIO_KO',
                            'exp_reg' => 'EXP_REG_NOMBRE_USUARIO_KO',
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => 'TAM_MAX_NOMBRE_USUARIO_KO',
                            'tam_max' => 'TAM_MAX_NOMBRE_USUARIO_KO',
                            'exp_reg' => 'EXP_REG_NOMBRE_USUARIO_KO',
                            'personalized' => true
                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 'TAM_MAX_NOMBRE_USUARIO_KO',
                            'exp_reg' => 'EXP_REG_NOMBRE_USUARIO_KO',
                            'personalized' => true
                        )
                    )
                )
            ),

            'organizacion_usuario' => array(
                'pk' => false,
                'autoincrement' => false,
                'type' => 'string',
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
                            'tam_min' => 'TAM_MIN_ORGANIZACION_USUARIO_KO',
                            'tam_max' => 'TAM_MAX_ORGANIZACION_USUARIO_KO',
                            'exp_reg' => 'EXP_REG_ORGANIZACION_USUARIO_KO',
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => 'TAM_MIN_ORGANIZACION_USUARIO_KO',
                            'tam_max' => 'TAM_MAX_ORGANIZACION_USUARIO_KO',
                            'exp_reg' => 'EXP_REG_ORGANIZACION_USUARIO_KO',
                            'personalized' => true
                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 'TAM_MAX_ORGANIZACION_USUARIO_KO',
                            'exp_reg' => 'EXP_REG_ORGANIZACION_USUARIO_KO',
                            'personalized' => true
                        )
                    )
                )
            ),
            'puesto_usuario' => array(
                'pk' => false,
                'autoincrement' => false,
                'type' => 'string',
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
                            'tam_min' => 'TAM_MIN_PUESTO_USUARIO_KO',
                            'tam_max' => 'TAM_MAX_PUESTO_USUARIO_KO',
                            'exp_reg' => 'EXP_REG_PUESTO_USUARIO_KO',
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => 'TAM_MIN_PUESTO_USUARIO_KO',
                            'tam_max' => 'TAM_MAX_PUESTO_USUARIO_KO',
                            'exp_reg' => 'EXP_REG_PUESTO_USUARIO_KO',
                            'personalized' => true
                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 'TAM_MAX_PUESTO_USUARIO_KO',
                            'exp_reg' => 'EXP_REG_PUESTO_USUARIO_KO',
                            'personalized' => true
                        )
                    )
                )
            ),

            'direccion_usuario' => array(
                'pk' => false,
                'autoincrement' => false,
                'type' => 'string',
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
                            'tam_min' => 'TAM_MIN_DIRECCION_USUARIO_KO',
                            'tam_max' => 'TAM_MAX_PUESTO_USUARIO_KO',
                            'exp_reg' => 'EXP_REG_DIRECCION_USUARIO_KO',
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => 'TAM_MIN_DIRECCION_USUARIO_KO',
                            'tam_max' => 'TAM_MAX_DIRECCION_USUARIO_KO',
                            'exp_reg' => 'EXP_REG_DIRECCION_USUARIO_KO',
                            'personalized' => true
                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 'TAM_MAX_DIRECCION_USUARIO_KO',
                            'exp_reg' => 'EXP_REG_DIRECCION_USUARIO_KO',
                            'personalized' => true
                        )
                    )
                )
            ),

            'correo_usuario' => array(
                'pk' => false,
                'autoincrement' => false,
                'type' => 'string',
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
                            'tam_min' => 'TAM_MIN_CORREO_USUARIO_KO',
                            'tam_max' => 'TAM_MAX_CORREO_USUARIO_KO',
                            'exp_reg' => 'EXP_REG_CORREO_USUARIO_KO',
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => 'TAM_MIN_CORREO_USUARIO_KO',
                            'tam_max' => 'TAM_MAX_CORREO_USUARIO_KO',
                            'exp_reg' => 'EXP_REG_CORREO_USUARIO_KO',
                            'personalized' => true
                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 'KO_tam_max_correo_usuario',
                            'exp_reg' => 'EXP_REG_CORREO_USUARIO_KOS',
                            'personalized' => true
                        )
                    )
                )
            )
        )
    );
