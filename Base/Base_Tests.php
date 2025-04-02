<?php

include_once './Base/Base_Tests_Description.php';
include './common/credentialsDB.php';
include_once "./common/config.php";

class Base_Tests
{
    protected $accion;
    protected $variables;
    protected $entidad;
    protected $estructura;
    private $host = host;
    private $bd_testing = bd_testing;
    private $user_testing = user_testing;
    private $pass_testing = pass_testing;

    public function __construct()
    {
        $description = 'base_test_description';
        $this->estructura = $description;
    }

    public function test_put($test)
    {

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, URL_test);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($test['variables']));
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);
        $response = curl_exec($curl);
        curl_close($curl);
        
        return $response;
    }

    public function test_search_by($test)
    {

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, URL_test);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'OPTIONS');
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($test['variables']));
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);
        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }

    function test_get($test)
    {

        $curl = curl_init();
        $salida = "?";
        foreach ($test['variables'] as $key => $value) {
            $salida .= $key . "=" . $value . "&";
        }
        curl_setopt($curl, CURLOPT_URL, URL_test . $salida);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    function test_post($test)
    {

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, URL_test);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($test['variables']));
        $response = curl_exec($curl);
        curl_close($curl);
        
        return $response;
    }

    public function test_delete($test)
    {

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, URL_test);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($test['variables']));
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }


    public function test_run($test)
    {

        switch ($test['variables']['action']) {
            case 'ADD':
                return $this->test_put($test);
                break;
            case 'SEARCH':
                return $this->test_get($test);
                break;
            case 'EDIT':
                return $this->test_post($test);
                break;
            case 'DELETE':
                return $this->test_delete($test);
                break;
            case 'SEARCH_BY':
                return $this->test_search_by($test);
                break;
            default:

                break;
        }
    }


    public function test_exec()
    {
        $contadorPruebas = 0;
        $contadorPruebasCorrectas = 0;
        $output = "";

        foreach (base_tests_description as $test) {
            $result = $this->test_run($test);
            
            $result = json_decode($result, true);
           
            if (json_last_error() !== JSON_ERROR_NONE) {
                echo "Error al decodificar JSON: " . json_last_error_msg();
            }
            //exit();
            $output .= "\n";
            $output .= "Tabla: " . $test['variables']['controlador'] . "\n";
            $output .= "Acción: " . $test['variables']['action'] . "\n";
            $output .= "Esperado: " . $test['mensaje'] . " || Devuelto: " . $result['code'];
            if ($result['code'] == $test['mensaje']) {
                $output .= "  ||  CORRECTO";
                $contadorPruebasCorrectas++;
            } else {
                $output .= "  || INCORRECTO";
            }
            $output .= "\n";
            $contadorPruebas++;
        }

        $output .= "\n";
        echo ("----------" . "\n");
        echo ("RESULTADOS" . "\n");
        echo ("----------" . "\n");
        echo ("Pruebas Realizadas: " . $contadorPruebas . "\n");
        echo ("Pruebas Correctas: " . $contadorPruebasCorrectas . "\n");
        echo ("Pruebas Incorrectas: " . ($contadorPruebas - $contadorPruebasCorrectas) . "\n");
        echo ("----------" . "\n");
        echo ("DATOS " . "\n");
        echo ("----------" . "\n");

        echo $output;
        return true;
    }


    public function run()
    {
        $this->reset_DB();
        return $this->test_exec();
    }

    public function reset_DB()
    {
        $conexion = new mysqli($this->host, $this->user_testing, $this->pass_testing, $this->bd_testing) or die('fallo conexion');
        // Obtener todas las tablas de la base de datos

        $result =  $conexion->query("SHOW TABLES");
        // Deshabilitar temporalmente las restricciones de clave foránea
        $conexion->query("SET FOREIGN_KEY_CHECKS = 0");
        // Iterar sobre las tablas
        while ($row = $result->fetch_array()) {
            $table = $row[0];
            // Vaciar la tabla y resetear el contador AUTO_INCREMENT
            $conexion->query("TRUNCATE TABLE $table");
            $conexion->query("ALTER TABLE $table AUTO_INCREMENT = 1");
        }

        // Volver a habilitar las restricciones de clave foránea
        $conexion->query("SET FOREIGN_KEY_CHECKS = 1");

        // Metemos los datos necesarios para algunos test
        $conexion->query("INSERT INTO `parametro` (`id_parametro`, `nombre_parametro`, `descripcion_parametro`, `tipo_parametro`, `formato_parametro`, `rango_desde_parametro`, `rango_hasta_parametro`)
         VALUES (1, 'Masa', 'Magnitud física que expresa la inercia o resistencia al cambio de movimiento de un cuerpo', 'Tipo 1', '', '', '')");
        
        $conexion->query("INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `organizacion_usuario`, `puesto_usuario`, `direccion_usuario`, `correo_usuario`) 
        VALUES (1, 'Samuel', 'ESEI', 'alumno', 'Calle Santo Domingo', 'Samuel@gmail.com'),
               (2, 'Javi', 'ESEI', 'profesor', 'Calle B Nº2 1ºC', 'javi@javi.es')");
        
        $conexion->query("INSERT INTO `unidad` (`id_unidad`, `nombre_unidad`, `descripcion_unidad`, `id_parametro`) VALUES
        (1, 'Kg', 'Kilogramos, Unidad de peso y 1000 veces 1g', 1)");
        
        $conexion->close();
        return true;
    }
}
