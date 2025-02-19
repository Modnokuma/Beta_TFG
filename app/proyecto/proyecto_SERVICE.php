<?php

include_once './Base/Base_SERVICE.php';

class proyecto_SERVICE EXTENDS Base_SERVICE{


    function inicializarRest(){
		$this->model = $this->crearModelo('proyecto'); // crear en base service en base al nombre de la clase instanciada

	}


}


?>