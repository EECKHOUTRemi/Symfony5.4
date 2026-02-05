<?php

namespace App\Handler\Driver;

use App\Entity\Cars;
use App\Entity\Driver;
use Doctrine\ORM\EntityManagerInterface;

class UpdateDriversCarHandler{

    /** @var EntityManagerInterface */
    private $em;

    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }

    public function handle(?string $brand, ?string $model, ?int $horsepower, ?int $driverId){
        $repo = $this->em->getRepository(Driver::class);
        $driver = $repo->find($driverId);
        
        $car = new Cars;
        $car->setBrand($brand);
        $car->setModel($model);
        $car->setHorsepower($horsepower);
        $car->setDriver($driver);

        $driver->setCar($car);

        $this->em->flush();

        return [$driver, $car];
    }
}