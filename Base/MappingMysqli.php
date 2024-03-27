<?php

include './Base/Base_Mapping.php';

class Mapping extends Base_Mapping{

    public $query;
    public $tabla;

    function __construct($tabla){
		$this->tabla = $tabla;
	}

    function ADD(){        
        
        $this->query = 'INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `organizacion_usuario`,`puesto_usuario`, `direccion_usuario`, `correo_usuario`) VALUES (4, "Jorge", "ESEI","alumno","Calle D Nº3 7ºD" , "jorge@gmail.com")';
         return $this->execute_simple_query();
     
     }

     function EDIT(){        
        
        $this->query = 'UPDATE `usuario` SET `nombre_usuario`="Pablo" WHERE id_usuario=4';
         return $this->execute_simple_query();
 
     }
    
    function SEARCH($tabla, $lista_atributos, $valores_busqueda = null){        
        
       $this->query = "SELECT * FROM " .$tabla;
       if(!($valores_busqueda)){
            $query = $query. " WHERE ";
            // se añadiria a la cadena de busqueda los valores

       }
        return $this->get_results_from_query();
        
    }

    function DELETE(){        
        
        $this->query = 'DELETE FROM usuario WHERE id_usuario=4';
         return $this->execute_simple_query();
         
     }



}



?>