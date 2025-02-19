<?php

$unidad_description =
    array(
        'entity' => 'unidad',
        'attributes' => array(
            'id_unidad' => array(
                'pk' => true,
                'autoincrement' => true,
                'type' => 'integer',
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
                            'min_size' => 'MIN_SIZE_ID_UNIDAD_KO',
                            'max_size' => 'MAX_SIZE_ID_UNIDAD_KO',
                            'exp_reg' => 'EXP_REG_ID_UNIDAD_KO',
                            
                        ),
                        'EDIT' => array(
                            'min_size' => 'MIN_SIZE_ID_UNIDAD_KO',
                            'max_size' => 'MAX_SIZE_ID_UNIDAD_KO',
                            'exp_reg' => 'EXP_REG_ID_UNIDAD_KO',
                            
                        ),
                        'SEARCH' => array(
                            'min_size' => false,
                            'max_size' => 'MAX_SIZE_ID_UNIDAD_KO',
                            'exp_reg' => 'EXP_REG_ID_UNIDAD_KO',
                            
                        )
                    )
                )
            ),
            'nombre_unidad' => array(
                'pk' => false,
                'autoincrement' => false,
                'type' => 'string',
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
                            'min_size' => 'MIN_SIZE_NOMBRE_UNIDAD_KO',
                            'max_size' => 'MAX_SIZE_NOMBRE_UNIDAD_KO',
                            'exp_reg' => 'EXP_REG_NOMBRE_UNIDAD_KO',
                            
                        ),
                        'EDIT' => array(
                            'min_size' => 'MIN_SIZE_NOMBRE_UNIDAD_KO',
                            'max_size' => 'MAX_SIZE_NOMBRE_UNIDAD_KO',
                            'exp_reg' => 'EXP_REG_NOMBRE_UNIDAD_KO',
                            
                        ),
                        'SEARCH' => array(
                            'min_size' => false,
                            'max_size' => 'MAX_SIZE_NOMBRE_UNIDAD_KO',
                            'exp_reg' => 'EXP_REG_NOMBRE_UNIDAD_KO',
                            
                        )
                    )
                )
            ),
            'descripcion_unidad' => array(
                'pk' => false,
                'autoincrement' => false,
                'type' => 'string',
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
                            'min_size' => 1,
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
                            'min_size' => 'MIN_SIZE_DESCRIPCION_UNIDAD_KO',
                            'max_size' => 'MAX_SIZE_DESCRIPCION_UNIDAD_KO',
                            'exp_reg' => 'EXP_REG_DESCRIPCION_UNIDAD_KO',
                            
                        ),
                        'EDIT' => array(
                            'min_size' => 'MIN_SIZE_DESCRIPCION_UNIDAD_KO',
                            'max_size' => 'MAX_SIZE_DESCRIPCION_UNIDAD_KO',
                            'exp_reg' => 'EXP_REG_DESCRIPCION_UNIDAD_KO',
                            
                        ),
                        'SEARCH' => array(
                            'min_size' => false,
                            'max_size' => 'MAX_SIZE_DESCRIPCION_UNIDAD_KO',
                            'exp_reg' => 'EXP_REG_DESCRIPCION_UNIDAD_KO',
                            
                        )
                    )
                )
            ),
            'id_parametro' => array(
                'pk' => false,
                'autoincrement' => false,
                'type' => 'integer',
                'foreign_key' => array(
                    'table' => array('parametro'),
                    'attribute' => array('id_parametro')
                ),
                'not_null' => array(
                    'ADD' => true,
                    'EDIT' => true,
                    'DELETE' => false,
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
                            
                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'min_size' => 'MIN_SIZE_ID_PARAMETRO_KO',
                            'max_size' => 'MAX_SIZE_ID_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_ID_PARAMETRO_KO',
                            
                        ),
                        'EDIT' => array(
                            'min_size' => 'MIN_SIZE_ID_PARAMETRO_KO',
                            'max_size' => 'MAX_SIZE_ID_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_ID_PARAMETRO_KO',
                            
                        ),
                        'SEARCH' => array(
                            'min_size' => false,
                            'max_size' => 'MAX_SIZE_ID_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_ID_PARAMETRO_KO',
                            
                        )
                    )
                )
            )
        ),
        'associations' => array(
            'BelongsTo' => array(
                'parametro' => array(
                    'className' => 'parametro',
                    'foreignKey' => 'id_parametro'
                )
            )
        )
    );
