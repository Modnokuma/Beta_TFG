<?php
$parametro_description =
    array(
        'entity' => 'parametro',
        'attributes' => array(
            'id_parametro' => array(
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
                            'tam_min' => 'KO_tam_min_id_parametro',
                            'tam_max' => 'KO_tam_max_id_parametro',
                            'exp_reg' => 'KO_exp_reg_id_parametro',
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => 'KO_tam_min_id_parametro',
                            'tam_max' => 'KO_tam_max_id_parametro',
                            'exp_reg' => 'KO_exp_reg_id_parametro',
                            'personalized' => true
                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 'KO_tam_max_id_parametro',
                            'exp_reg' => 'KO_exp_reg_id_parametro',
                            'personalized' => true
                        )
                    )
                )
            ),
            'nombre_parametro' => array(
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
                            'tam_min' => 'KO_tam_min_nombre_parametro',
                            'tam_max' => 'KO_tam_max_nombre_parametro',
                            'exp_reg' => 'KO_exp_reg_nombre_parametro',
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => 'KO_tam_min_nombre_parametro',
                            'tam_max' => 'KO_tam_max_nombre_parametro',
                            'exp_reg' => 'KO_exp_reg_nombre_parametro',
                            'personalized' => true
                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 'KO_tam_max_nombre_parametro',
                            'exp_reg' => 'KO_exp_reg_nombre_parametro',
                            'personalized' => true
                        )
                    )
                )
            ),
            'descripcion_parametro' => array(
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
                            'tam_min' => 'KO_tam_min_descripcion_parametro',
                            'tam_max' => 'KO_tam_max_descripcion_parametro',
                            'exp_reg' => 'KO_exp_reg_descripcion_parametro',
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => 'KO_tam_min_descripcion_parametro',
                            'tam_max' => 'KO_tam_max_descripcion_parametro',
                            'exp_reg' => 'KO_exp_reg_descripcion_parametro',
                            'personalized' => true
                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 'KO_tam_max_descripcion_parametro',
                            'exp_reg' => 'KO_exp_reg_descripcion_parametro',
                            'personalized' => true
                        )
                    )
                )
            ),
            'tipo_parametro' => array(
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
                            'tam_min' => 1,
                            'tam_max' => 45,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/',
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => 1,
                            'tam_max' => 45,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/',
                            'personalized' => true
                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 45,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]*$/',
                            'personalized' => true
                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'tam_min' => 'KO_tam_min_tipo_parametro',
                            'tam_max' => 'KO_tam_max_tipo_parametro',
                            'exp_reg' => 'KO_exp_reg_tipo_parametro',
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => 'KO_tam_min_tipo_parametro',
                            'tam_max' => 'KO_tam_max_tipo_parametro',
                            'exp_reg' => 'KO_exp_reg_tipo_parametro',
                            'personalized' => true
                        ),
                        'SEARCH' => array(
                            'tam_min' => 'KO_tam_min_tipo_parametro',
                            'tam_max' => 'KO_tam_max_tipo_parametro',
                            'exp_reg' => 'KO_exp_reg_tipo_parametro',
                            'personalized' => true
                        )
                    )
                )
            ),
            'formato_parametro' => array(
                'pk' => false,
                'autoincrement' => false,
                'numeric' => false,
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
                            'exp_reg' => false,
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => false,
                            'tam_max' => 45,
                            'exp_reg' => false,
                            'personalized' => true
                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 45,
                            'exp_reg' => false,
                            'personalized' => true
                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'tam_min' => 'KO_tam_min_formato_parametro',
                            'tam_max' => 'KO_tam_max_formato_parametro',
                            'exp_reg' => false,
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => 'KO_tam_min_formato_parametro',
                            'tam_max' => 'KO_tam_max_formato_parametro',
                            'exp_reg' => false,
                            'personalized' => true
                        ),
                        'SEARCH' => array(
                            'tam_min' => 'KO_tam_min_formato_parametro',
                            'tam_max' => 'KO_tam_max_formato_parametro',
                            'exp_reg' => false,
                            'personalized' => true
                        )
                    )
                )
            ),
            'rango_desde_parametro' => array(
                'pk' => false,
                'autoincrement' => false,
                'numeric' => false,
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
                            'exp_reg' => false,
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => false,
                            'tam_max' => 45,
                            'exp_reg' => false,
                            'personalized' => true
                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 45,
                            'exp_reg' => false,
                            'personalized' => true
                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'tam_min' => 'KO_tam_min_rango_desde_parametro',
                            'tam_max' => 'KO_tam_max_rango_desde_parametro',
                            'exp_reg' => false,
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => 'KO_tam_min_rango_desde_parametro',
                            'tam_max' => 'KO_tam_max_rango_desde_parametro',
                            'exp_reg' => false,
                            'personalized' => true
                        ),
                        'SEARCH' => array(
                            'tam_min' => 'KO_tam_min_rango_desde_parametro',
                            'tam_max' => 'KO_tam_max_rango_desde_parametro',
                            'exp_reg' => false,
                            'personalized' => true
                        )
                    )
                )
            ),
            'rango_hasta_parametro' => array(
                'pk' => false,
                'autoincrement' => false,
                'numeric' => false,
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
                            'exp_reg' => false,
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => false,
                            'tam_max' => 45,
                            'exp_reg' => false,
                            'personalized' => true
                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 45,
                            'exp_reg' => false,
                            'personalized' => true
                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'tam_min' => 'KO_tam_min_rango_hasta_parametro',
                            'tam_max' => 'KO_tam_max_rango_hasta_parametro',
                            'exp_reg' => false,
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => 'KO_tam_min_rango_hasta_parametro',
                            'tam_max' => 'KO_tam_max_rango_hasta_parametro',
                            'exp_reg' => false,
                            'personalized' => true
                        ),
                        'SEARCH' => array(
                            'tam_min' => 'KO_tam_min_rango_hasta_parametro',
                            'tam_max' => 'KO_tam_max_rango_hasta_parametro',
                            'exp_reg' => false,
                            'personalized' => true
                        )
                    )
                )
            )
        ),
        'associations' => array(
            'HasMany' => array(
                'unidad' => array(
                    'className' => 'unidad',
                    'foreignKey' => 'id_parametro',
                    'dependent' => true
                )
            )
        )
    );
