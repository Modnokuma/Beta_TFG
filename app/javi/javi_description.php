<?php

$javi_description =
    array(
        'entity' => 'javi',
        'attributes' => array(
            'id_javi' => array(
                'pk' => true,
                'type' => 'integer',
            ),
            'id2_javi' => array(
                'pk' => true,
                'type' => 'integer',
            ),
            'nombre_javi' => array(
                'type' => 'string',
            )
        ),
        'associations' => array(
            'OneToMany' => array(
                array(
                    'entity' => 'unidad', 
                    'attributes-own' => array('id_javi','id2_javi'),
                    'attributes-rel' => array('id_unidad','id_parametro')
                ),
            ),
        ),
    );