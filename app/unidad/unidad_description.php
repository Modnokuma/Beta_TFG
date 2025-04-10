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
                    'EDIT' => true,
                    'DELETE' => true
                ),
                'rules' => array(
                    'validations' => array(
                        'ADD' => array(
                            'max_size' => 10,
                            'exp_reg' => '/.*/',
                            
                        ),
                        'EDIT' => array(
                            'max_size' => 10,
                            'exp_reg' => '/.*/',
                            
                        ),
                        'SEARCH' => array(
                            'max_size' => 10,
                            'exp_reg' => '/.*/',
                            
                        )
                    )
                )
            ),
            'nombre_unidad' => array(
                'type' => 'string',
                'not_null' => array(
                    'ADD' => true,
                    'EDIT' => true
                ),
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
                            'max_size' => 25,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]*$/',
                            
                        )
                    )
                )
            ),
            'descripcion_unidad' => array(
                'type' => 'string',
                'not_null' => array(
                    'ADD' => true,
                    'EDIT' => true
                ),
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
                            'max_size' => 255,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]*$/',
                            
                        )
                    )
                )
            ),
            'id_parametro' => array(
                'type' => 'integer',
               /* 'foreign_key' => array(
                    'table' => array('parametro'),
                    'attribute' => array('id_parametro')
                ),*/
                'not_null' => array(
                    'ADD' => true,
                    'EDIT' => true
                ),
                'rules' => array(
                    'validations' => array(
                        'ADD' => array(
                            'max_size' => 10,
                            'exp_reg' => '/.*/',
                            
                        ),
                        'EDIT' => array(
                            'max_size' => 10,
                            'exp_reg' => '/.*/',
                            
                        )
                    )
                )
            )
        ),
        'associations' => array(
            'BelongsTo' => array(
                /*array(
                    'entity' => 'unidad', 
                    'attributes-own' => array('id_unidad','id_parametro'),
                    'attributes-rel' => array('id_javi','id2_javi')
                ),*/
                array(
                    'entity' => 'parametro', 
                    'attributes-own' => array('id_parametro'),
                    'attributes-rel' => array('id_parametro')
                ),
            ),
        )
    );
