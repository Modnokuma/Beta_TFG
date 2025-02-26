<?php
include_once './Base/Base_Tests_Description.php';

class Base_Tests
{
    protected $accion;
    protected $variables;
    protected $entidad;
    protected $estructura;

    public function __construct()
    {
        $description = 'base_test_description';
        $this->estructura = $$description;
        
    }

    public function testAdd()
    {
        $accion = $this->estructura['testAdd']['action'];
        $variables = $this->estructura['testAdd']['variables'];
        $entidad = $this->estructura['testAdd']['controlador'];

        $nombreestructura = $entidad . '_description';
        $contenidoestructura = $$nombreestructura;
        $entidad_service = $entidad . "_SERVICE";
        $service = new $entidad_service($contenidoestructura, $accion, array($variables));
        $resultado = $service->ADD();

        if ($resultado['code'] === 'RECORDSET_DATOS') {
            echo "ADD test passed\n";
        } else {
            echo "ADD test failed\n";
        }
    }

    public function testEdit()
    {
        $accion = $this->estructura['testEdit']['action'];
        $variables = $this->estructura['testEdit']['variables'];
        $entidad = $this->estructura['testEdit']['controlador'];


        $nombreestructura = $entidad . '_description';
        $contenidoestructura = $$nombreestructura;
        $entidad_service = $entidad . "_SERVICE";
        $service = new $entidad_service($contenidoestructura, $accion, array($variables));
        $resultado = $service->EDIT();

        if ($resultado['code'] === 'RECORDSET_DATOS') {
            echo "EDIT test passed\n";
        } else {
            echo "EDIT test failed\n";
        }
    }

    public function testSearch()
    {
        $accion = $this->estructura['testSearch']['action'];
        $variables = $this->estructura['testSearch']['variables'];
        $entidad = $this->estructura['testSearch']['controlador'];


        $nombreestructura = $entidad . '_description';
        $contenidoestructura = $$nombreestructura;
        $entidad_service = $entidad . "_SERVICE";
        $service = new $entidad_service($contenidoestructura, $accion, array($variables));
        $resultado = $service->SEARCH();


        if ($resultado['code'] === 'RECORDSET_DATOS') {
            echo "SEARCH test passed\n";
        } else {
            echo "SEARCH test failed\n";
        }
    }

    public function testDelete()
    {
        $accion = $this->estructura['testDelete']['action'];
        $variables = $this->estructura['testDelete']['variables'];
        $entidad = $this->estructura['testDelete']['controlador'];


        $nombreestructura = $entidad . '_description';
        $contenidoestructura = $$nombreestructura;
        $entidad_service = $entidad . "_SERVICE";
        $service = new $entidad_service($contenidoestructura, $accion, array($variables));
        $resultado = $service->DELETE();


        if ($resultado['code'] === 'RECORDSET_DATOS') {
            echo "DELETE test passed\n";
        } else {
            echo "DELETE test failed\n";
        }
    }


    public function run()
    {
        $this->testAdd();
        $this->testEdit();
        $this->testSearch();
        $this->testDelete();
    }

}


