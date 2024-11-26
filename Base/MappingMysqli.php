<?php

include './Base/Base_Mapping.php';

class Mapping extends Base_Mapping{

    public $query;

    function __construct(){
		
	}

    function mapping_ADD(){      
        
        
        $this->query = "INSERT INTO " .$this->tabla;

        $atributos = implode(", ", $this->listaAtributos);
       
        $this->query = $this->query. " (" .$atributos. ")";
        $this->query = $this->query. " VALUES ";
        
        $aux = implode(", ", array_map(function($value) {
            return is_string($value) ? "'$value'" : $value;
        }, $this->listaValores));
        $this->query = $this->query. " (" .$aux. ")";
        
       
        // Prueba -- (5, "Jorge", "ESEI","alumno","Calle D Nº3 7ºD" , "jorge@gmail.com");
         return $this->execute_simple_query();
     
     }
   
     function mapping_EDIT(){        
        $this->query = "UPDATE " .$this->tabla . " SET ";

        $temp ="`nombre_usuario`='Pablo' WHERE id_usuario=4";
        
        return $this->execute_simple_query();
 
     }
    
    function mapping_SEARCH(){        
        
       $this->query = "SELECT * FROM " .$this->tabla;
      
       $query = '';
       if(!empty($this->valores)){
            $query = $query. " WHERE (";
            // se añadiria a la cadena de busqueda los valores
            $query = $query . $this->construirWhereLike($this->valores);
            $query = $query. " )";
       }
       
       $this->query .= $query;

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

            $cadena = $cadena . "(". $clave. " LIKE ".  "'%" .$valor ."%' )";
        }

        return $cadena;
    }

    function mapping_DELETE($tabla,$clavesPrimarias,$valores){        
        
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