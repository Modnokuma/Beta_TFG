<?php
const base_tests_description = array(
    'testAdd_usuario' => array(
        'variables' => array(
            'nombre_usuario' => 'Daniel',
            'organizacion_usuario' => 'ESEI',
            'puesto_usuario' => 'alumno',
            'direccion_usuario' => 'Calle A Nº1 4ºD',
            'correo_usuario' => 'a@a.es',
            'TESTING' => true,
            'action' => 'ADD',
            'controlador' => 'usuario'
        ),
        'mensaje' => 'SQL_OK'
    ),
    'testSearch_usuario' => array(
        'variables' => array(
            'TESTING' => true,
            'action' => 'SEARCH',
            'controlador' => 'usuario'
        ),
        'mensaje' => 'RECORDSET_DATOS'
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
            'controlador' => 'usuario'
        ),
        'mensaje' => 'SQL_OK'
    ),
    'testDelete_usuario' => array(
        'variables' => array(
            'id_usuario' => '1',
            'TESTING' => true,
            'action' => 'DELETE',
            'controlador' => 'usuario'
        ),
        'mensaje' => 'SQL_OK'
    ),
    'testAdd_proyecto' => array(
        'variables' => array(
            'nombre_proyecto' => 'DOU',
            'descripcion_proyecto' => 'Potabilidad del agua del Douro',
            'TESTING' => true,
            'action' => 'ADD',
            'controlador' => 'proyecto'
        ),
        'mensaje' => 'SQL_OK'
    ),
    'testSearch_proyecto' => array(
        'variables' => array(
            'TESTING' => true,
            'action' => 'SEARCH',
            'controlador' => 'proyecto'
        ),
        'mensaje' => 'RECORDSET_DATOS'
    ),
    'testEdit_proyecto' => array(
        'variables' => array(
            'id_proyecto' => '1',
            'nombre_proyecto' => 'DOU',
            'descripcion_proyecto' => 'Caudal del agua del Douro',
            'TESTING' => true,
            'action' => 'EDIT',
            'controlador' => 'proyecto'
        ),
        'mensaje' => 'SQL_OK'
    ),
    'testDelete_proyecto' => array(
        'variables' => array(
            'id_proyecto' => '1',
            'TESTING' => true,
            'action' => 'DELETE',
            'controlador' => 'proyecto'
        ),
        'mensaje' => 'SQL_OK'
    )
);
