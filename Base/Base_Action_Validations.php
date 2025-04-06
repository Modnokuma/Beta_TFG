<?php

class Base_Action_Validations
{
    protected $estructura;
    protected $valores;
    protected $listaAtributos;
    protected $controlador;

    public function __construct($estructura, $valores, $listaAtributos, $controlador)
    {
        $this->estructura = $estructura;
        $this->valores = $valores;
        $this->listaAtributos = $listaAtributos;
        $this->controlador = $controlador;
    }

    public function action_validations()
    {
        $respuesta = true;

        $resp = $this->action_validate_pks();

        if ($resp !== true) {
            return $resp;
        }

        $resp = $this->unique_validations();
        if ($resp !== true) {
            return $resp;
        }

        $resp = $this->exist_in_other_entity();
        if ($resp !== true) {
            return $resp;
        }

        $resp = $this->delete_parent_while_child_exist();
        if ($resp !== true) {
            return $resp;
        }

        return $respuesta;
    }

    public function verificarYIncluirArchivo($rutaArchivo, $clase)
    {
        if (file_exists($rutaArchivo)) {
            include_once $rutaArchivo;
            $entidad_service = $clase . "_SERVICE";
        } else {
            include_once "./Base/Base_SERVICE.php";
            $entidad_service = "Base_SERVICE";
        }
        return $entidad_service;
    }


    public function action_validate_pks()
    {
        $array_pks = [];

        //Metemos en un array los atributos que son pk
        foreach ($this->listaAtributos as $aux) {
            if (isset($this->estructura['attributes'][$aux]['pk'])  && isset($this->valores[$aux])) {
                $array_pks[$aux] = $this->valores[$aux];
            }
        }

        // Pk, comprobar si existe en la base de datos 
        if ((action == 'ADD') and (count($array_pks) > 0)) {
            echo "Entre" . "\n";
            $controlador = variables['controlador'];
            $serviceFile = "./app/" . $controlador . "/" . $controlador . "_SERVICE.php";

            if (!file_exists($serviceFile)) {
                $entidad_service = "Base_SERVICE";
                include_once "./Base/Base_SERVICE.php";
            } else {
                $entidad_service = $controlador . "_SERVICE";
                include_once $serviceFile;
            }

            $service = new $entidad_service($this->estructura, 'SEARCH_BY', $array_pks, $this->controlador);
            $resultado = $service->SEARCH_BY();

            if ($resultado['code'] === 'RECORDSET_VACIO') {
                return true;
            } else {
                $feedback['ok'] = false;
                $feedback['code'] = 'PK_ALREADY_EXISTS_IN_' . $controlador . 'KO';
                $feedback['resources'] = true;
                return $feedback;
            }
        }
        return true;
    }

    public function unique_validations()
    {
        // Comprobaciones de atributos unique
        foreach ($this->listaAtributos as $atributo) {

            if (isset($this->valores[$atributo])) {
                if (isset($this->estructura['attributes'][$atributo]['unique'])) {
                    // Antes de añadir un valor unique, comprueba que exista
                    if (action == 'ADD') {
                        $resp = $this->unique_value_already_exists($atributo, $this->valores[$atributo]);

                        if ($resp !== true) {
                            $feedback['ok'] = false;
                            $feedback['code'] =  $atributo . '_ALREADY_EXISTS_KO';
                            $feedback['resources'] = true;
                            return $feedback;
                        }
                    } else if (action == 'EDIT') {
                        $resp = $this->edit_unique_value_already_exists($atributo, $this->valores[$atributo]);

                        if ($resp !== true) {
                            $feedback['ok'] = false;
                            $feedback['code'] =  $atributo . '_ALREADY_EXISTS_KO';
                            $feedback['resources'] = true;
                            return $feedback;
                        }
                    }
                }
            }
        }

        return true;
    }



    public function unique_value_already_exists($campo, $valorvariable)
    {

        $controlador = variables['controlador'];
        $serviceFile = "./app/" . $controlador . "/" . $controlador . "_SERVICE.php";

        if (!file_exists($serviceFile)) {
            $entidad_service = "Base_SERVICE";
            include_once "./Base/Base_SERVICE.php";
        } else {
            $entidad_service = $controlador . "_SERVICE";
            include_once $serviceFile;
        }

        $service = new $entidad_service($this->estructura, 'SEARCH_BY', array($campo => $valorvariable), $this->controlador);
        $resultado = $service->SEARCH_BY();

        if ($resultado['code'] === 'RECORDSET_DATOS') {
            return false;
        } else {
            return true;
        }
    }

