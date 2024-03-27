<?php

include './Base/Base_SERVICE.php';

class proyecto_SERVICE EXTENDS Base_SERVICE{

    function inicializarRest(){

		$this->listaAtributos = proyecto_description['attributes'];
		/*foreach($this->listaAtributos as $i){
			echo($i);
		}*/	


	}
}


?>