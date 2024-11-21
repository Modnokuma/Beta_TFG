<?php

include './Base/Base_SERVICE.php';

class usuario_SERVICE EXTENDS Base_SERVICE{

	public $modelo;

    function inicializarRest(){

		$this->listaAtributos = array_keys(usuario_description['attributes']);
		
		$this->modelo = $this->crearModelo('usuario');


	}

}


?>