<?php

include './Base/Base_Mapping.php';

class Mapping extends Base_Mapping
{

    public $query;
    public $tabla;
    public $valores = [];
    public $clavesPrimarias = [];
    public $listaAtributos = [];

    function __construct() {}

    function mapping_ADD()
    {

        $this->query = "INSERT INTO " . $this->tabla;

        $atributos = implode(", ", array_slice($this->listaAtributos, 1));

        $this->query = $this->query . " (" . $atributos . ")";
        $this->query = $this->query . " VALUES (";
        /*$aux = implode(", ", array_map(function ($value) {
            return is_string($value) ? "'$value'" : $value;
        }, array_values($this->valores)));*/
       
        $total = count($this->listaAtributos);
        $i = 0;
        foreach ($this->listaAtributos as $atributo) {

            if($this->estructura['attributes'][$atributo]['pk']){
                $i++;
                continue;
            }
            if (!$this->estructura['attributes'][$atributo]['numeric']) {
                $this->query = $this->query. "'" . $this->valores[$atributo] . "'";
            } else {
                $this->query = $this->query . $this->valores[$atributo];
            }

            if (++$i !== $total) {
                $this->query .= ", ";
            }
        }
        $this->query = $this->query . ")";
       
        return $this->execute_simple_query();
    }

    function mapping_EDIT()
    {

        $this->query = "UPDATE " . $this->tabla . " SET ";

        $total = count($this->listaAtributos);
        $i = 0;
        foreach ($this->listaAtributos as $atributo) {
            $this->query = $this->query . $atributo . " = ";
            if (!$this->estructura['attributes'][$atributo]['numeric']) {
                $this->query = $this->query . "'" . $this->valores[$atributo] . "'";
            } else {
                $this->query = $this->query . $this->valores[$atributo];
            }

            if (++$i !== $total) {
                $this->query .= ", ";
            }
        }

        $cadena = $this->construirWhereIgual($this->valores);
        $this->query = $this->query . " WHERE " . $cadena;

        return $this->execute_simple_query();
    }

    function mapping_SEARCH()
    {
        
        $this->query = "SELECT * FROM " . $this->tabla;
        
        $query = '';
        if (!empty($this->valores)) {
            $query = $query . " WHERE (";
            // se añadiria a la cadena de busqueda los valores
            $query = $query . $this->construirWhereLike($this->valores);
            $query = $query . " )";
        }

        $this->query .= $query;
       
        return $this->get_results_from_query();
    }

    function construirWhereLike($valores)
    {
        $cadena = '';
        $primero = true;
        
        
        foreach ($valores as $clave => $valor) {

            if ($primero) {
                $primero = false;
            } else {
                $cadena = $cadena . " AND ";
            }

            $cadena = $cadena . "(" . $clave . " LIKE " .  "'%" . $valor . "%' )";
        }

        return $cadena;
    }

    function mapping_DELETE()
    {
        $this->query = 'DELETE FROM ' . $this->tabla . " WHERE ";
        $this->query .= $this->construirWhereIgual($this->valores);
        return $this->execute_simple_query();
    }

    function construirWhereIgual($valores)
    {
        $cadena = '';
        $primero = true;

        foreach ($valores as $clave => $valor) {
            //recorre todo el array y el que no este vacio es la clave que hay que poner?
            
            if (in_array($clave, $this->clavesPrimarias)) {

                if ($primero) {
                    $primero = false;
                } else {
                    $cadena = $cadena . " AND ";
                }
                //is_string($valor) ? $valor = "'$valor'" : $valor;
                (!$this->estructura['attributes'][$clave]['numeric']) ? $valor = "'$valor'" : $valor;
                $cadena = $cadena . "( " . $clave . " = " . $valor . ")";
            }
        }
        
        return $cadena;
    }
}
