<?php

include './Base/MappingMysqli.php';

class Base_MODEL{

    function EDIT(){
        $mapping = new Mapping($this->tabla);
        return $mapping->EDIT();
    }
    function ADD(){
        $mapping = new Mapping($this->tabla);
        return $mapping->ADD();
    }
    function accion(){
        return 'accionnnnn de service de usuario';
    }
    function SEARCH(){
        /*$controlador =  variables['controlador'];
        $nombre = $controlador."_description";
        echo(proyecto_description['entity']);
        foreach (proyecto_description['attributes'] as $i){
            echo ($i);
        }*/
            
        
        $mapping = new Mapping($this->tabla);
        
        
        return $mapping->SEARCH($this->tabla, $this->listaAtributos, $this->valores);
        
    }

    function DELETE(){
        $mapping = new Mapping();
        return $mapping->DELETE();
    }


}


?>