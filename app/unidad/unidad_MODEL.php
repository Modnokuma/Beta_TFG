<?php

include './Base/Base_MODEL.php';

class unidad_MODEL EXTENDS Base_MODEL{
    public $tabla;
    public $clavesPrimarias;
    public $foranea;

    function __construct(){
        $this->tabla='unidad';
        $this->clavesPrimarias=array('id_unidad');
        $this->foranea=array('id_parametro');    
    }
    

}


?>