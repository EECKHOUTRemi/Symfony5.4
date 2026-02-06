<?php

namespace App\Controller\DataTables;

use App\Entity\Driver;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
* @Route("/datatables", name="datatables_")
* @IsGranted("ROLE_USER")
*/
class DataTablesController extends AbstractController{

    /**
    * @Route("/array", name="array")
    */
    public function array(){
        return $this->render("datatables/training/array.html.twig");
    }
    
    /**
     * @Route("/object", name="object")
     */
    public function object(){
        return $this->render("datatables/training/object.html.twig");
    }
    
    /**
     * @Route("/instance", name="instance")
     */
    public function instance(){
        return $this->render("datatables/training/instance.html.twig");
    }
    
    /**
    * @Route("/bdd", name="bdd")
    */
    public function bdd(){
        return $this->render("datatables/bdd/bdd.html.twig");
    }
    
    /**
    * @Route("/bdd/data", name="bdd_data")
    */
    public function bddData(EntityManagerInterface $em){

        $drivers = $em->getRepository(Driver::class)->findAll();
        $data = [];

        foreach($drivers as $driver){
            $car = $driver->getCar();

            array_push(
                $data,
                [
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
        
        return $this->json(['data' => $data]);
    }
}