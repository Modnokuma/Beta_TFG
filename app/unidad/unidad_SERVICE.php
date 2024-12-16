<?php

include './Base/Base_SERVICE.php';

class unidad_SERVICE EXTENDS Base_SERVICE{

    function inicializarRest(){
		$this->model = $this->crearModelo('unidad'); // crear en base service en base al nombre de la clase instanciada

	}

}

?>