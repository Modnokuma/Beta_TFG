<?php
$base_tests_description = array(
        'testAdd' => array(
            'variables' => array(
                'nombre_usuario' => 'Daniel',
                'organizacion_usuario' => 'ESEI',
                'puesto_usuario' => 'alumno',
                'direccion_usuario' => 'Calle A Nº1 4ºD',
                'correo_usuario' => ''
            ),
            'action' => 'ADD',
            'controlador' => 'usuario',
            'mensaje' => 'ADD_OK'
        ),
        'testEdit' => array(
            'variables' => array(
                'nombre_usuario' => 'DanielEdit',
                'organizacion_usuario' => 'ESEI',
                'puesto_usuario' => 'alumno',
                'direccion_usuario' => 'Calle A Nº1 4ºD',
                'correo_usuario' => ''
            ),
            'action' => 'EDIT',
            'controlador' => 'usuario',
            'mensaje' => 'EDIT_OK'
        ),
        'testSearch' => array(
            'variables' => array(
                'nombre_usuario' => 'Daniel',
                
            ),
            'action' => 'SEARCH',
            'controlador' => 'usuario',
            'mensaje' => 'SEARCH_OK'
        ),
        'testDelete' => array(
            'variables' => array(
                'nombre_usuario' => 'DanielEdit',
                
            ),
            'action' => 'DELETE',
            'controlador' => 'usuario',
            'mensaje' => 'DELETE_OK'
        )
    );