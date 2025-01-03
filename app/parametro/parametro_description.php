<?php
$parametro_description =
    array(
        'entity' => 'parametro',
        'attributes' => array(
            'id_parametro' => array(
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
                            'exp_reg' => false,
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => false,
                            'tam_max' => 10,
                            'exp_reg' => false,
                            'personalized' => true
                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'tam_min' => 'KO_tam_min_id_parametro',
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
            'nombre_parametro' => array(
                'pk' => false,
                'autoincrement' => false,
                'numeric' => false,
                'not_null' => array(
                    'ADD' => true,
                    'EDIT' => true,
                    'DELETE' => false,
                ),
                'default_value' => false,
                'rules' => array(
                    'validations' => array(
                        'ADD' => array(
                            'tam_min' => 1,
                            'tam_max' => 45,
                            'exp_reg' => false,
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => 1,
                            'tam_max' => 45,
                            'exp_reg' => false,
                            'personalized' => true
                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'tam_min' => 'KO_tam_min_nombre_parametro',
                            'tam_max' => 'KO_tam_max_nombre_parametro',
                            'exp_reg' => false,
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => 'KO_tam_min_nombre_parametro',
                            'tam_max' => 'KO_tam_max_nombre_parametro',
                            'exp_reg' => false,
                            'personalized' => true
                        )
                    )
                )
            ),
            'descripcion_parametro' => array(
                'pk' => false,
                'autoincrement' => false,
                'numeric' => false,
                'not_null' => array(
                    'ADD' => true,
                    'EDIT' => true,
                    'DELETE' => false,
                ),
                'default_value' => false,
                'rules' => array(
                    'validations' => array(
                        'ADD' => array(
                            'tam_min' => 1,
                            'tam_max' => 200,
                            'exp_reg' => false,
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => 1,
                            'tam_max' => 200,
                            'exp_reg' => false,
                            'personalized' => true
                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'tam_min' => 'KO_tam_min_descripcion_parametro',
                            'tam_max' => 'KO_tam_max_descripcion_parametro',
                            'exp_reg' => false,
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => 'KO_tam_min_descripcion_parametro',
                            'tam_max' => 'KO_tam_max_descripcion_parametro',
                            'exp_reg' => false,
                            'personalized' => true
                        )
                    )
                )
            ),
            'tipo_parametro' => array(
                'pk' => false,
                'autoincrement' => false,
                'numeric' => false,
                'not_null' => array(
                    'ADD' => true,
                    'EDIT' => true,
                    'DELETE' => false,
                ),
                'default_value' => false,
                'rules' => array(
                    'validations' => array(
                        'ADD' => array(
                            'tam_min' => 1,
                            'tam_max' => 45,
                            'exp_reg' => false,
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => 1,
                            'tam_max' => 45,
                            'exp_reg' => false,
                            'personalized' => true
                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'tam_min' => 'KO_tam_min_tipo_parametro',
                            'tam_max' => 'KO_tam_max_tipo_parametro',
                            'exp_reg' => false,
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => 'KO_tam_min_tipo_parametro',
                            'tam_max' => 'KO_tam_max_tipo_parametro',
                            'exp_reg' => false,
                            'personalized' => true
                        )
                    )
                )
            ),
            'formato_parametro' => array(
                'pk' => false,
                'autoincrement' => false,
                'numeric' => false,
                'not_null' => array(
                    'ADD' => false,
                    'EDIT' => false,
                    'DELETE' => false,
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
                        )
                    )
                )
            ),
            'rango_desde_parametro' => array(
                'pk' => false,
                'autoincrement' => false,
                'numeric' => false,
                'not_null' => array(
                    'ADD' => false,
                    'EDIT' => false,
                    'DELETE' => false,
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
                        )
                    )
                )
            ),
            'rango_hasta_parametro' => array(
                'pk' => false,
                'autoincrement' => false,
                'numeric' => false,
                'not_null' => array(
                    'ADD' => false,
                    'EDIT' => false,
                    'DELETE' => false,
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
                        )
                    )
                )
            )
        )
    );
