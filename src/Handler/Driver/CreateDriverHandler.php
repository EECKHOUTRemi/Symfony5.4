<?php

namespace App\Handler\Driver;

use App\Entity\Cars;
use App\Entity\Driver;
use Doctrine\ORM\EntityManagerInterface;

class CreateDriverHandler{

    /** @var EntityManagerInterface */
    private $em;

    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }

    public function handle(
        ?string $brand, 
        ?string $model, 
        ?int $horsepower, 
        ?string $lastname, 
        ?string $firstname, 
        ?int $age, 
        ?string $email
    ){
        $car = new Cars();
        $car->setBrand($brand);
        $car->setModel($model);
        $car->setHorsepower($horsepower);
        
        $driver = new Driver();
        $driver->setLastname($lastname);
        $driver->setFirstname($firstname);
        $driver->setAge($age);
        $driver->setEmail($email);
        $driver->setCar($car);

        $car->setDriver($driver);

        $this->em->persist($driver);
        $this->em->flush();

        return [$driver, $car];
    }
}