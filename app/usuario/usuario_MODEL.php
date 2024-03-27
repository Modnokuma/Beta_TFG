<?php

include './Base/Base_MODEL.php';

class usuario_MODEL EXTENDS Base_MODEL{
    public $tabla;
    public $clave;
    public $foranea;

    function __construct(){
        $this->tabla='usuario';
        $this->clave=array('id_usuario');
        $this->foranea=array();    
    }
    

}


?>