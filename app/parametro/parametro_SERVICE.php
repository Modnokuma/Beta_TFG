<?php

include './Base/Base_SERVICE.php';

class parametro_SERVICE EXTENDS Base_SERVICE{

    function inicializarRest(){
		$this->model = $this->crearModelo('parametro'); // crear en base service en base al nombre de la clase instanciada

	}

}

?>