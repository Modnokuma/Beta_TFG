<?php
/*
* Base_MODEL
* This class extends the `Mapping` class and provides specific implementations for CRUD operations.
*
* @var array $valores Key-value pairs representing the values of the entity's attributes.
* @var array $listaAtributos List of attributes of the entity.
* @var array $clavesPrimarias Primary keys of the entity.
*/

include_once './Base/MappingMysqli.php';

class Base_MODEL extends Mapping
{

    public $valores = array();
    public $listaAtributos = array(); // Atributos del modelo
    public $clavesPrimarias = array(); // Claves primarias del modelo

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

    // Se puede borrar?
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
