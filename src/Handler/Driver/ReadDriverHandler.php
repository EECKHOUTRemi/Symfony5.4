<?php

namespace App\Handler\Driver;

use App\Entity\Driver;
use Doctrine\ORM\EntityManagerInterface;

class ReadDriverHandler{

    /** @var EntityManagerInterface */
    private $em;

    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }

    public function handle(?string $lastname = null){
        $repository = $this->em->getRepository(Driver::class);

        if ($lastname) {
            $drivers = $repository->findBy(['lastname' => $lastname]);
        } else {
            $drivers = $repository->findAll();
        }

        return $drivers;
    }
}