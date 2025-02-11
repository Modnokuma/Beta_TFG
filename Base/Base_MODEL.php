<?php

include_once './Base/MappingMysqli.php';

class Base_MODEL extends Mapping{

    public $valores = array();
    public $listaAtributos = array(); // atributo de modelo

    function EDIT(){
        //$mapping = new Mapping($this->tabla);
        return $this->mapping_EDIT();
    }
    function ADD(){
        //$mapping = new Mapping($this->tabla);
       
        return $this->mapping_ADD();
    }
    function accion(){
        return 'accionnnnn de service de usuario';
    }

    function same_user(){
        //$mapping = new Mapping($this->tabla);
        return $this->sameUserExists();
    }
    function SEARCH(){
               
        return $this->mapping_SEARCH();
    }

    function DELETE(){
        //$mapping = new Mapping($this->tabla);
        return $this->mapping_DELETE();
    }


}


?>