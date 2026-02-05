<?php

namespace App\Handler\Driver;

use App\Entity\Driver;
use Doctrine\ORM\EntityManagerInterface;

class DeleteDriverHandler{

    /** @var EntityManagerInterface */
    private $em;

    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }

    public function handle(int $driverId){
        $repo = $this->em->getRepository(Driver::class);
        $driver = $repo->find($driverId);
        $this->em->remove($driver);
        $this->em->flush();

        return $driver;
    }
}