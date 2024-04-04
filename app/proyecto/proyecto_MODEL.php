<?php

include './Base/Base_MODEL.php';

class proyecto_MODEL EXTENDS Base_MODEL{
    public $tabla;
    public $clavesPrimarias;
    public $foranea;

    function __construct(){
        $this->tabla='proyecto';
        $this->clavesPrimarias=array('id_proyecto');
        $this->foranea=array();    
    }
    

}


?>