<?php

include_once './Base/Base_SERVICE.php';

class usuario_SERVICE EXTENDS Base_SERVICE{

    function inicializarRest(){
		
		$this->model = $this->crearModelo('usuario'); // crear en base service en base al nombre de la clase instanciada
	}

}


?>