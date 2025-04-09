<?php

const tests_preparation = [
    'Add_parametro' => [
        'variables' => [
            'id_parametro' => 1,
            'nombre_parametro' => 'Masa',
            'descripcion_parametro' => 'Magnitud física que expresa la inercia o resistencia al cambio de movimiento de un cuerpo',
            'tipo_parametro' => 'Solido',
            'formato_parametro' => 'Kg',
            'rango_desde_parametro' => '0',
            'rango_hasta_parametro' => '100000',
            'TESTING' => true,
            'action' => 'ADD',
            'controlador' => 'parametro'
        ],
        'mensaje' => 'SQL_OK'
    ],
    'Add_usuario' => [
        'variables' => [
            'id_usuario' => 1,
            'nombre_usuario' => 'Samuel',
            'organizacion_usuario' => 'ESEI',
            'puesto_usuario' => 'alumno',
            'direccion_usuario' => 'Calle Santo Domingo',
            'correo_usuario' => 'Samuel@gmail.com',
            'TESTING' => true,
            'action' => 'ADD',
            'controlador' => 'usuario'
        ],
        'mensaje' => 'SQL_OK'
    ],
    'Add_usuario2' => [
        'variables' => [
            'id_usuario' => 2,
            'nombre_usuario' => 'Javi',
            'organizacion_usuario' => 'ESEI',
            'puesto_usuario' => 'profesor',
            'direccion_usuario' =>  'Calle B Nº2 1ºC',
            'correo_usuario' => 'javi@javi.es',
            'TESTING' => true,
            'action' => 'ADD',
            'controlador' => 'usuario'
        ],
        'mensaje' => 'SQL_OK'
    ],
    'Add_unidad' => [
        'variables' => [
            'id_unidad' => 2,
            'nombre_unidad' => 'Kg',
            'descripcion_unidad' => 'Kilogramos, Unidad de peso y 1000 veces 1g',
            'id_parametro' => 1,
            'action' => 'ADD',
            'controlador' => 'unidad'
        ],
        'mensaje' => 'SQL_OK'
    ],
];

