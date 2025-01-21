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

        if (!is_bool($nulos)) {
            return $nulos;
        };
        //var_dump($this->valores);
        if ($this->validations() !== true) {
            return $this->validations();
        }

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

        if ($this->accion == 'DELETE') {
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

    function validations()
    {
       
        if ($this->accion != 'DELETE') {
            
            foreach ($this->listaAtributos as $atributo) {
                
                $minSize = $this->validateMinSize($atributo, $this->valores[$atributo]);
                if ($minSize !== true) {
                    return $minSize;
                }

                $maxSize = $this->validateMaxSize($atributo, $this->valores[$atributo]);
                if ($maxSize !== true) {
                    return $maxSize;
                }
                
                $expReg = $this->validateRegExpr($atributo, $this->valores[$atributo]);
                if ($expReg !== true) {
                  
                    return $expReg;
                }
            }
        }
        return true;
    }

    function validateMinSize($atributo, $valor)
    {
        
        $minSize = $this->estructura['attributes'][$atributo]['rules']['validations'][$this->accion]['tam_min'];
        
        if ($minSize !== false && strlen($valor) < $minSize) {
            $feedback['ok'] = false;
            $feedback['code'] = 'MIN_SIZE_' . strtoupper($atributo) . '_KO';
            $feedback['resources'] = false;
            return $feedback;
        }
        return true;
    }

    function validateMaxSize($atributo, $valor)
    {
        $maxSize = $this->estructura['attributes'][$atributo]['rules']['validations'][$this->accion]['tam_max'];
        if ($maxSize !== false && strlen($valor) > $maxSize) {
            $feedback['ok'] = false;
            $feedback['code'] = 'MAX_SIZE_' . strtoupper($atributo) . '_KO';
            $feedback['resources'] = false;
            return $feedback;
        }
        return true;
    }

    function validateRegExpr($atributo, $valor)
    {
        $expReg = $this->estructura['attributes'][$atributo]['rules']['validations'][$this->accion]['exp_reg'];
        
        if ($expReg !== false && !preg_match($expReg, $valor)) {
            $feedback['ok'] = false;
            $feedback['code'] = 'EXP_REG_' . strtoupper($atributo) . '_KO';
            $feedback['resources'] = false;
            return $feedback;
        }
        return true;
    }


    /*function validations()
    {
        $nulos = $this->null_test();
        if (!is_bool($nulos)) {
            return $nulos;
        };

        $minSize = $this->validateMinSize($atributo, $valor);
        if ($minSize !== true) {
            return $minSize;
        }

        $maxSize = $this->validateMaxSize($atributo, $valor);
        if ($maxSize !== true) {
            return $maxSize;
        }

        $expReg = $this->validateRegExpr($atributo, $valor);
        if ($expReg !== true) {
            return $expReg;
        }

        return true;
    }*/
}
