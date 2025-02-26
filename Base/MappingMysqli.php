<?php

include_once './Base/Base_Mapping.php';

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

        $this->query = "INSERT INTO " . $this->tabla . " ( ";
        $total = count($this->listaAtributos);
        $i = 0;

        foreach ($this->listaAtributos as $atributo) {

            if ($this->estructura['attributes'][$atributo]['autoincrement']) {
                $i++;
                continue;
            }

            $this->query = $this->query . $atributo;

            if (++$i !== $total) {
                $this->query .= ", ";
            }
        }

        $this->query = $this->query . ") VALUES (";
        $i = 0;
        
        foreach ($this->listaAtributos as $atributo) {

            if ($this->estructura['attributes'][$atributo]['autoincrement']) {
                $i++;
                continue;
            }

            if ($this->estructura['attributes'][$atributo]['type'] != "integer") {
                $this->query = $this->query . "'" . $this->valores[$atributo] . "'";
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

            if ($this->estructura['attributes'][$atributo]['type'] != "integer") {
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

    function mapping_SEARCH_BY()
    {
        $this->query = "SELECT * FROM " . $this->tabla;
        //var_dump($this->valores);
        $query = '';
        if (!empty($this->valores)) {
            $query = $query . " WHERE (";
            // se añadiria a la cadena de busqueda los valores
            $query = $query . $this->construirWhereIgualSearchBy($this->valores);
            $query = $query . " )";
        }

        $this->query .= $query;
        echo $this->query;
        return $this->get_results_from_query();
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
                ($this->estructura['attributes'][$clave]['type'] == 'integer') ? $valor  : $valor = "'$valor'";
                $cadena = $cadena . "( " . $clave . " = " . $valor . ")";
            }
        }

        return $cadena;
    }

    function construirWhereIgualSearchBy($valores)
    {
        $cadena = '';
        $primero = true;
        //echo "\n" .$valores;

        foreach ($valores as $clave => $valor) {
            if ($primero) {
                $primero = false;
            } else {
                $cadena = $cadena . " AND ";
            }
            echo $valor;
            // Manejar el operador !=
            if (strpos($clave, '!=') !== false) {
                
                $clave = str_replace('!=', '', $clave);
                $cadena = $cadena . "(" . $clave . " != " . (is_string($valor) ? "'$valor'" : $valor) . ")";
            } else {
                
                $cadena = $cadena . "(" . $clave . " = " . (is_string($valor) ? "'$valor'" : $valor) . ")";
            }
        }

        return $cadena;
    }
    /*
    function sameUserExists()
    {
        $queryPrueba = "SELECT COUNT(*) as count FROM usuario WHERE nombre_usuario = '" . $this->valores['nombre_usuario'] . "'";
        $result_query = $this->personalized_query($queryPrueba);

        $rows = $result_query->fetch_all(MYSQLI_ASSOC);
        $numApariciones = intval($rows[0]['count']);

        if ($numApariciones > 0) {
            $feedback['ok'] = false;
            $feedback['code'] = 'USERNAME_ALREADY_EXISTS_KO';
            $feedback['resources'] = $queryPrueba;
            return $feedback;
        }

        return true;
    }
*/
    function foreignKeyExists($table, $foreignKey, $value)
    {

        $queryPrueba = "SELECT COUNT(*) as count FROM $table WHERE $foreignKey = $value";
        $result_query = $this->personalized_query($queryPrueba);

        $rows = $result_query->fetch_all(MYSQLI_ASSOC);
        $numApariciones = intval($rows[0]['count']);

        if ($numApariciones == 0) {
            // La clave foranea no existe
            return false;
        } else {

            return true;
        }

        return $result_query;

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
