<?php

include './Base/Base_Mapping.php';

class Mapping extends Base_Mapping
{

    public $query;
    public $tabla;
    public $valores = [];
    public $clavesPrimarias = [];
    public $aux;
    public $existeFK;
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

            if($this->estructura['attributes'][$atributo]['foreign_key']['table']){
                $array_tablas = $this->estructura['attributes'][$atributo]['foreign_key']['table'];
                $array_pk_tablas = $this->estructura['attributes'][$atributo]['foreign_key']['attribute'];
                
                foreach(array_combine($array_tablas, $array_pk_tablas) as $tabla => $pk){
                    $this->existeFK = $this->foreignKeyExists($tabla, $pk, $this->valores[$atributo]);
                   
                    if(!$this->existeFK){
                        $this->ok=false;
                        $this->code='FOREIGN_KEY_' . strtoupper($atributo) . '_KO';
                        $this->resource= $this->query;
                        $this->construct_response();
                        return $this->feedback;
                    }
                }
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
           
            if($this->estructura['attributes'][$atributo]['foreign_key']['table']){
                $array_tablas = $this->estructura['attributes'][$atributo]['foreign_key']['table'];
                $array_pk_tablas = $this->estructura['attributes'][$atributo]['foreign_key']['attribute'];
                
                foreach(array_combine($array_tablas, $array_pk_tablas) as $tabla => $pk){
                    $this->existeFK = $this->foreignKeyExists($tabla, $pk, $this->valores[$atributo]);
                   
                    if(!$this->existeFK){
                        $this->ok=false;
                        $this->code='FOREIGN_KEY_' . strtoupper($atributo) . '_KO';
                        $this->resource= $this->query;
                        $this->construct_response();
                        return $this->feedback;
                    }
                }
            }
            
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

    function foreignKeyExists($table, $foreignKey, $value)
    { 
        
        $queryPrueba = "SELECT COUNT(*) as count FROM $table WHERE $foreignKey = $value";
        $prueba = $this->get_Fk($queryPrueba);
    
        return $prueba;
       
        /*$stmt = $this->conexion->prepare($query);
        if ($stmt === false) {
            throw new Exception('Failed to prepare statement: ' . $this->conexion->error);
        }
        
        $stmt->execute();

        // resultado
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $stmt->close();

        return $row['count'] > 0;*/
    }
}
