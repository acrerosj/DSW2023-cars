<?php
namespace Andres\Cars\Models;

class Car {
  public $id;
  public $make;
  public $model;
  public $year;
  public $color;

  private static $dataFile = '../data/cars.json';

  public function __construct($id, $make, $model, $year, $color)
  {
    $this->id = $id;
    $this->make = $make;
    $this->model = $model;
    $this->year = $year;
    $this->color = $color;
  }

  public static function getAll() {
    $cars = [];
    $json = file_get_contents(self::$dataFile);
    $carsJSON = json_decode($json);
    foreach ($carsJSON as $carJSON) {
      $cars[] = new Car($carJSON->id,$carJSON->make,$carJSON->model,$carJSON->year,$carJSON->color);
    }
    return $cars;
  }

  public static function find($id) {
    foreach (self::getAll() as $car) {
      if ($car->id == $id) return $car;
    }
    return null;
  }

  public static function delete($id) {
    $cars = [];
    foreach (self::getAll() as $car) {
      if ($car->id != $id) {
        $cars[] = $car;
      }
    }
    self::save($cars);
  }

  public static function create($car) {
    $cars = self::getAll();
    $cars[] = $car;
    self::save($cars);
  }

  public static function save($data) {
    // Convert JSON data from an array to a string
    $jsonString = json_encode($data, JSON_PRETTY_PRINT);
    // Write in the file
    // $file = fopen(self::$dataFile, 'w');
    // fwrite($file, $jsonString);
    // fclose($file); 
    file_put_contents(self::$dataFile, $jsonString); 
  }
}