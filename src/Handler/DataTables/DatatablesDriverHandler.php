<?php

namespace App\Handler\DataTables;

use App\Handler\Driver\ReadDriverHandler;

class DatatablesDriverHandler{

    /** @var ReadDriverHandler */
    private $readDriverHandler;

    public function __construct(ReadDriverHandler $readDriverHandler){
        $this->readDriverHandler = $readDriverHandler;
    }

    public function handle(){
        $drivers = $this->readDriverHandler->handle();
        $dataDriver = [];

        foreach($drivers as $driver){
            $car = $driver->getCar();
            
            array_push($dataDriver, [
                "id" => $driver->getId(),
                "lastname" => $driver->getLastname(),
                "firstname" => $driver->getFirstname(),
                "age" => $driver->getAge(),
                "email" => $driver->getEmail(),
                "car" => ($car ? $car->getBrand() . ' ' . $car->getModel() : null)
            ]);            
        }
        return $dataDriver;
    }
}