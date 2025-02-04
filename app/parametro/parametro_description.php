<?php
$parametro_description =
    array(
        'entity' => 'parametro',
        'attributes' => array(
            'id_parametro' => array(
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
                            'tam_min' => 'TAM_MIN_ID_PARAMETRO_KO',
                            'tam_max' => 'TAM_MAX_ID_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_ID_PARAMETRO_KO',
                        ),
                        'EDIT' => array(
                            'tam_min' => 'TAM_MIN_ID_PARAMETRO_KO',
                            'tam_max' => 'TAM_MAX_ID_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_ID_PARAMETRO_KO',

                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 'TAM_MAX_ID_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_ID_PARAMETRO_KO',

                        )
                    )
                )
            ),
            'nombre_parametro' => array(
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
                            'tam_min' => 'TAM_MIN_NOMBRE_PARAMETRO_KO',
                            'tam_max' => 'TAM_MAX_NOMBRE_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_NOMBRE_PARAMETRO_KO',

                        ),
                        'EDIT' => array(
                            'tam_min' => 'TAM_MIN_NOMBRE_PARAMETRO_KO',
                            'tam_max' => 'TAM_MAX_NOMBRE_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_NOMBRE_PARAMETRO_KO',

                        ),
                        'SEARCH' => array(
                            'tam_min' =>  false,
                            'tam_max' => 'TAM_MAX_NOMBRE_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_NOMBRE_PARAMETRO_KO',

                        )
                    )
                )
            ),
            'descripcion_parametro' => array(
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
                            'tam_min' => 'TAM_MIN_DESCRIPCION_PARAMETRO_KO',
                            'tam_max' => 'TAM_MAX_DESCRIPCION_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_DESCRIPCION_PARAMETRO_KO',

                        ),
                        'EDIT' => array(
                            'tam_min' => 'TAM_MIN_DESCRIPCION_PARAMETRO_KO',
                            'tam_max' => 'TAM_MAX_DESCRIPCION_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_DESCRIPCION_PARAMETRO_KO',

                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 'TAM_MAX_DESCRIPCION_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_DESCRIPCION_PARAMETRO_KO',

                        )
                    )
                )
            ),
            'tipo_parametro' => array(
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
                            'tam_max' => 45,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/',

                        ),
                        'EDIT' => array(
                            'tam_min' => 1,
                            'tam_max' => 45,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/',

                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 45,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]*$/',

                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'tam_min' => 'TAM_MIN_TIPO_PARAMETRO_KO',
                            'tam_max' => 'TAM_MAX_TIPO_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_TIPO_PARAMETRO_KO',

                        ),
                        'EDIT' => array(
                            'tam_min' => 'TAM_MIN_TIPO_PARAMETRO_KO',
                            'tam_max' => 'TAM_MAX_TIPO_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_TIPO_PARAMETRO_KO',

                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 'TAM_MAX_TIPO_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_TIPO_PARAMETRO_KO',

                        )
                    )
                )
            ),
            'formato_parametro' => array(
                'pk' => false,
                'autoincrement' => false,
                'type' => 'string',
                'foreign_key' => array(
                    'table' => false,
                    'attribute' => false
                ),
                'not_null' => array(
                    'ADD' => false,
                    'EDIT' => false,
                    'DELETE' => false,
                    'SEARCH' => false
                ),
                'default_value' => false,
                'rules' => array(
                    'validations' => array(
                        'ADD' => array(
                            'tam_min' => false,
                            'tam_max' => 45,
                            'exp_reg' => '/.*/',

                        ),
                        'EDIT' => array(
                            'tam_min' => false,
                            'tam_max' => 45,
                            'exp_reg' => '/.*/',

                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 45,
                            'exp_reg' => '/.*/',

                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'tam_min' => 'TAM_MIN_FORMATO_PARAMETRO_KO',
                            'tam_max' => 'TAM_MAX_FORMATO_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_FORMATO_PARAMETRO_KO',

                        ),
                        'EDIT' => array(
                            'tam_min' => 'TAM_MIN_FORMATO_PARAMETRO_KO',
                            'tam_max' => 'TAM_MAX_FORMATO_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_FORMATO_PARAMETRO_KO',

                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 'TAM_MAX_FORMATO_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_FORMATO_PARAMETRO_KO',

                        )
                    )
                )
            ),
            'rango_desde_parametro' => array(
                'pk' => false,
                'autoincrement' => false,
                'type' => 'numeric',
                'foreign_key' => array(
                    'table' => false,
                    'attribute' => false
                ),
                'not_null' => array(
                    'ADD' => false,
                    'EDIT' => false,
                    'DELETE' => false,
                    'SEARCH' => false
                ),
                'default_value' => false,
                'rules' => array(
                    'validations' => array(
                        'ADD' => array(
                            'tam_min' => false,
                            'tam_max' => 45,
                            'exp_reg' => '/.*/',

                        ),
                        'EDIT' => array(
                            'tam_min' => false,
                            'tam_max' => 45,
                            'exp_reg' => '/.*/',

                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 45,
                            'exp_reg' => '/.*/',

                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'tam_min' => 'TAM_MIN_RANGO_DESDE_PARAMETRO_KO',
                            'tam_max' => 'TAM_MAX_RANGO_DESDE_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_RANGO_DESDE_PARAMETRO_KO',

                        ),
                        'EDIT' => array(
                            'tam_min' => 'TAM_MIN_RANGO_DESDE_PARAMETRO_KO',
                            'tam_max' => 'TAM_MAX_RANGO_DESDE_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_RANGO_DESDE_PARAMETRO_KO',

                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 'TAM_MAX_RANGO_DESDE_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_RANGO_DESDE_PARAMETRO_KO',

                        )
                    )
                )
            ),
            'rango_hasta_parametro' => array(
                'pk' => false,
                'autoincrement' => false,
                'type' => 'numeric',
                'foreign_key' => array(
                    'table' => false,
                    'attribute' => false
                ),
                'not_null' => array(
                    'ADD' => false,
                    'EDIT' => false,
                    'DELETE' => false,
                    'SEARCH' => false
                ),
                'default_value' => false,
                'rules' => array(
                    'validations' => array(
                        'ADD' => array(
                            'tam_min' => false,
                            'tam_max' => 45,
                            'exp_reg' => '/.*/',

                        ),
                        'EDIT' => array(
                            'tam_min' => false,
                            'tam_max' => 45,
                            'exp_reg' => '/.*/',

                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 45,
                            'exp_reg' => '/.*/',

                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'tam_min' => 'TAM_MIN_RANGO_HASTA_PARAMETRO_KO',
                            'tam_max' => 'TAM_MAX_RANGO_HASTA_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_RANGO_HASTA_PARAMETRO_KO',

                        ),
                        'EDIT' => array(
                            'tam_min' => 'TAM_MIN_RANGO_HASTA_PARAMETRO_KO',
                            'tam_max' => 'TAM_MAX_RANGO_HASTA_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_RANGO_HASTA_PARAMETRO_KO',

                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 'TAM_MAX_RANGO_HASTA_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_RANGO_HASTA_PARAMETRO_KO',

                        )
                    )
                )
            )
        ),
        'associations' => array(
            'HasMany' => array(
                'Unidad' => array(
                    'className' => 'Unidad',
                    'foreignKey' => 'id_parametro',
                    'dependent' => true
                )
            )
        )
    );
