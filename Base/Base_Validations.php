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

                    if (isset($this->estructura['attributes'][$atributo]['rules']['validations'][action])){
                        $nomval = $this->estructura['attributes'][$atributo]['rules']['validations'][action];
                        foreach($nomval as $key => $value){
                            $test = 'validate_'.$key;
                            $resultado = $this->$test($atributo, $this->valores[$atributo]);

                            if ($resultado !== true) {
                                return $resultado;
                            }
                        }
                    }

                }

            }
        }
        return true;
    }

    public function validate_min_size($atributo, $valor)
    {
        if (isset($this->estructura['attributes'][$atributo]['rules']['validations'][action])) {
            if (isset($this->estructura['attributes'][$atributo]['rules']['validations'][action]['min_size'])) {
                $minSize = $this->estructura['attributes'][$atributo]['rules']['validations'][action]['min_size'];

                if (strlen($valor) < $minSize) {
                    $feedback['ok'] = false;
                    $feedback['code'] = 'MIN_SIZE_' . strtoupper($atributo) . '_KO';
                    $feedback['resources'] = false;
                    return $feedback;
                }
            }
        }
        return true;
    }

  
    public function validate_max_size($atributo, $valor)
    {
        if (isset($this->estructura['attributes'][$atributo]['rules']['validations'][action])) {
            if (isset($this->estructura['attributes'][$atributo]['rules']['validations'][action]['max_size'])) {
                $maxSize = $this->estructura['attributes'][$atributo]['rules']['validations'][action]['max_size'];

                if (strlen($valor) > $maxSize) {
                    $feedback['ok'] = false;
                    $feedback['code'] = 'MAX_SIZE_' . strtoupper($atributo) . '_KO';
                    $feedback['resources'] = false;
                    return $feedback;
                }
            }
        }
        return true;
    }

    public function validate_exp_reg($atributo, $valor)
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

    public function validate_personalized($atributo, $valor)
    {
        if (isset($this->estructura['attributes'][$atributo]['rules']['validations'][action]['personalized'])) {
                        
            $personalized = eval('return $this->' . $this->estructura['attributes'][$atributo]['rules']['validations'][action]['personalized'] . ';');

            if ($personalized !== true) {
                
                return $personalized;
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
