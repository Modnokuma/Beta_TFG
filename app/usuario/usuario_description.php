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
                            'min_size' => false,
                            'max_size' => 10,
                            'exp_reg' => '/.*/', //'/^[0-9]+$/', 
                           
                        ),
                        'EDIT' => array(
                            'min_size' => false,
                            'max_size' => 10,
                            'exp_reg' => '/.*/',
                            
                        ),
                        'SEARCH' => array(
                            'min_size' => false,
                            'max_size' => 10,
                            'exp_reg' => '/.*/',
                          
                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'min_size' => 'MIN_SIZE_ID_USUARIO_KO',
                            'max_size' => 'MAX_SIZE_ID_USUARIO_KO',
                            'exp_reg' => 'EXP_REG_ID_USUARIO_KO',
                            
                        ),
                        'EDIT' => array(
                            'min_size' => 'MIN_SIZE_ID_USUARIO_KO',
                            'max_size' => 'MAX_SIZE_ID_USUARIO_KO',
                            'exp_reg' => 'EXP_REG_NOMBRE_USUARIO_KO',
                            
                        ),
                        'SEARCH' => array(
                            'min_size' => false,
                            'max_size' => 'MAX_SIZE_ID_USUARIO_KO',
                            'exp_reg' => 'EXP_REG_ID_USUARIO_KO',
                            
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
                            'min_size' => 3,
                            'max_size' => 25,
                            'exp_reg' => '/^[a-zA-Z][a-zA-Z0-9_-]+$/', // empieza por letra y puede contener numeros, guiones y guiones bajos
                             'personalized' => 'validarDesdeParametro($atributo)'
                        ),
                        'EDIT' => array(
                            'min_size' => 3,
                            'max_size' => 25,
                            'exp_reg' => '/^[a-zA-Z][a-zA-Z0-9_-]+$/',
                            
                        ),
                        'SEARCH' => array(
                            'min_size' => false,
                            'max_size' => 25,
                            'exp_reg' => '/^([a-zA-Z][a-zA-Z0-9_-]+)?$/',
                           
                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'min_size' => 'MIN_SIZE_NOMBRE_USUARIO_KO',
                            'max_size' => 'MAX_SIZE_NOMBRE_USUARIO_KO',
                            'exp_reg' => 'EXP_REG_NOMBRE_USUARIO_KO',
                            
                        ),
                        'EDIT' => array(
                            'min_size' => 'MIN_SIZE_NOMBRE_USUARIO_KO',
                            'max_size' => 'MAX_SIZE_NOMBRE_USUARIO_KO',
                            'exp_reg' => 'EXP_REG_NOMBRE_USUARIO_KO',
                           
                        ),
                        'SEARCH' => array(
                            'min_size' => false,
                            'max_size' => 'MAX_SIZE_NOMBRE_USUARIO_KO',
                            'exp_reg' => 'EXP_REG_NOMBRE_USUARIO_KO',
                            
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
                            'min_size' => 3,
                            'max_size' => 45,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/',
                            
                        ),
                        'EDIT' => array(
                            'min_size' => 3,
                            'max_size' => 45,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/',
                            
                        ),
                        'SEARCH' => array(
                            'min_size' => false,
                            'max_size' => 45,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]*$/',
                            
                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'min_size' => 'MIN_SIZE_ORGANIZACION_USUARIO_KO',
                            'max_size' => 'MAX_SIZE_ORGANIZACION_USUARIO_KO',
                            'exp_reg' => 'EXP_REG_ORGANIZACION_USUARIO_KO',
                            
                        ),
                        'EDIT' => array(
                            'min_size' => 'MIN_SIZE_ORGANIZACION_USUARIO_KO',
                            'max_size' => 'MAX_SIZE_ORGANIZACION_USUARIO_KO',
                            'exp_reg' => 'EXP_REG_ORGANIZACION_USUARIO_KO',
                            
                        ),
                        'SEARCH' => array(
                            'min_size' => false,
                            'max_size' => 'MAX_SIZE_ORGANIZACION_USUARIO_KO',
                            'exp_reg' => 'EXP_REG_ORGANIZACION_USUARIO_KO',
                            
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
                            'min_size' => 6,
                            'max_size' => 45,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/',
                            
                        ),
                        'EDIT' => array(
                            'min_size' => 6,
                            'max_size' => 45,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/',
                            
                        ),
                        'SEARCH' => array(
                            'min_size' => false,
                            'max_size' => 45,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]*$/',
                            
                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'min_size' => 'MIN_SIZE_PUESTO_USUARIO_KO',
                            'max_size' => 'MAX_SIZE_PUESTO_USUARIO_KO',
                            'exp_reg' => 'EXP_REG_PUESTO_USUARIO_KO',
                            
                        ),
                        'EDIT' => array(
                            'min_size' => 'MIN_SIZE_PUESTO_USUARIO_KO',
                            'max_size' => 'MAX_SIZE_PUESTO_USUARIO_KO',
                            'exp_reg' => 'EXP_REG_PUESTO_USUARIO_KO',
                            
                        ),
                        'SEARCH' => array(
                            'min_size' => false,
                            'max_size' => 'MAX_SIZE_PUESTO_USUARIO_KO',
                            'exp_reg' => 'EXP_REG_PUESTO_USUARIO_KO',
                            
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
                            'min_size' => 10,
                            'max_size' => 200,
                            'exp_reg' => '/^[a-zA-Záéíóú0-9\s\,\-\.\#\'\(\)º]+$/',
                           
                        ),
                        'EDIT' => array(
                            'min_size' => 10,
                            'max_size' => 200,
                            'exp_reg' => '/^[a-zA-Záéíóú0-9\s\,\-\.\#\'\(\)º]+$/',
                            
                        ),
                        'SEARCH' => array(
                            'min_size' => false,
                            'max_size' => 200,
                            'exp_reg' => '/^[a-zA-Záéíóú0-9\s\,\-\.\#\'\(\)º]*$/',
                            
                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'min_size' => 'MIN_SIZE_DIRECCION_USUARIO_KO',
                            'max_size' => 'MAX_SIZE_PUESTO_USUARIO_KO',
                            'exp_reg' => 'EXP_REG_DIRECCION_USUARIO_KO',
                            
                        ),
                        'EDIT' => array(
                            'min_size' => 'MIN_SIZE_DIRECCION_USUARIO_KO',
                            'max_size' => 'MAX_SIZE_DIRECCION_USUARIO_KO',
                            'exp_reg' => 'EXP_REG_DIRECCION_USUARIO_KO',
                           
                        ),
                        'SEARCH' => array(
                            'min_size' => false,
                            'max_size' => 'MAX_SIZE_DIRECCION_USUARIO_KO',
                            'exp_reg' => 'EXP_REG_DIRECCION_USUARIO_KO',
                          
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
                            'min_size' => 6,  //a@m.com
                            'max_size' => 45,
                            'exp_reg' => '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', //posiblemente
                            'personalized' => 'personalized_correo_usuario()'
                            
                        ),
                        'EDIT' => array(
                            'min_size' => 6,
                            'max_size' => 45,
                            'exp_reg' => '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',  //posiblemente
                           
                        ),
                        'SEARCH' => array(
                            'min_size' => false,
                            'max_size' => 45,
                            'exp_reg' => '/^([a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})?$/',  //posiblemente
                           
                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'min_size' => 'MIN_SIZE_CORREO_USUARIO_KO',
                            'max_size' => 'MAX_SIZE_CORREO_USUARIO_KO',
                            'exp_reg' => 'EXP_REG_CORREO_USUARIO_KO',
                           
                        ),
                        'EDIT' => array(
                            'min_size' => 'MIN_SIZE_CORREO_USUARIO_KO',
                            'max_size' => 'MAX_SIZE_CORREO_USUARIO_KO',
                            'exp_reg' => 'EXP_REG_CORREO_USUARIO_KO',
                            
                        ),
                        'SEARCH' => array(
                            'min_size' => false,
                            'max_size' => 'MAX_SIZE_CORREO_USUARIO_KO',
                            'exp_reg' => 'EXP_REG_CORREO_USUARIO_KO',
                           
                        )
                    )
                )
            )
        )
    );
