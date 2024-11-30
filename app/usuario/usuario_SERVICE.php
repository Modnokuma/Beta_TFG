<?php

include './Base/Base_SERVICE.php';

class usuario_SERVICE EXTENDS Base_SERVICE{

	public $modelo;

    function inicializarRest(){
		
		
		$this->listaValores = array_slice(array_values(variables), 1); // El primero es controlador por eso nos lo cargamos
		
		$this->listaAtributos = array_keys($this->estructura['attributes']);
		
		$this->modelo = $this->crearModelo('usuario');


	}

}


?>