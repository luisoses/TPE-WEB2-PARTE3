<?php
    
    require_once 'libs/router.php';

    require_once 'api/controllers/cars.api.controller.php';

    
    $router = new Router();


    $router->addRoute('cars'      ,            'GET',     'CarsApiController',   'getAll');
    $router->addRoute('cars/:id'  ,            'GET',     'CarsApiController',   'get'); 
    $router->addRoute('cars'      ,            'POST',    'CarsApiController',   'addCar'); 
    $router->addRoute('cars/:id'      ,        'PUT',     'CarsApiController',   'updateCar'); 
    $router->addRoute('cars/:id'      ,        'DELETE',  'CarsApiController',   'deleteCar'); 
    $router->addRoute('brands'      ,          'POST',    'CarsApiController',   'addBrand'); 
    $router->addRoute('brands/:id'      ,      'PUT',     'CarsApiController',   'updateBrand'); 

    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
 