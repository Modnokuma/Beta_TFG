<?php

include './Base/Base_SERVICE.php';

class proyecto_SERVICE EXTENDS Base_SERVICE{

	public $modelo;

    function inicializarRest(){

		$this->listaValores = array_slice(array_values(variables), 1); // El primero es controlador por eso nos lo cargamos

		$this->listaAtributos = proyecto_description['attributes'];
		
		$this->modelo = $this->crearModelo('proyecto');


	}
}


?>