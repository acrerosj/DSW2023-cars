<?php
namespace Andres\Cars\Controllers;

use Andres\Cars\Models\Car;

class CarController {
  
  public function __construct()
  {
    
  }

  public function list() {
    // return all cars
    $listCars = Car::getAll();
    require '../src/views/list.php';
  }

  public function show($id) {
    // return the car with this id
    $car = Car::find($id);
    if ($car) {
      require '../src/views/show.php';
    } else {
      echo "Car not found!";
    }
  }

  public function delete($id) {
    Car::delete($id);
    $this->list();
  }
}