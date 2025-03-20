<?php

function responder($texto){
    header('Content-type: application/json');
    echo(json_encode($texto));
    exit();
}

$metodoHTTP = $_SERVER['REQUEST_METHOD'];

switch ($metodoHTTP){
    case 'PUT':
        // Se puede  usar $_PUT
        parse_str(file_get_contents("php://input"),$variables);
        define ('variables', $variables);
        define ('action', 'ADD');
        break;
    case 'DELETE':
        parse_str(file_get_contents("php://input"),$variables);
        define ('variables', $variables);
        define ('action', 'DELETE');
        $action = 'DELETE';
        break;
    case 'POST':
        define ('variables', $_POST);
        define ('action', 'EDIT');
        $action = 'EDIT';
        break;
    case 'GET':

        define ('variables', $_GET);
        define ('action', 'SEARCH');     
        $action = 'SEARCH';
        break;
    case 'OPTIONS':
        parse_str(file_get_contents("php://input"),$variables);
        define ('variables', $variables);
        define ('action', 'SEARCH_BY');     
        $action = 'SEARCH_BY';
        break;
    default: echo "Entro en el DEFAULT ";
        break;
 }

$controlador = variables['controlador'];

include "./app/".$controlador."/".$controlador."_CONTROLLER.php";

$claseatratar = $controlador."_CONTROLLER";
$claseinstanciada = new $claseatratar;


?>