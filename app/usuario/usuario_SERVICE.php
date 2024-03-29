<?php

include './Base/Base_SERVICE.php';

class usuario_SERVICE EXTENDS Base_SERVICE{

    function inicializarRest(){

		$this->listaAtributos = usuario_description['attributes'];
		$this->modelo = $this->crearModelo('usuario');

		/*foreach($this->listaAtributos as $i){
			echo($i);
		}*/	


	}

}


?>