<?php
$parametro_description =
    array(
        'entity' => 'parametro',
        'attributes' => array(
            'id_parametro' => array(
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
            ),
            'nombre_parametro' => array(
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
                            'min_size' => 'MIN_SIZE_NOMBRE_PARAMETRO_KO',
                            'max_size' => 'MAX_SIZE_NOMBRE_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_NOMBRE_PARAMETRO_KO',

                        ),
                        'EDIT' => array(
                            'min_size' => 'MIN_SIZE_NOMBRE_PARAMETRO_KO',
                            'max_size' => 'MAX_SIZE_NOMBRE_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_NOMBRE_PARAMETRO_KO',

                        ),
                        'SEARCH' => array(
                            'min_size' =>  false,
                            'max_size' => 'MAX_SIZE_NOMBRE_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_NOMBRE_PARAMETRO_KO',

                        )
                    )
                )
            ),
            'descripcion_parametro' => array(
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
                            'min_size' => 'MIN_SIZE_DESCRIPCION_PARAMETRO_KO',
                            'max_size' => 'MAX_SIZE_DESCRIPCION_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_DESCRIPCION_PARAMETRO_KO',

                        ),
                        'EDIT' => array(
                            'min_size' => 'MIN_SIZE_DESCRIPCION_PARAMETRO_KO',
                            'max_size' => 'MAX_SIZE_DESCRIPCION_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_DESCRIPCION_PARAMETRO_KO',

                        ),
                        'SEARCH' => array(
                            'min_size' => false,
                            'max_size' => 'MAX_SIZE_DESCRIPCION_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_DESCRIPCION_PARAMETRO_KO',

                        )
                    )
                )
            ),
            'tipo_parametro' => array(
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
                            'max_size' => 45,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/',

                        ),
                        'EDIT' => array(
                            'min_size' => 1,
                            'max_size' => 45,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/',

                        ),
                        'SEARCH' => array(
                            'min_size' => false,
                            'max_size' => 45,
                            'exp_reg' => '/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]*$/',

                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'min_size' => 'MIN_SIZE_TIPO_PARAMETRO_KO',
                            'max_size' => 'MAX_SIZE_TIPO_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_TIPO_PARAMETRO_KO',

                        ),
                        'EDIT' => array(
                            'min_size' => 'MIN_SIZE_TIPO_PARAMETRO_KO',
                            'max_size' => 'MAX_SIZE_TIPO_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_TIPO_PARAMETRO_KO',

                        ),
                        'SEARCH' => array(
                            'min_size' => false,
                            'max_size' => 'MAX_SIZE_TIPO_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_TIPO_PARAMETRO_KO',

                        )
                    )
                )
            ),
            'formato_parametro' => array(
                'pk' => false,
                'autoincrement' => false,
                'type' => 'string',
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
                            'min_size' => false,
                            'max_size' => 45,
                            'exp_reg' => '/.*/',

                        ),
                        'EDIT' => array(
                            'min_size' => false,
                            'max_size' => 45,
                            'exp_reg' => '/.*/',

                        ),
                        'SEARCH' => array(
                            'min_size' => false,
                            'max_size' => 45,
                            'exp_reg' => '/.*/',

                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'min_size' => 'MIN_SIZE_FORMATO_PARAMETRO_KO',
                            'max_size' => 'MAX_SIZE_FORMATO_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_FORMATO_PARAMETRO_KO',

                        ),
                        'EDIT' => array(
                            'min_size' => 'MIN_SIZE_FORMATO_PARAMETRO_KO',
                            'max_size' => 'MAX_SIZE_FORMATO_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_FORMATO_PARAMETRO_KO',

                        ),
                        'SEARCH' => array(
                            'min_size' => false,
                            'max_size' => 'MAX_SIZE_FORMATO_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_FORMATO_PARAMETRO_KO',

                        )
                    )
                )
            ),
            'rango_desde_parametro' => array(
                'pk' => false,
                'autoincrement' => false,
                'type' => 'numeric',
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
                            'min_size' => false,
                            'max_size' => 45,
                            'exp_reg' => '/.*/',

                        ),
                        'EDIT' => array(
                            'min_size' => false,
                            'max_size' => 45,
                            'exp_reg' => '/.*/',

                        ),
                        'SEARCH' => array(
                            'min_size' => false,
                            'max_size' => 45,
                            'exp_reg' => '/.*/',

                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'min_size' => 'MIN_SIZE_RANGO_DESDE_PARAMETRO_KO',
                            'max_size' => 'MAX_SIZE_RANGO_DESDE_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_RANGO_DESDE_PARAMETRO_KO',

                        ),
                        'EDIT' => array(
                            'min_size' => 'MIN_SIZE_RANGO_DESDE_PARAMETRO_KO',
                            'max_size' => 'MAX_SIZE_RANGO_DESDE_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_RANGO_DESDE_PARAMETRO_KO',

                        ),
                        'SEARCH' => array(
                            'min_size' => false,
                            'max_size' => 'MAX_SIZE_RANGO_DESDE_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_RANGO_DESDE_PARAMETRO_KO',

                        )
                    )
                )
            ),
            'rango_hasta_parametro' => array(
                'pk' => false,
                'autoincrement' => false,
                'type' => 'numeric',
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
                            'min_size' => false,
                            'max_size' => 45,
                            'exp_reg' => '/.*/',

                        ),
                        'EDIT' => array(
                            'min_size' => false,
                            'max_size' => 45,
                            'exp_reg' => '/.*/',

                        ),
                        'SEARCH' => array(
                            'min_size' => false,
                            'max_size' => 45,
                            'exp_reg' => '/.*/',

                        )
                    ),
                    'error' => array(
                        'ADD' => array(
                            'min_size' => 'MIN_SIZE_RANGO_HASTA_PARAMETRO_KO',
                            'max_size' => 'MAX_SIZE_RANGO_HASTA_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_RANGO_HASTA_PARAMETRO_KO',

                        ),
                        'EDIT' => array(
                            'min_size' => 'MIN_SIZE_RANGO_HASTA_PARAMETRO_KO',
                            'max_size' => 'MAX_SIZE_RANGO_HASTA_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_RANGO_HASTA_PARAMETRO_KO',

                        ),
                        'SEARCH' => array(
                            'min_size' => false,
                            'max_size' => 'MAX_SIZE_RANGO_HASTA_PARAMETRO_KO',
                            'exp_reg' => 'EXP_REG_RANGO_HASTA_PARAMETRO_KO',

                        )
                    )
                )
            )
        ),
        'associations' => array(
            'OneToMany' => array(
                'entity' => array('unidad'),
                'attributes-own' => array('id_parametro'),
                'attributes-rel' => array('id_parametro')
            )
        ),

    );


    /*
    // decia algo como esto. se recorre el onetomany y por cada uno se recoge la entidad y los atributos involucrados
    
            'OneToMany' => array(
                array(
                    'entity' => 'unidad', 
                    'attributes-own' => array('id_parametro'),
                    'attributes-rel' => array('id_parametro')
                ),
                array(
                    'entity' => 'otraentidad', 
                    'attributes-own' => array('id_otraentidad'),
                    'attributes-rel' => array('id_otraentidad')
                )
            )

    */