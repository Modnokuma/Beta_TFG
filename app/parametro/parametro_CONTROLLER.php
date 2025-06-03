<?php
include './Base/Base_CONTROLLER.php';

/**
 * parametro_CONTROLLER
 * This class is used to manage the entity 'parametro'.
 * It extends the Base_CONTROLLER class to inherit common functionalities.
 * @package app
 * @subpackage parametro
 */
class parametro_CONTROLLER extends Base_CONTROLLER{
    
    /**
     * __constructor
     * This method initializes the parametro_CONTROLLER class.
     * @return void
     */
    public function __construct() {
        parent::__construct();
	}

    //Ejemplo de función personalizada para validar un parámetro
    /*function data_attribute_personalize(){

        $this->valores['nombre_parametro'] = 'Masa';

    }*/

}

?>