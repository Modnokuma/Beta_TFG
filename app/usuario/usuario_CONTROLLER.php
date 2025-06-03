<?php
include './Base/Base_CONTROLLER.php';

/**
 * usuario_CONTROLLER
 * This class is used to manage the entity 'usuario'.
 * It extends the Base_CONTROLLER class to inherit common functionalities.
 * @package app
 * @subpackage usuario
 */

class usuario_CONTROLLER extends Base_CONTROLLER
{

    /**
     * __constructor
     * This method initializes the usuario_CONTROLLER class.
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * personalized_correo_usuario()
     * This method validates the 'correo_usuario' field to ensure it is a valid email format.
     * @return bool|array Returns true if valid, or an array with feedback details if not.
     */
    function personalized_correo_usuario()
    {
        if (filter_var($this->valores["correo_usuario"], FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            $feedback['ok'] = false;
            $feedback['code'] = 'personalizado_correo_usuario_KO';
            $feedback['resources'] = false;
            return $feedback;
        }
    }
}