    public function edit_unique_value_already_exists($campo, $valorvariable)
    {

        $controlador = variables['controlador'];
        $serviceFile = "./app/" . $controlador . "/" . $controlador . "_SERVICE.php";

        if (!file_exists($serviceFile)) {
            $entidad_service = "Base_SERVICE";
            include_once "./Base/Base_SERVICE.php";
        } else {
            $entidad_service = $controlador . "_SERVICE";
            include_once $serviceFile;
        }

        $primaryKey = $this->listaAtributos[0];
        $currentId = $this->valores[$primaryKey];

        if ($primaryKey != $campo) {
            $query = "SELECT COUNT(*) as count FROM " . $controlador . " WHERE " . $campo . " = '" . $valorvariable . "' AND " . $primaryKey . " != " . $currentId;

            $service = new $entidad_service($this->estructura, '', array(), $this->controlador);
            $result_query = $service->ejecutarPersonalizedQuery($query);

            // Verificar el resultado de la consulta
            if ($result_query && $result_query->num_rows > 0) {

                $rows = $result_query->fetch_assoc();

                if (isset($rows['count'])) {

                    $numApariciones = intval($rows['count']);
                    if ($numApariciones == 0) {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
        }

        return true;
    }

    public function exist_in_other_entity()
    {
        // FK (error si el valor no esta en la otra tabla)
        if ((isset($this->estructura['associations']['BelongsTo'])) && (action == 'ADD' || action == 'EDIT')) {

            $array_valores_fk = [];

            foreach ($this->estructura['associations']['BelongsTo'] as $arrayFk) {
                $tablaFk = $arrayFk['entity'];
                $array_campos_fk_rel = $arrayFk['attributes-rel'];
                $array_campos_fk_own = $arrayFk['attributes-own'];

                // Recorremos los campos fk y metemos en un array los valores
                foreach ($array_campos_fk_own as $campoFk) {
                    $array_valores_fk[] = $this->valores[$campoFk];
                }

                // Comprobamos que el servicio de la entidad fk existe
                $serviceFile = "./app/" . $tablaFk . "/" . $tablaFk . "_SERVICE.php";
                if (!file_exists($serviceFile)) {
                    $entidad_service = "Base_SERVICE";
                    include_once "./Base/Base_SERVICE.php";
                } else {
                    $entidad_service = $tablaFk . "_SERVICE";
                    include_once $serviceFile;
                }

                // Incluimos la descripcion y la estructura
                include_once "./app/" . $tablaFk . "/" . $tablaFk . "_description.php";
                $nombreestructura = $tablaFk . '_description';
                $contenidoestructura = $$nombreestructura;

                // Recorremos los campos fk y metemos en un array los valores
                foreach (array_combine($array_campos_fk_rel, $array_valores_fk) as $campoFk => $valorFk) {
                    $array_busqueda[$campoFk] = $valorFk;
                }

                $service = new $entidad_service($contenidoestructura, 'SEARCH_BY', $array_busqueda, $tablaFk);
                $resultado = $service->SEARCH_BY();

                if ($resultado['code'] === 'RECORDSET_DATOS') {
                    return true;
                } else {
                    $feedback['ok'] = false;
                    $feedback['code'] = 'FOREIGN_KEY_VALUES_NOT_IN_' . $tablaFk . '_KO';
                    $feedback['resources'] = true;
                    return $feedback;
                }
            }
        }
        return true;
    }

    public function delete_parent_while_child_exist()
    {
        // Borrar una tupla de entidad fuerte si tiene hijos en entidad débil
        if (isset($this->estructura['associations']['OneToMany']) && action == 'DELETE') {

            $array_valores_pk = [];

            // Recorremos las relaciones One to Many
            foreach ($this->estructura['associations']['OneToMany'] as $arrayFk) {
                $entidadHija = $arrayFk['entity'];
                $arrayForeignKey = $arrayFk['attributes-rel'];

                // Metemos en un array los valores de la pk de la entidad fuerte
                foreach ($arrayForeignKey as $campoFk) {
                    $array_valores_pk[] = $this->valores[$campoFk];
                }

                // Comprobamos que el servicio de la entidad hija existe
                $serviceFile = "./app/" . $entidadHija . "/" . $entidadHija . "_SERVICE.php";
                if (!file_exists($serviceFile)) {
                    $entidad_service = "Base_SERVICE";
                    include_once "./Base/Base_SERVICE.php";
                } else {
                    $entidad_service = $entidadHija . "_SERVICE";
                    include_once $serviceFile;
                }

                // Incluimos la descripcion y la estructura
                include_once "./app/" . $entidadHija . "/" . $entidadHija . "_description.php";
                $descripcionHijo = $entidadHija . '_description';
                $estructuraHijo = $$descripcionHijo;

                // Recorremos los campos fk y metemos en un array los valores
                $array_busqueda = [];
                foreach (array_combine($arrayForeignKey, $array_valores_pk) as $campoFkHijo => $pkPadre) {
                    $array_busqueda[$campoFkHijo] = $pkPadre;
                }

                $service = new $entidad_service($estructuraHijo, 'SEARCH_BY', $array_busqueda, $entidadHija);
                $resultado = $service->SEARCH_BY();

                if ($resultado['code'] === 'RECORDSET_DATOS') {
                    $feedback['ok'] = false;
                    $feedback['code'] = 'DELETE_PARENT_WHILE_CHILDREN_IN_' . $entidadHija . '_KO';
                    $feedback['resources'] = true;
                    return $feedback;
                } else {
                    return true;
                }
            }
        }
        return true;
    }
}
