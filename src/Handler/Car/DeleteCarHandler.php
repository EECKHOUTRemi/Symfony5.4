<?php

namespace App\Handler\Car;

use App\Entity\Cars;
use Doctrine\ORM\EntityManagerInterface;

class DeleteCarHandler{

    /** @var EntityManagerInterface */
    private $em;

    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }

    public function handle(int $carId){
        $repo = $this->em->getRepository(Cars::class);
        $car = $repo->find($carId);
        $this->em->remove($car);
        $this->em->flush();

        return $car;
    }
}