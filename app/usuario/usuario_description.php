<?php
$usuario_description =
    array(
        'entity' => 'usuario',
        'onetomany-rel' => array(
            'attributes-own' => array('id_usuario'),
            'entity-rel' => 'notas',
            'attributes-rel' => array('id_usuario')
        ),
        'attributes' => array(
            'id_usuario' => array(
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
                            'tam_min' => 'KO_tam_min_id_usuario',
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
            'nombre_usuario' => array(
                'pk' => false,
                'autoincrement' => false,
                'numeric' => false,
                'not_null' => array(
                    'ADD' => true,
                    'EDIT' => true,
                    'DELETE' => false,
                ),
                'default_value' => false,
                'test' => array(
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
                )
            ),

            'organizacion_usuario' => array(
                'pk' => false,
                'autoincrement' => false,
                'numeric' => false,
                'not_null' => array(
                    'ADD' => true,
                    'EDIT' => true,
                    'DELETE' => false
                ),
                'default_value' => false,
                'test' => array(
                    'ADD' => array(
                        'tam_min' => false,
                        'tam_max' => 45,
                        'exp_reg' => false,
                        'personalized' => true //no se
                    ),
                    'EDIT' => array(
                        'tam_min' => false,
                        'tam_max' => 45,
                        'exp_reg' => false,
                        'personalized' => true //no se
                    )
                )
            ),
            'puesto_usuario' => array(
                'pk' => false,
                'autoincrement' => false,
                'numeric' => false,
                'not_null' => array(
                    'ADD' => true,
                    'EDIT' => true,
                    'DELETE' => false
                ),
                'default_value' => 'alumno',
                'test' => array(
                    'ADD' => array(
                        'tam_min' => false,
                        'tam_max' => 45,
                        'exp_reg' => false,
                        'personalized' => true //no se
                    ),
                    'EDIT' => array(
                        'tam_min' => false,
                        'tam_max' => 45,
                        'exp_reg' => false,
                        'personalized' => true //no se
                    )
                )
            ),

            'direccion_usuario' => array(
                'pk' => false,
                'autoincrement' => false,
                'numeric' => false,
                'not_null' => array(
                    'ADD' => true,
                    'EDIT' => true,
                    'DELETE' => false
                ),
                'default_value' => false,
                'test' => array(
                    'ADD' => array(
                        'tam_min' => false,
                        'tam_max' => 200,
                        'exp_reg' => false,
                        'personalized' => true //no se
                    ),
                    'EDIT' => array(
                        'tam_min' => false,
                        'tam_max' => 200,
                        'exp_reg' => false,
                        'personalized' => true //no se
                    )
                )
            ),

            'correo_usuario' => array(
                'pk' => false,
                'autoincrement' => false,
                'numeric' => false,
                'not_null' => array(
                    'ADD' => true,
                    'EDIT' => true,
                    'DELETE' => false
                ),
                'default_value' => false,
                'test' => array(
                    'ADD' => array(
                        'tam_min' => false,
                        'tam_max' => 45,
                        'exp_reg' => false, //posiblemente
                        'personalized' => true //no se
                    ),
                    'EDIT' => array(
                        'tam_min' => false,
                        'tam_max' => 45,
                        'exp_reg' => false,  //posiblemente
                        'personalized' => true //no se
                    )
                )
            )
        )
    );
