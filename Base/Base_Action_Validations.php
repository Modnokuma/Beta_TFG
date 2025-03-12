<?php

class Base_Action_Validations
{
    protected $estructura;
    protected $valores;
    protected $listaAtributos;
    protected $controlador;

    public function __construct($estructura, $valores, $listaAtributos)
    {
        $this->estructura = $estructura;
        $this->valores = $valores;
        $this->listaAtributos = $listaAtributos;
    }

    public function action_validations()
    {
        $respuesta = true;

        foreach ($this->listaAtributos as $atributo) {


            if (isset($this->valores[$atributo])) {

                // unique, pk (no repeat values)
                if ((action == 'ADD') || (action == 'EDIT')) {

                    if ((isset($this->estructura['attributes'][$atributo]['pk']))
                        ||
                        (isset($this->estructura['attributes'][$atributo]['unique']))
                    ) {
                        $resp = $this->action_validate_pk_unique();

                        if ($resp !== true) {
                            return $resp;
                        }
                    }
                }

                // foreign key (error si valor no esta en la otra tabla)
                // si foreign key para un atributo
                if ((isset($this->estructura['attributes'][$atributo]['foreign_key']))) {

                    $array_tablas = $this->estructura['attributes'][$atributo]['foreign_key']['table'];
                    $array_pk_tablas = $this->estructura['attributes'][$atributo]['foreign_key']['attribute'];


                    foreach (array_combine($array_tablas, $array_pk_tablas) as $tabla => $pk) {
                        $resp = $this->exist_in_other_entity($tabla, $pk, $this->valores[$atributo]);

                        if ($resp !== true) {

                            $feedback['ok'] = false;
                            $feedback['code'] = 'FOREIGN_KEY_' . strtoupper($atributo) . '_KO';
                            $feedback['resources'] = true;
                            return $feedback;
                        }
                    }
                }

                // Antes de añadir un valor unique, comprueba que exista
                if (isset($this->estructura['attributes'][$atributo]['unique']) && action == 'ADD') {

                    $resp = $this->unique_value_already_exists($atributo, $this->valores[$atributo]);

                    if ($resp !== true) {
                        $feedback['ok'] = false;
                        $feedback['code'] =  strtoupper($atributo) . '_ALREADY_EXISTS_KO';
                        $feedback['resources'] = true;
                        return $feedback;
                    }
                }

                if (isset($this->estructura['attributes'][$atributo]['unique']) && action == 'EDIT') {

                    $resp = $this->edit_unique_value_already_exists($atributo, $this->valores[$atributo]);

                    if ($resp !== true) {
                        $feedback['ok'] = false;
                        $feedback['code'] =  strtoupper($atributo) . '_ALREADY_EXISTS_KO';
                        $feedback['resources'] = true;
                        return $feedback;
                    }
                }

                /* Borrar una tupla de entidad fuerte si tiene hijos en entidad débil
                if (isset($this->estructura['associations']['OneToMany']) && isset($this->estructura['attributes'][$atributo]['pk']) && action == 'DELETE') {
                    
                    $arrayEntidadesHijas = $this->estructura['associations']['OneToMany']['entity'];
                    $arrayForeignKeys = $this->estructura['associations']['OneToMany']['attributes-rel'];
                   

                    foreach (array_combine($arrayEntidadesHijas, $arrayForeignKeys) as $entidad => $claveForanea) {
                        $resp = $this->delete_parent_while_child_exist($this->valores[$atributo],$entidad,$claveForanea);

                        if ($resp !== true) {
                            $feedback['ok'] = false;
                            $feedback['code'] = 'PARENT_HAS_CHILDREN_KO';
                            $feedback['resources'] = true;
                            return $feedback;
                        }
                    }
                }*/

                // Prueba
                // Borrar una tupla de entidad fuerte si tiene hijos en entidad débil
                if (isset($this->estructura['associations']['OneToMany']) && isset($this->estructura['attributes'][$atributo]['pk']) && action == 'DELETE') {
                    $array_valores_pk = [];
                    
                    // metemos en un array los atributos que son pk
                    foreach ($this->listaAtributos as $aux) {
                        if (isset($this->estructura['attributes'][$aux]['pk'])) {
                            $array_valores_pk[] = $this->valores[$aux];
                        }
                    }

                    // recorremos las relaciones One to Many
                    foreach ($this->estructura['associations']['OneToMany'] as $arrayFk) {
                        $entidadHija = $arrayFk['entity'];
                        $arrayForeignKey = $arrayFk['attributes-rel'];             

                        $resp = $this->delete_parent_while_child_exist($array_valores_pk,$entidadHija,$arrayForeignKey);

                        if ($resp !== true) {
                            $feedback['ok'] = false;
                            $feedback['code'] = $atributo.'_HAS_CHILDREN_IN_'.$entidadHija.'_KO';
                            $feedback['resources'] = true;
                            return $feedback;
                        }
                    }
                    
                }
            }
        }
        return $respuesta;
    }

