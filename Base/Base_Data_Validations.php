<?php


class Base_Data_Validations
{

    protected $estructura;
    protected $valores;
    protected $listaAtributos;
    protected $objetoentidad;
    protected $controlador;

    public function __construct($estructura, $valores, $listaAtributos, $entidad, $controlador)
    {
        $this->estructura = $estructura;
        $this->valores = $valores;
        $this->listaAtributos = $listaAtributos;
        $this->objetoentidad = $entidad;
        $this->controlador = $controlador;
    }

    public function data_validations()
    {

        $respuesta = true;

        // $controller_exist = $this->controller_exists();
        // if ($controller_exist !== true) {
        //     return $controller_exist;
        // }

        $nulos = $this->null_test();

        if (!is_bool($nulos)) {
            return $nulos;
        }

        $search_by = $this->null_search_by();

        if ($search_by !== true) {
            return $search_by;
        }

        $validaciones = $this->validations();

        if ($validaciones !== true) {
            return $validaciones;
        }

        return $respuesta;
    }

    // public function controller_exists(){
    //     if($this->controlador == ''){
    //         $feedback['ok'] = false;
    //         $feedback['code'] = 'CONTROLLER_NOT_EXISTS';
    //         $feedback['resources'] = false;
    //         return $feedback;
    //     }
    //     return true;
    // }

    public function null_test()
    {

        foreach ($this->listaAtributos as $atributo) {

            if (isset($this->estructura['attributes'][$atributo]['not_null'][action])) {

                if (!($this->estructura['attributes'][$atributo]['not_null'][action])) {
                    continue;
                } else {
                    if ((!(isset($this->valores[$atributo]))) || ($this->valores[$atributo] == '')) {

                        if (!isset($this->estructura['attributes'][$atributo]['default_value'])) {
                            $feedback['ok'] = false;
                            $feedback['code'] = $atributo . '_is_null_KO';
                            $feedback['resources'] = false;
                            return $feedback;
                        }
                    }
                }
            }
        }

        return false;
    }

    public function null_search_by()
    {

        if (action == "SEARCH_BY") {

            foreach ($this->listaAtributos as $atributo) {
                if (isset($this->valores[$atributo])) {
                    return true;
                }
            }

            $feedback['ok'] = false;
            $feedback['code'] = 'SEARCH_BY_NULL_KO';
            $feedback['resources'] = false;
            return $feedback;
        }
        return true;
    }

    public function validations()
    {
        if (action != 'DELETE') {

            foreach ($this->listaAtributos as $atributo) {

                if (isset($this->valores[$atributo])) {

                    if (isset($this->estructura['attributes'][$atributo]['rules']['validations'][action])) {
                        $nomval = $this->estructura['attributes'][$atributo]['rules']['validations'][action];
                        foreach ($nomval as $key => $value) {
                            $test = 'validate_' . $key;

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
                    $feedback['code'] = 'min_size_' . $atributo . '_KO';
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
                    $feedback['code'] = 'max_size_' . $atributo . '_KO';
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
                    $feedback['code'] = 'exp_reg_' . $atributo . '_KO';
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
            $method = $this->estructura['attributes'][$atributo]['rules']['validations'][action]['personalized'];

            $personalized = eval('return $this->objetoentidad->' . $method . ';');

            if ($personalized !== true) {

                return $personalized;
            }
        }

        return true;
    }
}
