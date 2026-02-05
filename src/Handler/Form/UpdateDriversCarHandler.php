<?php

namespace App\Handler\Form;

use App\Entity\Driver;
use App\Entity\Cars;
use Doctrine\ORM\EntityManagerInterface;

class UpdateDriversCarHandler
{
    /** @var EntityManagerInterface */
    private $em;
    
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    
    public function getDriver(int $driverId): ?Driver
    {
        return $this->em->getRepository(Driver::class)->find($driverId);
    }
    
    public function handle(Cars $car): void
    {
        $this->em->flush();
    }
}