    /*
    // Borrar una tupla de entidad fuerte si tiene hijos en entidad débil
                if (isset($this->estructura['associations']['OneToMany']) && isset($this->estructura['attributes'][$atributo]['pk']) && action == 'DELETE') {
                    
                    $arrayEntidadesHijas = $this->estructura['associations']['OneToMany']['entity'];
                    $arrayForeignKeys = $this->estructura['associations']['OneToMany']['attributes-rel'];
                   

                    foreach (array_combine($arrayEntidadesHijas, $arrayForeignKeys) as $entidad => $claveForanea) {
                        $resp = $this->delete_parent_while_child_exist($this->valores[$atributo],$entidad,$claveForanea);

                        if ($resp !== true) {
                            $feedback['ok'] = false;
                            $feedback['code'] = 'PARENT_HAS_CHILDREN_KO';
                            $feedback['resources'] = true;
                            return $feedback;
                        }
                    }
                }
    */

    public function delete_parent_while_child_exist($pksPadre, $tablaHijo, $camposFkHijo)
    {
       
        include_once "./app/" . $tablaHijo . "/" . $tablaHijo . "_SERVICE.php";
        include_once "./app/" . $tablaHijo . "/" . $tablaHijo . "_description.php";
        $descripcionHijo = $tablaHijo . '_description';
        $estructuraHijo = $$descripcionHijo;

        $servicioHijo = $tablaHijo . "_SERVICE";
        $array_busqueda = []; 
        
        foreach (array_combine($camposFkHijo, $pksPadre) as $campoFkHijo => $pkPadre) {
            $array_busqueda[$campoFkHijo] = $pkPadre;
        }

        $service = new $servicioHijo($estructuraHijo, 'SEARCH_BY', $array_busqueda);
        $resultado = $service->SEARCH();

        if ($resultado['code'] === 'RECORDSET_DATOS') {
            return false;
        } else {
            return true;
        }
    }

    /*
    public function delete_parent_while_child_exist($pkPadre, $tablaHijo, $campoFkHijo)
    {
       
        include_once "./app/" . $tablaHijo . "/" . $tablaHijo . "_SERVICE.php";
        include_once "./app/" . $tablaHijo . "/" . $tablaHijo . "_description.php";
        $descripcionHijo = $tablaHijo . '_description';
        $estructuraHijo = $$descripcionHijo;

        $servicioHijo = $tablaHijo . "_SERVICE";
        $service = new $servicioHijo($estructuraHijo, 'SEARCH', array($campoFkHijo => $pkPadre));
        $resultado = $service->SEARCH();

        if ($resultado['code'] === 'RECORDSET_DATOS') {

            return false;
        } else {
            return true;
        }
    }
    */
    public function exist_in_other_entity($entidad, $campo, $valorvariable)
    {

        include_once "./app/" . $entidad . "/" . $entidad . "_SERVICE.php";
        include_once "./app/" . $entidad . "/" . $entidad . "_description.php";

        $nombreestructura = $entidad . '_description';
        $contenidoestructura = $$nombreestructura;

        $entidad_service = $entidad . "_SERVICE";
        $service = new $entidad_service($contenidoestructura, 'SEARCH', array($campo => $valorvariable));
        $resultado = $service->SEARCH();


        if ($resultado['code'] === 'RECORDSET_DATOS') {
            return true;
        } else {
            return false;
        }
    }

    public function unique_value_already_exists($campo, $valorvariable)
    {

        $controlador = variables['controlador'];
        include_once "./app/" . $controlador . "/" . $controlador . "_SERVICE.php";

        $entidad_service = $controlador . "_SERVICE";
        $service = new $entidad_service($this->estructura, 'SEARCH', array($campo => $valorvariable));
        $resultado = $service->SEARCH();


        if ($resultado['code'] === 'RECORDSET_DATOS') {
            return false;
        } else {
            return true;
        }
    }

    public function edit_unique_value_already_exists($campo, $valorvariable)
    {
        $controlador = variables['controlador'];
        include_once "./app/" . $controlador . "/" . $controlador . "_SERVICE.php";
        $entidad_service = $controlador . "_SERVICE";
        $primaryKey = $this->listaAtributos[0];
        $currentId = $this->valores[$primaryKey];

        if ($primaryKey != $campo) {
            $query = "SELECT COUNT(*) as count FROM " . $controlador . " WHERE " . $campo . " = '" . $valorvariable . "' AND " . $primaryKey . " != " . $currentId;
            $service = new $entidad_service($this->estructura, 'SEARCH_BY', array());
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



    public function action_validate_pk_unique()
    {
        return true;
    }
}


        /* echo "campo : ".$campo;
        echo ", valorvariable : ".$valorvariable;
        echo " , primaryKey : ".$primaryKey;
        echo " , currentId : ".$currentId;
        echo "\n";*/