<?php

namespace App\Controller\LaConsole;

use dump;
use App\Form\CarType;
use App\Entity\Driver;
use App\Form\DriverType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
* @Route("/admin", name="form_")
*/
class FormController extends AbstractController{
    
    /**
     * @Route("/createDriver", name="createDriver")
     */
    public function createDriver(EntityManagerInterface $em, Request $request) : Response{
        $driver = new Driver();
        $driver->setCar(null);
        
        $form = $this->createForm(DriverType::class, $driver);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em->persist($driver);
            $em->flush();
        }
        
        return $this->render('forms/createDriver.html.twig', [ 'form' => $form->createView() ]);
    }
    
    /**
     * @Route("/updateDriversCar/{driverId}", name="updateDriversCar")
     */
    public function updateDriver($driverId, EntityManagerInterface $em, Request $request) {
        $driverRepo = $em->getRepository(Driver::class);
        $driver = $driverRepo->find($driverId);
        $car = $driver->getCar();
        
        $form = $this->createForm(CarType::class, $car);
        $form->handleRequest($request);        
        
        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
        }
        
        return $this->render('forms/updateDriversCar.html.twig', [ 'form' => $form->createView() ]);
    }

}
