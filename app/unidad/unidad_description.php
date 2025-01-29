<?php

$unidad_description =
    array(
        'entity' => 'unidad',
        'attributes' => array(
            'id_unidad' => array(
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
                            'tam_min' => 'TAM_MIN_ID_UNIDAD_KO',
                            'tam_max' => 'TAM_MAX_ID_UNIDAD_KO',
                            'exp_reg' => 'EXP_REG_ID_UNIDAD_KO',
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => 'TAM_MIN_ID_UNIDAD_KO',
                            'tam_max' => 'TAM_MAX_ID_UNIDAD_KO',
                            'exp_reg' => 'EXP_REG_ID_UNIDAD_KO',
                            'personalized' => true
                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 'TAM_MAX_ID_UNIDAD_KO',
                            'exp_reg' => 'EXP_REG_ID_UNIDAD_KO',
                            'personalized' => true
                        )
                    )
                )
            ),
            'nombre_unidad' => array(
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
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => 3,
                            'tam_max' => 25,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/',
                            'personalized' => true
                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 25,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]*$/',
                            'personalized' => true
                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'tam_min' => 'TAM_MIN_NOMBRE_UNIDAD_KO',
                            'tam_max' => 'TAM_MAX_NOMBRE_UNIDAD_KO',
                            'exp_reg' => 'EXP_REG_NOMBRE_UNIDAD_KO',
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => 'TAM_MIN_NOMBRE_UNIDAD_KO',
                            'tam_max' => 'TAM_MAX_NOMBRE_UNIDAD_KO',
                            'exp_reg' => 'EXP_REG_NOMBRE_UNIDAD_KO',
                            'personalized' => true
                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 'TAM_MAX_NOMBRE_UNIDAD_KO',
                            'exp_reg' => 'EXP_REG_NOMBRE_UNIDAD_KO',
                            'personalized' => true
                        )
                    )
                )
            ),
            'descripcion_unidad' => array(
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
                            'tam_min' => 1,
                            'tam_max' => 255,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/',
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => 1,
                            'tam_max' => 255,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/',
                            'personalized' => true
                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 255,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]*$/',
                            'personalized' => true
                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'tam_min' => 'TAM_MIN_DESCRIPCION_UNIDAD_KO',
                            'tam_max' => 'TAM_MAX_DESCRIPCION_UNIDAD_KO',
                            'exp_reg' => 'EXP_REG_DESCRIPCION_UNIDAD_KO',
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => 'TAM_MIN_DESCRIPCION_UNIDAD_KO',
                            'tam_max' => 'TAM_MAX_DESCRIPCION_UNIDAD_KO',
                            'exp_reg' => 'EXP_REG_DESCRIPCION_UNIDAD_KO',
                            'personalized' => true
                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 'TAM_MAX_DESCRIPCION_UNIDAD_KO',
                            'exp_reg' => 'EXP_REG_DESCRIPCION_UNIDAD_KO',
                            'personalized' => true
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
                            'tam_min' => false,
                            'tam_max' => 10,
                            'exp_reg' => '/.*/',
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => false,
                            'tam_max' => 10,
                            'exp_reg' => '/.*/',
                            'personalized' => true
                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'tam_min' => 'TAM_MIN_ID_PARAMETRO_KO',
                            'tam_max' => 'TAM_MAX_ID_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_ID_PARAMETRO_KO',
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => 'TAM_MIN_ID_PARAMETRO_KO',
                            'tam_max' => 'TAM_MAX_ID_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_ID_PARAMETRO_KO',
                            'personalized' => true
                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 'TAM_MAX_ID_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_ID_PARAMETRO_KO',
                            'personalized' => true
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
