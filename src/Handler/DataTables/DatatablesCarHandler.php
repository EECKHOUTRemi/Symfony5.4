<?php

namespace App\Handler\DataTables;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Cars;

class DatatablesCarHandler
{
    /** @var EntityManagerInterface */
    private $em;
    
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    
    public function handle()
    {
        $cars = $this->em->getRepository(Cars::class)->findAll();
        $dataCar = [];

        foreach($cars as $car){
            $driver = $car->getDriver();

            $dataCar[] = [
                "id" => $car->getId(),
                "brand" => $car->getBrand(),
                "model" => $car->getModel(),
                "horsepower" => $car->getHorsepower(),
                "name" => $driver ? ($driver->getLastname() . ' ' . $driver->getFirstname()) : ''
            ];           
        }

        return $dataCar;
    }
}