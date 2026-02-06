<?php

namespace App\Handler\DataTables;

class DatatablesCarHandler{

    public function handle(){
        $cars = $em->getRepository(Cars::class)->findAll();
        $data = [];

        foreach($cars as $car){
            $driver = $car->getDriver();

            array_push(
                $data,
                [
                    $car->getId(),
                    $car->getBrand(),
                    $car->getModel(),
                    $car->getHorsepower(),
                    $driver->getLastname(),
                    $driver->getFirstname(),
                    $driver->getAge(),
                    $driver->getEmail()
                ]
            );            
        }

        return $data;
    }
}