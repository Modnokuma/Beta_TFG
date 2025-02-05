<?php

$proyecto_description =
    array(
        'entity' => 'proyecto',
        'attributes' => array(
            'id_proyecto' => array(
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
                            'exp_reg' => '/.*/',
                           
                        ),
                        'EDIT' => array(
                            'tam_min' => false,
                            'tam_max' => 10,
                            'exp_reg' => '/.*/',
                            
                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 10,
                            'exp_reg' => '/.*/',
                           
                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'tam_min' => 'TAM_MIN_ID_PROYECTO_KO',
                            'tam_max' => 'TAM_MAX_ID_PROYECTO_KO',
                            'exp_reg' => 'EXP_REG_ID_PROYECTO_KO',
                           
                        ),
                        'EDIT' => array(
                            'tam_min' => 'TAM_MIN_ID_PROYECTO_KO',
                            'tam_max' => 'TAM_MAX_ID_PROYECTO_KO',
                            'exp_reg' => 'EXP_REG_ID_PROYECTO_KO',
                           
                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 'TAM_MAX_ID_PROYECTO_KO',
                            'exp_reg' => 'EXP_REG_ID_PROYECTO_KO',
                           
                        )
                    )
                )
            ),
            'nombre_proyecto' => array(
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
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/',
                            'personalized' => "personalized_nombre_proyecto(Array('Javi','Dani'))"
                        ),
                        'EDIT' => array(
                            'tam_min' => 3,
                            'tam_max' => 25,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/',
                           
                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 25,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]*$/',
                           
                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'tam_min' => 'TAM_MIN_NOMBRE_PROYECTO_KO',
                            'tam_max' => 'TAM_MAX_NOMBRE_PROYECTO_KO',
                            'exp_reg' => 'EXP_REG_NOMBRE_PROYECTO_KO',
                           
                        ),
                        'EDIT' => array(
                            'tam_min' => 'TAM_MIN_NOMBRE_PROYECTO_KO',
                            'tam_max' => 'TAM_MAX_NOMBRE_PROYECTO_KO',
                            'exp_reg' => 'EXP_REG_NOMBRE_PROYECTO_KO',
                           
                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 'TAM_MAX_NOMBRE_PROYECTO_KO',
                            'exp_reg' => 'EXP_REG_NOMBRE_PROYECTO_KO',
                            
                        )
                    )
                )
            ),
            'descripcion_proyecto' => array(
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
                            'tam_min' => 7,
                            'tam_max' => 255,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/',
                            
                        ),
                        'EDIT' => array(
                            'tam_min' => 1,
                            'tam_max' => 255,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/',
                           
                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 255,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]*$/',
                            
                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'tam_min' => 'TAM_MIN_DESCRIPCION_PROYECTO_KO',
                            'tam_max' => 'TAM_MAX_DESCRIPCION_PROYECTO_KO',
                            'exp_reg' => 'EXP_REG_DESCRIPCION_PROYECTO_KO',
                            
                        ),
                        'EDIT' => array(
                            'tam_min' => 'TAM_MIN_DESCRIPCION_PROYECTO_KO',
                            'tam_max' => 'TAM_MAX_DESCRIPCION_PROYECTO_KO',
                            'exp_reg' => 'EXP_REG_DESCRIPCION_PROYECTO_KO',
                           
                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 'TAM_MAX_DESCRIPCION_PROYECTO_KO',
                            'exp_reg' => 'EXP_REG_DESCRIPCION_PROYECTO_KO',
                            
                        )
                    )
                )
            ),
        )
    );
