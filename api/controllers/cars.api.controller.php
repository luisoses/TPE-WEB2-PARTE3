<?php

require_once 'api/models/car.model.php';
require_once 'api/models/brand.model.php';
require_once 'api/views/json.view.php';

class CarsApiController {
    private $carmodel;
    private $brandmodel;
    private $view;

    
    public function __construct(){
        $this->carmodel = new CarModel();
        $this->brandmodel = new BrandModel();
        $this->view = new JSONView();
    }

    public function getAll() {

        $orderBy = isset($_GET['orderBy']) ? $_GET['orderBy'] : null;
        $direction = isset($_GET['direction']) ? $_GET['direction'] : 'ASC';
    

        $cars = $this->carmodel->getAllCars($orderBy, $direction);
    
        return $this->view->response($cars);
    }

    public function get ($req, $res) {
        $id = $req->params->id;

        $car = $this->carmodel->getCar($id);

        if(!$car) {
            return $this->view->response("La tarea con el id=$id no existe", 404);
        }

        return $this->view->response($car);
    }

    public function addCar ($req, $res) {
        
        if (empty($req->body->ID_Marca) || empty($req->body->Modelo) || empty($req->body->Motor) || empty($req->body->Combustible) || empty($req->body->Transmision) || empty($req->body->Tipo)) {
            return $this->view->response('Faltan completar datos', 400);
        }

        $ID_Marca = $req->body->ID_Marca;
        $Modelo = $req->body->Modelo;
        $Motor = $req->body->Motor;
        $Combustible = $req->body->Combustible;
        $Transmision = $req->body->Transmision;  
        $Tipo = $req->body->Tipo;  

        $id = $this->carmodel->insertCars($ID_Marca,$Modelo,$Motor,$Combustible,$Transmision,$Tipo);

        if (!$id) {
            return $this->view->response("Error al insertar auto", 500);
        }

        $car = $this->carmodel->getCar($id);
        return $this->view->response($car, 201);
    }

    public function updateCar ($req, $res) {
        
        $id = $req->params->id;

        $car = $this->carmodel->getCar($id);

        if (!$car) {
            return $this->view->response("El auto con el numero=$id no existe", 404);
        }
        
        
        if (empty($req->body->ID_Marca) || empty($req->body->Modelo) || empty($req->body->Motor) || empty($req->body->Combustible) || empty($req->body->Transmision) || empty($req->body->Tipo)) {
            return $this->view->response('Faltan completar datos', 400);
        }

        $ID_Marca = $req->body->ID_Marca;
        $Modelo = $req->body->Modelo;
        $Motor = $req->body->Motor;
        $Combustible = $req->body->Combustible;
        $Transmision = $req->body->Transmision;  
        $Tipo = $req->body->Tipo;


        $this->carmodel->updateCar($id,$ID_Marca,$Modelo,$Motor,$Combustible,$Transmision,$Tipo);

        $car = $this->carmodel->getCar($id);
        return $this->view->response($car, 200);
    }

    public function addBrand($req, $res) {
        if (empty($req->body->Marca)) {
            return $this->view->response('Porfavor ingrese una marca', 400);
        }

        $Marca = $req->body->Marca;

        $id = $this->brandmodel->insertBrands($Marca);
        
        if (!$id) {
            return $this->view->response("Error al insertar una marca", 500);
        }

        $brand = $this->brandmodel->getBrand($id);
        return $this->view->response($brand, 201);
    }

    public function updateBrand($req, $res) {
        $id = $req->params->id;

        $brand = $this->brandmodel->getBrand($id);

        if (!$brand) {
            return $this->view->response("La marca con el numero=$id no existe", 404);
        }
        
    
        if (empty($req->body->Marca)) {
            return $this->view->response('Faltan completar datos', 400);
        }

        $nuevoNombre = $req->body->Marca;

        $this->brandmodel->updateBrand($id,$nuevoNombre);

        $brand = $this->brandmodel->getBrand($id);
        return $this->view->response($brand, 200); 
    }

    public function deleteCar ($req, $res) {
        $id = $req->params->id;

        $car = $this->carmodel->getCar($id);

            if (!$car) {
                return $this->view->response("El auto no existe", 404);
            }

        $this->carmodel->deleteCar($id);
        $this->view->response("El auto se borro de la base de datos con exito");
    }
}