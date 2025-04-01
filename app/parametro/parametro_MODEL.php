<?php

include_once './Base/Base_MODEL.php';

class parametro_MODEL extends Base_MODEL
{
    public $tabla;
    public $clavesPrimarias;
    public $foranea;

    function __construct()
    {
        //$this->clavesPrimarias = array('id_parametro');
    }
}
