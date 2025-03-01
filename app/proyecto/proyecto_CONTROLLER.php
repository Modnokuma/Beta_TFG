<?php

include './Base/Base_CONTROLLER.php';

class proyecto_CONTROLLER extends Base_CONTROLLER{
    public function __construct() {
        parent::__construct();
	}

    /*function personalized_nombre_proyecto($data){

        if (in_array($this->valores['nombre_proyecto'], $data)){
            return true;
        }
        else{
            $feedback['ok'] = false;
            $feedback['code'] = 'noestaenlista_nombre_proyecto_KO';
            $feedback['resources'] = false;
            return $feedback;
        }
    }*/

}

?>