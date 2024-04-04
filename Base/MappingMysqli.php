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
    
    function SEARCH($tabla, $lista_atributos, $valores){        
        
       $this->query = "SELECT * FROM " .$tabla;
       if(!empty($valores)){
            $query = $query. " WHERE (";
            // se añadiria a la cadena de busqueda los valores
            $query = $query . $this->construirWhereLike($valores);
            $query = $query. " )";
       }
       
       $this->query = $query;
       return $this->get_results_from_query();
        
    }

    function construirWhereLike ($valores){
        $cadena = '';
        $primero = true;

        foreach($valores as $clave => $valor){
            
            if($primero){
                $primero = false;
            } else{
                $cadena = $cadena . " AND ";
            }

            $cadena = $cadena . "(". $clave. "LIKE ".  "'%" .$valor ."%' )";
        }

        return $cadena;
    }

    function DELETE($tabla,$clavesPrimarias,$valores){        
        
        $this->query = 'DELETE FROM' .$tabla. " WHERE (";
        //funcion de construccion del '='
        $this->query = $this->query. ")";


        return $this->execute_simple_query();        
     }

     function construirWhereIgual ($clavesPrimarias, $valores){
        $cadena = '';
        $primero = true;

        foreach($valores as $clave => $valor){
            //recorre todo el array y el que no este vacio es la clave que hay que poner?

            if(in_array($clave,$clavesPrimarias)){
                if($primero){
                    $primero = false;
                } else {
                    $cadena = $cadena . " AND ";
                }

                $cadena = $cadena . "( " . $clave . " = " .$valor . ")";
            }
        }

     }



}



?>