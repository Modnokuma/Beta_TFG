<?php

include './Base/Base_CONTROLLER.php';

class proyecto_CONTROLLER extends Base_CONTROLLER{
    public function __construct() {
        parent::__construct();
	}

    function personalized_nombre_proyecto($data){
        echo 'personalized_nombre_proyecto';
        if (in_array($this->valores['nombre_proyecto'], $data)){
            echo 'El nombre del proyecto ya existe';
            return true;
        }
        else{
            $feedback['ok'] = false;
            $feedback['code'] = 'noestaenlista_nombre_atributo_KO';
            $feedback['resources'] = false;
            return $feedback;
        }
    }

}

?>