const tests_description = [
    /*'testAdd_usuario' => [
        'variables' => [
            'nombre_usuario' => 'Daniel',
            'organizacion_usuario' => 'ESEI',
            'puesto_usuario' => 'alumno',
            'direccion_usuario' => 'Calle A Nº1 4ºD',
            'correo_usuario' => 'a@a.es',
            'foto_usuario' => '',
            'TESTING' => true,
            'action' => 'ADD',
            'controlador' => 'usuario'
       ],
        'mensaje' => 'SQL_OK'
   ],*/
    'testAdd_usuario' => [
        'variables' => [
            'id_usuario' => 67,
            'nombre_usuario' => 'Daniel',
            'organizacion_usuario' => 'ESEI',
            'puesto_usuario' => 'alumno',
            'direccion_usuario' => 'Calle A Nº1 4ºD',
            'correo_usuario' => 'a@a.es',
            'foto_usuario' => '',
            'TESTING' => true,
            'action' => 'ADD',
            'controlador' => 'usuario'
        ],
        'mensaje' => 'SQL_OK'
    ],
    'testSearch_usuario' => [
        'variables' => [
            'TESTING' => true,
            'action' => 'SEARCH',
            'controlador' => 'usuario'
       ],
        'mensaje' => 'RECORDSET_DATOS'
   ],
    'testEdit_usuario' => [
        'variables' => [
            'id_usuario' => '3',
            'nombre_usuario' => 'DanielEdit',
            'organizacion_usuario' => 'ESEI',
            'puesto_usuario' => 'alumno',
            'direccion_usuario' => 'Calle A Nº1 4ºD',
            'correo_usuario' => 'b@b.es',
            'TESTING' => true,
            'action' => 'EDIT',
            'controlador' => 'usuario'
       ],
        'mensaje' => 'SQL_OK'
   ],
    'testDelete_usuario' => [
        'variables' => [
            'id_usuario' => '3',
            'TESTING' => true,
            'action' => 'DELETE',
            'controlador' => 'usuario'
       ],
        'mensaje' => 'SQL_OK'
   ],
    'testAdd_proyecto' => [
        'variables' => [
            'nombre_proyecto' => 'DOU',
            'descripcion_proyecto' => 'Potabilidad del agua del Douro',
            'TESTING' => true,
            'action' => 'ADD',
            'controlador' => 'proyecto'
       ],
        'mensaje' => 'SQL_OK'
   ],
    'testSearch_proyecto' => [
        'variables' => [
            'TESTING' => true,
            'action' => 'SEARCH',
            'controlador' => 'proyecto'
       ],
        'mensaje' => 'RECORDSET_DATOS'
   ],
    'testEdit_proyecto' => [
        'variables' => [
            'id_proyecto' => '1',
            'nombre_proyecto' => 'DOU',
            'descripcion_proyecto' => 'Caudal del agua del Douro',
            'TESTING' => true,
            'action' => 'EDIT',
            'controlador' => 'proyecto'
       ],
        'mensaje' => 'SQL_OK'
   ],
    'testDelete_proyecto' => [
        'variables' => [
            'id_proyecto' => '1',
            'TESTING' => true,
            'action' => 'DELETE',
            'controlador' => 'proyecto'
       ],
        'mensaje' => 'SQL_OK'
   ],
    'testAdd_parametro' => [
        'variables' => [
            'nombre_parametro' => 'Agua Douro',
            'descripcion_parametro' => 'Agua recogida del rio Douro',
            'tipo_parametro' => 'Liquido',
            'formato_parametro' => 'L/min',
            'rango_desde_parametro' => '0',
            'rango_hasta_parametro' => '100',
            'TESTING' => true,
            'action' => 'ADD',
            'controlador' => 'parametro'
       ],
        'mensaje' => 'SQL_OK'
   ],
    'testSearch_parametro' => [
        'variables' => [
            'TESTING' => true,
            'action' => 'SEARCH',
            'controlador' => 'parametro'
       ],
        'mensaje' => 'RECORDSET_DATOS'
   ],
    'testEdit_parametro' => [
        'variables' => [
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
       ],
        'mensaje' => 'SQL_OK'
   ],
    'testDelete_parametro' => [
        'variables' => [
            'id_parametro' => '2',
            'TESTING' => true,
            'action' => 'DELETE',
            'controlador' => 'parametro'
       ],
        'mensaje' => 'SQL_OK'
   ],
    'testAdd_unidad' => [
        'variables' => [
            'nombre_unidad' => 'Kelvin',
            'descripcion_unidad' => 'temperatura termodinámica',
            'id_parametro' => '1',
            'TESTING' => false,
            'action' => 'ADD',
            'controlador' => 'unidad'
       ],
        'mensaje' => 'SQL_OK'
   ],
    'testSearch_unidad' => [
        'variables' => [
            'TESTING' => true,
            'action' => 'SEARCH',
            'controlador' => 'unidad'
       ],
        'mensaje' => 'RECORDSET_DATOS'
   ],
    'testEdit_unidad' => [
        'variables' => [
            'id_unidad' => '2',
            'nombre_unidad' => 'Farenheit',
            'descripcion_unidad' => 'temperatura termodinámica',
            'id_parametro' => '1',
            'TESTING' => true,
            'action' => 'EDIT',
            'controlador' => 'unidad'
       ],
        'mensaje' => 'SQL_OK'
   ],
    'testDelete_unidad' => [
        'variables' => [
            'id_unidad' => '2',
            'TESTING' => true,
            'action' => 'DELETE',
            'controlador' => 'unidad'
       ],
        'mensaje' => 'SQL_OK'
   ],
    'testActionExistInAnotherEntity' => [
        'variables' => [
            'nombre_unidad' => 'Kelvin',
            'descripcion_unidad' => 'temperatura termodinámica',
            'id_parametro' => '2',
            'TESTING' => true,
            'action' => 'ADD',
            'controlador' => 'unidad'
       ],
        'mensaje' => 'FOREIGN_KEY_VALUES_NOT_IN_parametro_KO'
   ],
    'testActionUniqueValueAlreadyExists' => [
        'variables' => [
            'nombre_usuario' => 'Samuel',
            'organizacion_usuario' => 'ESEI',
            'puesto_usuario' => 'alumno',
            'direccion_usuario' => 'Calle A Nº1 4ºD',
            'correo_usuario' => 'sam@gmail.es',
            'TESTING' => true,
            'action' => 'ADD',
            'controlador' => 'usuario'
       ],
        'mensaje' => 'nombre_usuario_ALREADY_EXISTS_KO'
   ],
    'testEditUniqueValueAlreadyExists' => [
        'variables' => [
            'id_usuario' => '1',
            'nombre_usuario' => 'Victor',
            'organizacion_usuario' => 'ESEI',
            'puesto_usuario' => 'alumno',
            'direccion_usuario' => 'Calle A Nº1 4ºD',
            'correo_usuario' => 'javi@javi.es',
            'TESTING' => true,
            'action' => 'EDIT',
            'controlador' => 'usuario'
       ],
        'mensaje' => 'correo_usuario_ALREADY_EXISTS_KO'
   ],
    'testDeleteStrongEntity' => [
        'variables' => [
            'id_parametro' => '1',
            'TESTING' => true,
            'action' => 'DELETE',
            'controlador' => 'parametro'
       ],
        'mensaje' => 'DELETE_PARENT_WHILE_CHILDREN_IN_unidad_KO'
   ],
    'testSearchByVacio' => [
        'variables' => [
            'TESTING' => true,
            'action' => 'SEARCH_BY',
            'controlador' => 'usuario',
            
       ],
        'mensaje' => 'SEARCH_BY_NULL_KO'
   ],

    'testDefaultValues' => [
        'variables' => [
            'id_usuario' => '4',
            'nombre_usuario' => 'Manuel',
            'organizacion_usuario' => 'ESEI',
            'direccion_usuario' => 'Calle A Nº1 4ºD',
            'correo_usuario' => 'manuel@gmail.es',
            'TESTING' => true,
            'action' => 'ADD',
            'controlador' => 'usuario'
       ],
        'mensaje' => 'SQL_OK'
   ]
];
