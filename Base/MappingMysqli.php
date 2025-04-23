<?php
/*
* MappingMysqli
* This class extends `Base_Mapping` and provides specific implementations for database operations using MySQLi.
*
* @var string $tabla Name of the database table associated with the entity.
* @var array $valores Key-value pairs representing the values of the entity's attributes.
* @var array $clavesPrimarias Primary keys of the entity.
* @var array $listaAtributos List of attributes of the entity.
*/

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

            if (isset($this->estructura['attributes'][$atributo]['autoincrement'])) {
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

            if (isset($this->estructura['attributes'][$atributo]['autoincrement'])) {
                $i++;
                continue;
            }

            if ((isset($this->estructura['attributes'][$atributo]['type']))) {
                if ($this->estructura['attributes'][$atributo]['type'] != "integer") {
                    $this->query = $this->query . "'" . $this->valores[$atributo] . "'";
                } else {
                    $this->query = $this->query . $this->valores[$atributo];
                }
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

            if ((isset($this->estructura['attributes'][$atributo]['type']))) {
                if ($this->estructura['attributes'][$atributo]['type'] != "integer") {
                    $this->query = $this->query . "'" . $this->valores[$atributo] . "'";
                } else {
                    $this->query = $this->query . $this->valores[$atributo];
                }
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
        $nuevos_valores = [];
        $this->query = "SELECT * FROM " . $this->tabla;
        $query = '';

        if (!empty($this->valores)) {

            // Para construir el where solo con los datos necesarios
            foreach ($this->valores as $clave => $valor) {
                if ($valor != '') {
                    $nuevos_valores[$clave] = $valor;
                }
            }

            // Si no tienes datos hace una busqueda vacia
            if (!empty($nuevos_valores)) {
                $query = $query . " WHERE (";
                // se añadiria a la cadena de busqueda los valores
                $query = $query . $this->construirWhereLike($nuevos_valores);
                $query = $query . ")";
            }
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

            $cadena = $cadena . "(" . $clave . " LIKE " .  "'%" . $valor . "%')";
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
        $nuevos_valores = [];
        $this->query = "SELECT * FROM " . $this->tabla;
        $query = '';
        if (!empty($this->valores)) {
            // Para construir el where solo con los datos necesarios
            foreach ($this->valores as $clave => $valor) {
                if ($valor != '') {
                    $nuevos_valores[$clave] = $valor;
                }
            }

            $query = $query . " WHERE (";
            $query = $query . $this->construirWhereIgualSearchBy($nuevos_valores);
            $query = $query . ")";
        }

        $this->query .= $query;
        return $this->get_results_from_query();
    }

    function construirWhereIgual($valores)
    {
        $cadena = '';
        $primero = true;

        foreach ($valores as $clave => $valor) {
            if (array_key_exists($clave, $this->clavesPrimarias)) {
               
                if ($primero) {
                    $primero = false;
                } else {
                    $cadena = $cadena . " AND ";
                }
               
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

        foreach ($valores as $clave => $valor) {
            if ($primero) {
                $primero = false;
            } else {
                $cadena = $cadena . " AND ";
            }

            $cadena = $cadena . "(" . $clave . " = " . (is_string($valor) ? "'$valor'" : $valor) . ")";
        }

        return $cadena;
    }
   //Borrar???
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
    }
}
