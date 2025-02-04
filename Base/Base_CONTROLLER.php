<?php

include './Base/Base_Validations.php';

class Base_CONTROLLER extends Base_Validations
{
    public function __construct()
    {

        $controlador = variables['controlador'];

        include "./app/" . $controlador . "/" . $controlador . "_SERVICE.php";
        include "./app/" . $controlador . "/" . $controlador . "_description.php";
        

        $controlador .= "_SERVICE";
        $description = variables['controlador'] . '_description';

        // Inicializar las propiedades heredadas
        $this->estructura = $$description;
        $this->valores = variables;
        $this->listaAtributos = array_keys($this->estructura['attributes']);

        $service = new $controlador($this->estructura);
        $respuesta_validations = $this->validations();

        if (is_array($respuesta_validations)) {
            //  Si existen errores
            responder($respuesta_validations);
        }

        $accion = action;
        responder($service->$accion());
    }


    /*function validations()
    {
        $respuesta = true;

        $nulos = $this->null_test();

        if (!is_bool($nulos)) {
            return $nulos;
        };

        $validaciones = $this->data_validations();

        if ($validaciones !== true) {
            return $this->data_validations();
        }

        //validaciones acciones
        
        return $respuesta;
    }

    function null_test()
    {

        if (action == 'DELETE') {
            return false;
        }

        foreach ($this->listaAtributos as $atributo) {

            if (!($this->prueba['attributes'][$atributo]['not_null'][action])) {
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

    function data_validations()
    {

        if (action != 'DELETE') {

            foreach ($this->listaAtributos as $atributo) {
                if (isset($this->valores[$atributo])) {
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

                    $personalized = eval('return $this->'.$this->prueba['attributes'][$atributo]['rules']['validations'][action]['personalized'].';');
                    if ($personalized !== true) {
                        return $personalized;
                    }
                }
            }
        }
        return true;
    }

    function validateMinSize($atributo, $valor)
    {
        if (isset($this->prueba['attributes'][$atributo]['rules']['validations'][action])) {
           
            $minSize = $this->prueba['attributes'][$atributo]['rules']['validations'][action]['tam_min'];

            if ($minSize !== false && strlen($valor) < $minSize) {
                $feedback['ok'] = false;
                $feedback['code'] = 'TAM_MIN_' . strtoupper($atributo) . '_KO';
                $feedback['resources'] = false;
                return $feedback;
            }
        }
        return true;
    }

    function validateMaxSize($atributo, $valor)
    {
        if (isset($this->prueba['attributes'][$atributo]['rules']['validations'][action])) {
            $maxSize = $this->prueba['attributes'][$atributo]['rules']['validations'][action]['tam_max'];

            if ($maxSize !== false && strlen($valor) > $maxSize) {
                $feedback['ok'] = false;
                $feedback['code'] = 'TAM_MAX_' . strtoupper($atributo) . '_KO';
                $feedback['resources'] = false;
                return $feedback;
            }
        }
        return true;
    }

    function validateRegExpr($atributo, $valor)
    {
        if (isset($this->prueba['attributes'][$atributo]['rules']['validations'][action])) {
            $expReg = $this->prueba['attributes'][$atributo]['rules']['validations'][action]['exp_reg'];

            if ($expReg !== false && !preg_match($expReg, $valor)) {
                $feedback['ok'] = false;
                $feedback['code'] = 'EXP_REG_' . strtoupper($atributo) . '_KO';
                $feedback['resources'] = false;
                return $feedback;
            }
        }
        return true;
    }
/*
    function validarDesdeParametro($atributo, $valor)
    {
        if (isset($this->prueba['attributes'][$atributo]['rules']['validations'][action])) {
            if($valor >)
            if ($this->prueba['attributes'][$atributo]['rules']['validations'][action]['personalized']) {
                $feedback['ok'] = false;
                $feedback['code'] = $this->prueba['attributes'][$atributo]['rules']['error'][action]['personalized'];
                $feedback['resources'] = false;
                return $feedback;
            }
        }
        return true;
    }*/
}
