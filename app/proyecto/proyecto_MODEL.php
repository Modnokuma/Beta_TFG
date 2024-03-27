<?php

include './Base/Base_MODEL.php';

class proyecto_MODEL EXTENDS Base_MODEL{
    public $tabla;
    public $clave;
    public $foranea;

    function __construct(){
        $this->tabla='proyecto';
        $this->clave=array('id_proyecto');
        $this->foranea=array();    
    }
    

}


?>