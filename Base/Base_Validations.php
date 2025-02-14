<?php

include_once './Base/Base_Action_Validations.php';
include_once './Base/Base_Data_Validations.php';

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
       
        $data_validations = new Base_Data_Validations($this->estructura, $this->valores, $this->listaAtributos);
        $respuesta_data_validations = $data_validations->data_validations();    
        
        if($respuesta_data_validations !== true){
            return $respuesta_data_validations;
        }

        $action_validations = new Base_Action_Validations($this->estructura, $this->valores, $this->listaAtributos);
        $respuesta_action_validations = $action_validations->action_validations();
        

        if ($respuesta_action_validations !== true) {
            return $respuesta_action_validations;
        }

        return $respuesta;
    }

   
}
