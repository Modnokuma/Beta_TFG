<?php

include './Base/Base_CONTROLLER.php';

class usuario_CONTROLLER EXTENDS Base_CONTROLLER{
    public function __construct() {
        parent::__construct();
	}

    function personalized_correo_usuario(){
        if (filter_var($this->valores["correo_usuario"], FILTER_VALIDATE_EMAIL)){
            return true;
        }
        else{
            $feedback['ok'] = false;
            $feedback['code'] = 'personalizado_correo_usuario_KO';
            $feedback['resources'] = false;
            return $feedback;
        }
    }

}


?>