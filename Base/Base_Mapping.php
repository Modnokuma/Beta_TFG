<?php

include './common/credentialsDB.php';

class Base_Mapping
{

    private $conn;
    public $query;
    public $ok = true;
    public $code = '00000';
    public $feedback = array();
    public $resource = '';
    private $host = host;
    private $userbd = userbd;
    private $passuserbd = passuserbd;
    private $bd = bd;
    private $bd_testing = bd_testing;
    private $user_testing = user_testing;
    private $pass_testing = pass_testing;
    public $rows = array();

    function connection()
    {
       
        if (isset(variables['TESTING'])) {
            //conexion a la base de datos de pruebas            
            $this->conn = new mysqli($this->host, $this->user_testing, $this->pass_testing, $this->bd_testing) or die('fallo conexion');
                
            return true;
        } else {

            try {
                $this->conn = new mysqli($this->host, $this->userbd, $this->passuserbd, $this->bd) or die('fallo conexion');

                return true;
            } catch (Exception $e) {
                return false;
            }
        }
    }

    private function close_connection()
    {
        $this->conn->close();
    }

    // Metodo para ejecutar funciones de ADD/EDIT/DELETE
    public function execute_simple_query()
    {

        if (!($this->connection())) {

            $this->ok = false;
            $this->code = 'CONEXION_KO';
            //llama a la funcion que construye el mensaje respuesta
            $this->construct_response();
            return $this->feedback;
        } else {

            //Ejecutamos la query
            
            $result_query = $this->conn->query($this->query);
            if ($result_query != true) {
                //Ha sucedido un error
                $this->ok = false;
                $this->code = 'SQL_KO';
                $this->resource = $this->query;
                //llamamos al metodo que construye el mensaje
                $this->construct_response();
                return $this->feedback;
            } else {
                //La operacion tiene exito
                $this->ok = true;
                $this->code = 'SQL_OK';
                if (action == 'ADD') {
                    //$lastid = $this->conn->query(SELECT LAST_INSERT_ID());
                    $this->resource = mysqli_insert_id($this->conn);
                }
                else{
                    $this->resource = $this->query;
                }
                //llamamos al metodo que construye el mensaje
                $this->construct_response();
                return $this->feedback;
            }
        }

        $this->close_connection();
    }

    // Metodo para hacer un SEARCH
    public function get_results_from_query()
    {

        if (!($this->connection())) {

            $this->ok = false;
            $this->code = 'CONEXION_KO';
            //llama a la funcion que construye el mensaje respuesta
            $this->construct_response();
            return $this->feedback;
        } else {

            $result_query = $this->conn->query($this->query);
            
            if ($result_query != true) {

                $this->ok = false;
                $this->code = 'SQL_KO';
                $this->resource = $this->query;
                //llamamos al metodo que construye el mensaje
                $this->construct_response();
                return $this->feedback;
            } else {

                $numFilas = $result_query->num_rows;
                if ($numFilas == 0) {

                    //esta vacio
                    $this->ok = true;
                    $this->code = 'RECORDSET_VACIO';
                    $this->construct_response();
                    return $this->feedback;
                } else {

                    //devuelves el contenido
                    for ($i = 0; $i < $numFilas; $i++) {
                        $this->rows[] = $result_query->fetch_assoc();
                        $this->resource = $this->rows;
                    }
                    $this->ok = true;
                    $this->code = 'RECORDSET_DATOS';
                    $this->construct_response();
                    return $this->feedback;
                }
            }

            $this->close_connection();
        }
    }


    // Metodo para ejecutar una query personalizada
    public function personalized_query($queryPrueba)
    {
        
        if (!($this->connection())) {

            $this->ok = false;
            $this->code = 'CONEXION_KO';
            $this->construct_response();
            return $this->feedback;
        } else {
            
            $result_query = $this->conn->query($queryPrueba);
            if ($result_query != true) {

                $this->ok = false;
                $this->code = 'SQL_KO';
                $this->resource = $queryPrueba;
                $this->construct_response();
                return $this->feedback;
            }
            return $result_query;
        }
    }


    public function construct_response()
    {
        $this->feedback['ok'] = $this->ok;
        $this->feedback['code'] = $this->code;
        $this->feedback['resource'] = $this->resource;
    }
}
