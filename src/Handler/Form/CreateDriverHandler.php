<?php

namespace App\Handler\Form;

use App\Entity\Driver;
use Doctrine\ORM\EntityManagerInterface;

class CreateDriverHandler
{
    /** @var EntityManagerInterface */
    private $em;
    
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    
    public function handle(Driver $driver)
    {
        $this->em->persist($driver);
        $this->em->flush();
    }
}