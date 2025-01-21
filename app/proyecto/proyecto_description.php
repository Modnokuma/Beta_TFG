<?php

$proyecto_description =
    array(
        'entity' => 'proyecto',
        'attributes' => array(
            'id_proyecto' => array(
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
                            'tam_min' => 'KO_tam_min_id_proyecto',
                            'tam_max' => 'KO_tam_max_id_proyecto',
                            'exp_reg' => 'KO_exp_reg_id_proyecto',
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => 'KO_tam_min_id_proyecto',
                            'tam_max' => 'KO_tam_max_id_proyecto',
                            'exp_reg' => 'KO_exp_reg_id_proyecto',
                            'personalized' => true
                        ),
                        'SEARCH' => array(
                            'tam_min' => 'KO_tam_min_id_proyecto',
                            'tam_max' => 'KO_tam_max_id_proyecto',
                            'exp_reg' => 'KO_exp_reg_id_proyecto',
                            'personalized' => true
                        )
                    )
                )
            ),
            'nombre_proyecto' => array(
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
                            'tam_min' => 'KO_tam_min_nombre_proyecto',
                            'tam_max' => 'KO_tam_max_nombre_proyecto',
                            'exp_reg' => 'KO_exp_reg_nombre_proyecto',
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => 'KO_tam_min_nombre_proyecto',
                            'tam_max' => 'KO_tam_max_nombre_proyecto',
                            'exp_reg' => 'KO_exp_reg_nombre_proyecto',
                            'personalized' => true
                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 'KO_tam_max_nombre_proyecto',
                            'exp_reg' => 'KO_exp_reg_nombre_proyecto',
                            'personalized' => true
                        )
                    )
                )
            ),
            'descripcion_proyecto' => array(
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
                            'tam_min' => 'KO_tam_min_descripcion_proyecto',
                            'tam_max' => 'KO_tam_max_descripcion_proyecto',
                            'exp_reg' => 'KO_exp_reg_descripcion_proyecto',
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => 'KO_tam_min_descripcion_proyecto',
                            'tam_max' => 'KO_tam_max_descripcion_proyecto',
                            'exp_reg' => 'KO_exp_reg_descripcion_proyecto',
                            'personalized' => true
                        ),
                        'SEARCH' => array(
                            'tam_min' => false,
                            'tam_max' => 'KO_tam_max_descripcion_proyecto',
                            'exp_reg' => 'KO_exp_reg_descripcion_proyecto',
                            'personalized' => true
                        )
                    )
                )
            )
        )
    );
