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
                            'min_size' => false,
                            'max_size' => 10,
                            'exp_reg' => '/.*/',
                           
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
                            'min_size' => 'MIN_SIZE_ID_PROYECTO_KO',
                            'max_size' => 'MAX_SIZE_ID_PROYECTO_KO',
                            'exp_reg' => 'EXP_REG_ID_PROYECTO_KO',
                           
                        ),
                        'EDIT' => array(
                            'min_size' => 'MIN_SIZE_ID_PROYECTO_KO',
                            'max_size' => 'MAX_SIZE_ID_PROYECTO_KO',
                            'exp_reg' => 'EXP_REG_ID_PROYECTO_KO',
                           
                        ),
                        'SEARCH' => array(
                            'min_size' => false,
                            'max_size' => 'MAX_SIZE_ID_PROYECTO_KO',
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
                            'min_size' => 3,
                            'max_size' => 25,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/',
                            'personalized' => "personalized_nombre_proyecto(Array('Javi','Dani'))"
                        ),
                        'EDIT' => array(
                            'min_size' => 3,
                            'max_size' => 25,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/',
                           
                        ),
                        'SEARCH' => array(
                            'min_size' => false,
                            'max_size' => 25,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]*$/',
                           
                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'min_size' => 'MIN_SIZE_NOMBRE_PROYECTO_KO',
                            'max_size' => 'MAX_SIZE_NOMBRE_PROYECTO_KO',
                            'exp_reg' => 'EXP_REG_NOMBRE_PROYECTO_KO',
                           
                        ),
                        'EDIT' => array(
                            'min_size' => 'MIN_SIZE_NOMBRE_PROYECTO_KO',
                            'max_size' => 'MAX_SIZE_NOMBRE_PROYECTO_KO',
                            'exp_reg' => 'EXP_REG_NOMBRE_PROYECTO_KO',
                           
                        ),
                        'SEARCH' => array(
                            'min_size' => false,
                            'max_size' => 'MAX_SIZE_NOMBRE_PROYECTO_KO',
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
                            'min_size' => false,
                            'max_size' => 255,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]*$/',
                            
                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'min_size' => 'MIN_SIZE_DESCRIPCION_PROYECTO_KO',
                            'max_size' => 'MAX_SIZE_DESCRIPCION_PROYECTO_KO',
                            'exp_reg' => 'EXP_REG_DESCRIPCION_PROYECTO_KO',
                            
                        ),
                        'EDIT' => array(
                            'min_size' => 'MIN_SIZE_DESCRIPCION_PROYECTO_KO',
                            'max_size' => 'MAX_SIZE_DESCRIPCION_PROYECTO_KO',
                            'exp_reg' => 'EXP_REG_DESCRIPCION_PROYECTO_KO',
                           
                        ),
                        'SEARCH' => array(
                            'min_size' => false,
                            'max_size' => 'MAX_SIZE_DESCRIPCION_PROYECTO_KO',
                            'exp_reg' => 'EXP_REG_DESCRIPCION_PROYECTO_KO',
                            
                        )
                    )
                )
            ),
        )
    );
