<?php

namespace App\Controller\LaConsole;

use dump;
use App\Entity\Cars;
use App\Entity\Driver;
use App\Handler\Car\DeleteCarHandler;
use Doctrine\ORM\EntityManagerInterface;
use App\Handler\Driver\ReadDriverHandler;
use App\Handler\Driver\CreateDriverHandler;
use App\Handler\Driver\DeleteDriverHandler;
use Symfony\Component\HttpFoundation\Response;
use App\Handler\Driver\UpdateDriversCarHandler;
use Symfony\Component\Routing\Annotation\Route;
use App\Handler\Driver\UpdateDriversLastnameHandler;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
* @Route("/crud", name="crud_")
*/
class CRUDController extends AbstractController{

    /** @var ReadDriverHandler */
    private $readDriverHandler;

    /** @var CreateDriverHandler */
    private $createDriverHandler;

    /** @var UpdateDriversLastnameHandler */
    private $updateDriversLastnameHandler;
    
    /** @var UpdateDriversCarHandler */
    private $updateDriversCarHandler;
    
    /** @var DeleteDriverHandler */
    private $deleteDriverHandler;

    /** @var DeleteCarHandler */
    private $deleteCarHandler;

    public function __construct(
        ReadDriverHandler $readDriverHandler, 
        CreateDriverHandler $createDriverHandler, 
        UpdateDriversLastnameHandler $updateDriversLastnameHandler,
        UpdateDriversCarHandler $updateDriversCarHandler,
        DeleteDriverHandler $deleteDriverHandler,
        DeleteCarHandler $deleteCarHandler
    ){
        $this->readDriverHandler = $readDriverHandler;
        $this->createDriverHandler = $createDriverHandler;
        $this->updateDriversLastnameHandler = $updateDriversLastnameHandler;
        $this->updateDriversCarHandler = $updateDriversCarHandler;
        $this->deleteDriverHandler = $deleteDriverHandler;
        $this->deleteCarHandler = $deleteCarHandler;
    }

    /**
     * @Route("/read/{lastname?}", name="read")
     * @IsGranted("ROLE_USER")
     */
    public function read(?string $lastname = null): Response{
        $drivers = $this->readDriverHandler->handle($lastname ?? null);

        return $this->render('crud/read.html.twig', [
            'drivers' => $drivers
        ]);
    }

    /**
    * @Route("/createDriver", name="createDriver")
    * @IsGranted("ROLE_ADMIN")
    */
    public function create() {
        $result = $this->createDriverHandler->handle("Peugeot", "208 II", 100, "BOULONGNE", "Alain", 40, "a.boulongne@amiens-metropole.com");
        
        $driver = $result[0];
        $car = $result[1];

        return $this->redirectToRoute('datatables_bdd');
    }

    /**
    * @Route("/updateDriversLastname/{driverId}", name="updateDriversLastname")
    * @IsGranted("ROLE_ADMIN")
    */
    public function update(int $driverId) {
        $driver = $this->updateDriversLastname->handle($driverId);

        return $this->redirectToRoute('datatables_bdd');
    }

    /**
    * @Route("/updateDriversCar/{driverId}", name="updateDriversCar")
    * @IsGranted("ROLE_ADMIN")
    */
    public function updateCar(int $driverId) : Response {
        $result = $this->updateDriversCarHandler->handle("Peugeot", "107", 68, $driverId);
        
        $driver = $result[0];
        $car = $result[1];

        return $this->redirectToRoute('datatables_bdd');
    }

    /**
    * @Route("/deleteDriver/{driverId}", name="deleteDriver")
    * @IsGranted("ROLE_ADMIN")
    */
    public function deleteDriver(int $driverId) : Response {
        $driver = $this->DeleteDriverHandler->handle($driverId);

        return $this->redirectToRoute('datatables_bdd');
    }

    /**
    * @Route("/deleteCar/{carId}", name="deleteCar")
    * @IsGranted("ROLE_ADMIN")
    */
    public function deleteCar(int $carId) : Response {
        $car = $this->deleteCarHandler->handle($carId);

        return $this->redirectToRoute('datatables_bdd');
    }
}