<?php

include_once './Tests/Tests_Description.php';
include './common/credentialsDB.php';
include_once "./common/config.php";

/**
 * Tests
 * This class is used to run tests on the API endpoints.
 * It includes methods for PUT, GET, POST, DELETE, and OPTIONS requests.
 * @package beta_TFG
 * @subpackage Tests
 * @var string $accion // creo que no se usa
 * @var mixed $variables  Key-value pairs representing the values of the entity's attributes.
 * @var mixed $entidad // creo que no se usa
 * @var mixed $estructura Structure of the entity.
 * @var string $host Database host.
 * @var string $bd_testing Database name for testing.
 * @var string $user_testing Database user for testing.
 * @var string $pass_testing Database password for testing.
 
 */

class Tests
{
    protected $accion;
    protected $variables;
    protected $entidad;
    protected $estructura;
    private $host = host;
    private $bd_testing = bd_testing;
    private $user_testing = user_testing;
    private $pass_testing = pass_testing;

    /**
     * __construct()
     * This method initializes the Tests class.
     * It sets the structure of the entity to a predefined description.
     */
    public function __construct()
    {
        $description = 'test_description';
        $this->estructura = $description;
    }

    /**
     * test_put($test)
     * This method sends a PUT request to the API endpoint.
     * @param array $test Contains the variables to be sent in the request.
     * @return string The response from the API.
     */
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

    /**
     * test_get($test)
     * This method sends a GET request to the API endpoint.
     * @param array $test Contains the variables to be sent in the request.
     * @return string The response from the API.
     */
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

    /**
     * test_post($test)
     * This method sends a POST request to the API endpoint.
     * @param array $test Contains the variables to be sent in the request.
     * @return string The response from the API.
     */
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

    /**
     * test_delete($test)
     * This method sends a DELETE request to the API endpoint.
     * @param array $test Contains the variables to be sent in the request.
     * @return string The response from the API.
     */
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

    /**
     * test_run($test)
     * This method runs a specific test based on the action defined in $test.
     * @param array $test Includes all the test information including action and variables.
     * @return string The result of the test execution.
     */
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

    /**
     * test_exec()
     * This method executes all the tests defined in 'tests_description'.
     * @return bool True if the operation was successful.
     */
    public function test_exec()
    {
        $contadorPruebas = 0;
        $contadorPruebasCorrectas = 0;
        $output = "";

        foreach (tests_description as $test) {
            $result = $this->test_run($test);
            $result = json_decode($result, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                echo "Error al decodificar JSON: " . json_last_error_msg();
            }

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

    /**
     * run()
     * Entry point for running the tests.
     * @return void
     */
    public function run()
    {
        $this->reset_DB();
        return $this->test_exec();
    }

    /**
     * reset_DB()
     * This method resets the database and fills it with predefined test data.
     * @return bool True if the operation was successful.
     */
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

        $this->fill_DB_with_data();

        $conexion->close();
        return true;
    }

    /**
     * fill_DB_with_data()
     * This method fills the database with predefined test data.
     * @return void
     */
    public function fill_DB_with_data()
    {
        foreach (tests_preparation as $test) {
            $result = $this->test_run($test);
            $result = json_decode($result, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                echo "Error al decodificar JSON: " . json_last_error_msg();
            }
        }
    }
}
