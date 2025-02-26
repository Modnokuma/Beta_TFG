<?php

include_once './Base/MappingMysqli.php';

class Base_MODEL extends Mapping
{

    public $valores = array();
    public $listaAtributos = array(); // Atributos del modelo

    function EDIT()
    {
        return $this->mapping_EDIT();
    }
    function ADD()
    {
        return $this->mapping_ADD();
    }
    function accion()
    {
        return 'accionnnnn de service de usuario';
    }

    function same_user()
    {
        return $this->sameUserExists();
    }
    function SEARCH()
    {

        return $this->mapping_SEARCH();
    }

    function SEARCH_BY()
    {
        return $this->mapping_SEARCH_BY();
    }

    function DELETE()
    {

        return $this->mapping_DELETE();
    }
}
