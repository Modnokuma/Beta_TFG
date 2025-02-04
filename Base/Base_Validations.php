<?php

class Base_Validations
{

    protected $estructura;
    protected $valores;
    protected $listaAtributos;

    /*public function __construct($estructura, $valores, $listaAtributos)
    {
        $this->estructura = $estructura;
        $this->valores = $valores;
        $this->listaAtributos = $listaAtributos;
    }*/

    public function validations()
    {
        $respuesta = true;
        $nulos = $this->null_test();

        if (!is_bool($nulos)) {
            return $nulos;
        }

        $validaciones = $this->data_validations();

        if ($validaciones !== true) {
            return $validaciones;
        }


        return $respuesta;
    }

    public function null_test()
    {

        if (action == 'DELETE') {
            return false;
        }

        foreach ($this->listaAtributos as $atributo) {

            if (!($this->estructura['attributes'][$atributo]['not_null'][action])) {
                continue;
            } else {
                if ((!(isset($this->valores[$atributo]))) || ($this->valores[$atributo] == '')) {
                    $feedback['ok'] = false;
                    $feedback['code'] = $atributo . '_is_null_KO';
                    $feedback['resources'] = false;
                    return $feedback;
                }
            }
        }

        return false;
    }

    public function data_validations()
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

                    if (isset($this->estructura['attributes'][$atributo]['rules']['validations'][action]['personalized'])) {
                        
                        echo $this->estructura['attributes'][$atributo]['rules']['validations'][action]['personalized'];
                        $personalized = eval('return $this->' . $this->estructura['attributes'][$atributo]['rules']['validations'][action]['personalized'] . ';');

                        if ($personalized !== true) {
                            
                            return $personalized;
                        }
                    }
                }
            }
        }
        return true;
    }

    public function validateMinSize($atributo, $valor)
    {
        if (isset($this->estructura['attributes'][$atributo]['rules']['validations'][action])) {
            if (isset($this->estructura['attributes'][$atributo]['rules']['validations'][action]['tam_min'])) {
                $minSize = $this->estructura['attributes'][$atributo]['rules']['validations'][action]['tam_min'];

                if (strlen($valor) < $minSize) {
                    $feedback['ok'] = false;
                    $feedback['code'] = 'TAM_MIN_' . strtoupper($atributo) . '_KO';
                    $feedback['resources'] = false;
                    return $feedback;
                }
            }
        }
        return true;
    }

    public function validateMaxSize($atributo, $valor)
    {
        if (isset($this->estructura['attributes'][$atributo]['rules']['validations'][action])) {
            if (isset($this->estructura['attributes'][$atributo]['rules']['validations'][action]['tam_max'])) {
                $maxSize = $this->estructura['attributes'][$atributo]['rules']['validations'][action]['tam_max'];

                if (strlen($valor) > $maxSize) {
                    $feedback['ok'] = false;
                    $feedback['code'] = 'TAM_MAX_' . strtoupper($atributo) . '_KO';
                    $feedback['resources'] = false;
                    return $feedback;
                }
            }
        }
        return true;
    }

    public function validateRegExpr($atributo, $valor)
    {
        if (isset($this->estructura['attributes'][$atributo]['rules']['validations'][action])) {
            if (isset($this->estructura['attributes'][$atributo]['rules']['validations'][action]['exp_reg'])) {
                $expReg = $this->estructura['attributes'][$atributo]['rules']['validations'][action]['exp_reg'];

                if (!preg_match($expReg, $valor)) {
                    $feedback['ok'] = false;
                    $feedback['code'] = 'EXP_REG_' . strtoupper($atributo) . '_KO';
                    $feedback['resources'] = false;
                    return $feedback;
                }
            }
        }
        return true;
    }

    public function validarDesdeParametro($atributo)
    {
        /*$feedback['ok'] = false;
        $feedback['code'] = 'EXP_REG_' . strtoupper($atributo) . '_KO';
        $feedback['resources'] = false;*/
        return true;
    }
}
