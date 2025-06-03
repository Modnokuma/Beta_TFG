<?php
include './Base/Base_CONTROLLER.php';

/**
 * proyecto_CONTROLLER
 * This class is used to manage the entity 'proyecto'.
 * It extends the Base_CONTROLLER class to inherit common functionalities.
 * @package app
 * @subpackage proyecto
 */

class proyecto_CONTROLLER extends Base_CONTROLLER{

    /**
     * __constructor
     * This method initializes the proyecto_CONTROLLER class.
     * @return void
     */
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