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
        $data = [];

        foreach($drivers as $driver){
            $car = $driver->getCar();

            array_push(
                $data,
                [
                    $driver->getId(),
                    $driver->getLastname(),
                    $driver->getFirstname(),
                    $driver->getAge(),
                    $driver->getEmail(),
                    ($car ? $car->getBrand() : null),
                    ($car ? $car->getModel() : null),
                    ($car ? $car->getHorsepower() : null)
                ]
            );            
        }
        return $data;
    }
}