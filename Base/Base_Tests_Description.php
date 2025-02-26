<?php
const base_tests_description = array(
        'testSearch_usuario' => array(
            'variables' => array(
                'TESTING' => true,
                'action' => 'SEARCH',
                'controlador' => 'usuario'),
            'mensaje' => 'RECORDSET_DATOS'
        ),
        'testAdd_usuario' => array(
            'variables' => array(
                'nombre_usuario' => 'Daniel',
                'organizacion_usuario' => 'ESEI',
                'puesto_usuario' => 'alumno',
                'direccion_usuario' => 'Calle A Nº1 4ºD',
                'correo_usuario' => 'a@a.es',
                'TESTING' => true,
                'action' => 'ADD',
                'controlador' => 'usuario'),
            'mensaje' => 'SQL_OK'
        ),
        'testEdit_usuario' => array(
            'variables' => array(
                'id_usuario' => '1',
                'nombre_usuario' => 'DanielEdit',
                'organizacion_usuario' => 'ESEI',
                'puesto_usuario' => 'alumno',
                'direccion_usuario' => 'Calle A Nº1 4ºD',
                'correo_usuario' => 'b@b.es',
                'TESTING' => true,
                'action' => 'EDIT',
                'controlador' => 'usuario'),
            'mensaje' => 'SQL_OK'
        ),
        'testDelete_usuario' => array(
            'variables' => array(
                'id_usuario' => '1',
                'TESTING' => true,
                'action' => 'DELETE',
                'controlador' => 'usuario'),
            'mensaje' => 'SQL_OK'
        )
    );