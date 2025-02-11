<?php

include_once './Base/Base_MODEL.php';

class usuario_MODEL EXTENDS Base_MODEL{
    public $tabla;
    public $clavesPrimarias;
    public $foranea;

    function __construct(){
        $this->tabla='usuario';
        $this->clavesPrimarias=array('id_usuario');
        $this->foranea=array();    
    }
    

}


?>