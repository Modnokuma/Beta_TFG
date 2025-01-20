<?php

$unidad_description =
    array(
        'entity' => 'unidad',
        'attributes' => array(
            'id_unidad' => array(
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
                            'tam_min' => 'KO_tam_min_id_unidad',
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
                    )
                )
            ),
            'nombre_unidad' => array(
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
                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'tam_min' => 'KO_tam_min_nombre_unidad',
                            'tam_max' => 'KO_tam_max_nombre_unidad',
                            'exp_reg' => false,
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => 'KO_tam_min_nombre_unidad',
                            'tam_max' => 'KO_tam_max_nombre_unidad',
                            'exp_reg' => false,
                            'personalized' => true
                        )
                    )
                )
            ),
            'descripcion_unidad' => array(
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
                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'tam_min' => 'KO_tam_min_descripcion_unidad',
                            'tam_max' => 'KO_tam_max_descripcion_unidad',
                            'exp_reg' => false,
                            'personalized' => true
                        ),
                        'EDIT' => array(
                            'tam_min' => 'KO_tam_min_descripcion_unidad',
                            'tam_max' => 'KO_tam_max_descripcion_unidad',
                            'exp_reg' => false,
                            'personalized' => true
                        )
                    )
                )
            ),
            'id_parametro' => array(
                'pk' => false,
                'autoincrement' => false,
                'numeric' => true,
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