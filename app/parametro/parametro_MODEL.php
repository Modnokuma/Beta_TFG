<?php

include_once './Base/Base_MODEL.php';

class parametro_MODEL EXTENDS Base_MODEL{
    public $tabla;
    public $clavesPrimarias;
    public $foranea;

    function __construct(){
        $this->tabla='parametro';
        $this->clavesPrimarias=array('id_parametro');
        $this->foranea=array();    
    }
    

}


?>