<?php

class Base_SERVICE
{

    public $model;
    public $listaAtributos = array();
    public $valores = array();
    public $estructura;
    public $accion;
    public $controlador;

    function __construct($estructura)
    {

        $this->accion = action;
        $this->controlador = variables['controlador'];
        $this->estructura = $estructura;
        $this->valores = variables;
        $this->listaAtributos = array_keys($this->estructura['attributes']);

        $this->inicializarRest();
    }

    function exec()
    {
        $nulos = $this->null_test();

        // ??????????
        if (is_bool($nulos)) {
        } else {
            return $nulos;
        };

        $accion = action;
        return $this->$accion();
    }

    function crearModelo($controlador)
    {

        //controlador es el nombre de la tabla
        include "./app/" . $controlador . "/" . $controlador . "_MODEL.php";
        $modelo = $controlador . "_MODEL";
        $this->model = new $modelo;


        //Si existe la lista de atributos de la entidad se llama a este metodo
        if (isset($this->listaAtributos)) {

            $this->rellenarModelo($this->listaAtributos);
        }

        $this->model->estructura = $this->estructura;
        return $this->model;
    }

    //
    function rellenarModelo($listaAtributos)
    {

        foreach ($listaAtributos as $atributo) {

            if (!isset($this->valores[$atributo])) {
                //Aqui deberiamos comprobar si tiene un valor predeterminado. Hacerlo en un futuro.
                $this->valores[$atributo] = '';
            }
            //echo $_POST[$atributo];
            $this->model->valores[$atributo] = $this->valores[$atributo];
        }
  
        $this->model->listaAtributos = $this->listaAtributos;
        //$this->model->listaValores = array_slice(array_values($_POST), 1); // El primero es controlador por eso nos lo cargamos

    }

    function ADD()
    {
        return $this->model->ADD();
    }

    function EDIT()
    {

        return $this->model->EDIT();
    }

    function SEARCH()
    {

        return $this->model->SEARCH();
    }

    function DELETE()
    {

        return $this->model->DELETE();
    }

    function otraaction()
    {

        return 'llegue a otra accion del service';
    }

    function null_test()
    {

        if ($this->accion == 'SEARCH') {
            return false;
        }

        foreach ($this->listaAtributos as $atributo) {

            if (!($this->estructura['attributes'][$atributo]['not_null'][$this->accion])) {
                continue;
            } else {
                if ((!(isset(variables[$atributo]))) || (variables[$atributo] == '')) {
                    $feedback['ok'] = false;
                    $feedback['code'] = $atributo . '_is_null_KO';
                    $feedback['resources'] = false;
                    return $feedback;
                }
            }
        }

        return false;
    }
}
