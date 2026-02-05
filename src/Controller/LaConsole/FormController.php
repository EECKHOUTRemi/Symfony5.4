<?php

namespace App\Controller\LaConsole;

use dump;
use App\Form\CarType;
use App\Entity\Driver;
use App\Form\DriverType;
use Doctrine\ORM\EntityManagerInterface;
use App\Handler\Form\CreateDriverHandler;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
* @Route("/form", name="form_")
* @IsGranted("ROLE_ADMIN")
*/
class FormController extends AbstractController{

    /** @var CreateDriverHandler */
    private $createDriverHandler;

    public function __construct(
        CreateDriverHandler $createDriverHandler
    ){
        $this->createDriverHandler = $createDriverHandler;
    }
    
    /**
     * @Route("/createDriver", name="createDriver")
     */
    public function createDriver(EntityManagerInterface $em, Request $request) : Response{
        $driver = new Driver();
        $form = $this->createForm(DriverType::class, $driver);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $this->createDriverHandler->handle($driver);
            return $this->redirectToRoute('crud_read');
        }
        
        return $this->render('forms/createDriver.html.twig', [
            'form' => $form->createView()
        ]);
    }
    
        /**
     * @Route("/updateDriversCar/{driverId}", name="updateDriversCar")
     */
    public function updateDriver(Request $request, int $driverId) {
        $driver = $handler->getDriver($driverId);
        $car = $driver->getCar();
        
        $form = $this->createForm(CarType::class, $car);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $handler->handle($car);
            return $this->redirectToRoute('crud_read');
        }
        
        return $this->render('forms/updateDriversCar.html.twig', [
            'form' => $form->createView()
        ]);
    }

}
