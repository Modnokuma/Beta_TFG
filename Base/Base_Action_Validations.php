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
            }
        }
        
        echo $this->controlador;
        // Antes de añadir un usuario, comprobar si ya existe
        if ($this->controlador == 'usuario') {
            echo   'entra';
            $same_user = $this->same_user_name();

            if ($same_user !== true) {
                $feedback['ok'] = false;
                $feedback['code'] = 'NOMBRE_USUARIO_ALREADY_EXISTS_KO';
                $feedback['resources'] = true;
                return $feedback;
            }
        }

        return $respuesta;
    }

    public function exist_in_other_entity($entidad, $campo, $valorvariable)
    {

        include_once "./app/" . $entidad . "/" . $entidad . "_SERVICE.php";
        include_once "./app/" . $entidad . "/" . $entidad . "_description.php";

        $nombreestructura = $entidad . '_description';
        $contenidoestructura = $$nombreestructura;

        $entidad_service = $entidad . "_SERVICE";
        $service = new $entidad_service($contenidoestructura, 'SEARCH', array($campo => $valorvariable));
        $resultado = $service->SEARCH();

        var_dump($resultado);

        if ($resultado['code'] === 'RECORDSET_DATOS') {
            return true;
        } else {
            return false;
        }
    }

    public function action_validate_pk_unique()
    {
        return true;
    }

    public function same_user_name()
    {

        $controlador = variables['controlador'];
        include_once "./app/" . $controlador . "/" . $controlador . "_SERVICE.php";

        $entidad_service = $controlador . "_SERVICE";
        $service = new $entidad_service($this->estructura, 'SEARCH', array('nombre_usuario' => $this->valores['nombre_usuario']));
        $resultado = $service->SEARCH();
        
        if ($resultado['code'] === 'RECORDSET_DATOS') {
            return false;
        } else {
            return true;
        }
    }

}
