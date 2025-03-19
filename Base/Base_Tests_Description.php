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
            'id_usuario' => '3',
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
            'id_usuario' => '3',
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
    ),
    'testAdd_parametro' => array(
        'variables' => array(
            'nombre_parametro' => 'Agua Douro',
            'descripcion_parametro' => 'Agua recogida del rio Douro',
            'tipo_parametro' => 'Liquido',
            'formato_parametro' => 'L/min',
            'rango_desde_parametro' => '0',
            'rango_hasta_parametro' => '100',
            'TESTING' => true,
            'action' => 'ADD',
            'controlador' => 'parametro'
        ),
        'mensaje' => 'SQL_OK'
    ),
    'testSearch_parametro' => array(
        'variables' => array(
            'TESTING' => true,
            'action' => 'SEARCH',
            'controlador' => 'parametro'
        ),
        'mensaje' => 'RECORDSET_DATOS'
    ),
    'testEdit_parametro' => array(
        'variables' => array(
            'id_parametro' => '2',
            'nombre_parametro' => 'Agua Ebro',
            'descripcion_parametro' => 'Agua recogida del rio Ebro',
            'tipo_parametro' => 'Liquido',
            'formato_parametro' => 'L/min',
            'rango_desde_parametro' => '0',
            'rango_hasta_parametro' => '100',
            'TESTING' => true,
            'action' => 'EDIT',
            'controlador' => 'parametro'
        ),
        'mensaje' => 'SQL_OK'
    ),
    'testDelete_parametro' => array(
        'variables' => array(
            'id_parametro' => '2',
            'TESTING' => true,
            'action' => 'DELETE',
            'controlador' => 'parametro'
        ),
        'mensaje' => 'SQL_OK'
    ),
    'testAdd_unidad' => array(
        'variables' => array(
            'nombre_unidad' => 'Kelvin',
            'descripcion_unidad' => 'temperatura termodinámica',
            'id_parametro' => '1',
            'TESTING' => false,
            'action' => 'ADD',
            'controlador' => 'unidad'
        ),
        'mensaje' => 'SQL_OK'
    ),
    'testSearch_unidad' => array(
        'variables' => array(
            'TESTING' => true,
            'action' => 'SEARCH',
            'controlador' => 'unidad'
        ),
        'mensaje' => 'RECORDSET_DATOS'
    ),
    'testEdit_unidad' => array(
        'variables' => array(
            'id_unidad' => '2',
            'nombre_unidad' => 'Farenheit',
            'descripcion_unidad' => 'temperatura termodinámica',
            'id_parametro' => '1',
            'TESTING' => true,
            'action' => 'EDIT',
            'controlador' => 'unidad'
        ),
        'mensaje' => 'SQL_OK'
    ),
    'testDelete_unidad' => array(
        'variables' => array(
            'id_unidad' => '2',
            'TESTING' => true,
            'action' => 'DELETE',
            'controlador' => 'unidad'
        ),
        'mensaje' => 'SQL_OK'
    ),
    'testActionExistInAnotherEntity' => array(
        'variables' => array(
            'nombre_unidad' => 'Kelvin',
            'descripcion_unidad' => 'temperatura termodinámica',
            'id_parametro' => '2',
            'TESTING' => true,
            'action' => 'ADD',
            'controlador' => 'unidad'
        ),
        'mensaje' => 'FOREIGN_KEY_PARAMETRO_KO'
    ),
    'testActionUniqueValueAlreadyExists' => array(
        'variables' => array(
            'nombre_usuario' => 'Samuel',
            'organizacion_usuario' => 'ESEI',
            'puesto_usuario' => 'alumno',
            'direccion_usuario' => 'Calle A Nº1 4ºD',
            'correo_usuario' => 'sam@gmail.es',
            'TESTING' => true,
            'action' => 'ADD',
            'controlador' => 'usuario'
        ),
        'mensaje' => 'NOMBRE_USUARIO_ALREADY_EXISTS_KO'
    ),
    'testEditUniqueValueAlreadyExists' => array(
        'variables' => array(
            'id_usuario' => '1',
            'nombre_usuario' => 'Victor',
            'organizacion_usuario' => 'ESEI',
            'puesto_usuario' => 'alumno',
            'direccion_usuario' => 'Calle A Nº1 4ºD',
            'correo_usuario' => 'javi@javi.es',
            'TESTING' => true,
            'action' => 'EDIT',
            'controlador' => 'usuario'
        ),
        'mensaje' => 'CORREO_USUARIO_ALREADY_EXISTS_KO'
    ),
    'testDeleteStrongEntity' => array(
        'variables' => array(
            'id_parametro' => '1',
            'TESTING' => true,
            'action' => 'DELETE',
            'controlador' => 'parametro'
        ),
        'mensaje' => 'DELETE_PARENT_WHILE_CHILDREN_IN_unidad_KO'
    ),
    'testSearchByVacio' => array(
        'variables' => array(
            'TESTING' => true,
            'action' => 'SEARCH_BY',
            'controlador' => 'usuario',
            
        ),
        'mensaje' => 'SEARCH_BY_NULL_KO'
    ),
);
