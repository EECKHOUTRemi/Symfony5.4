<?php

namespace App\Controller\LaConsole;

use dump;
use App\Entity\Cars;
use App\Entity\Driver;
use Doctrine\ORM\EntityManagerInterface;
use App\Handler\Driver\ReadDriverHandler;
use App\Handler\Driver\CreateDriverHandler;
use App\Handler\Driver\UpdateDriversLastnameHandler;
use App\Handler\Driver\UpdateDriversCarHandler;
use App\Handler\Driver\DeleteDriverHandler;
use App\Handler\Car\DeleteCarHandler;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
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
     */
    public function read(?string $lastname = null): Response{
        $drivers = $this->readDriverHandler->handle($lastname ?? null);

        return $this->render('crud/read.html.twig', [
            'drivers' => $drivers
        ]);
    }

    /**
    * @Route("/createDriver", name="createDriver")
    */
    public function create() {
        $result = $this->createDriverHandler->handle("Peugeot", "208 II", 100, "BOULONGNE", "Alain", 40, "a.boulongne@amiens-metropole.com");
        
        $driver = $result[0];
        $car = $result[1];

        dd($driver, $car);
    }

    /**
    * @Route("/updateDriversLastname/{driverId}", name="updateDriversLastname")
    */
    public function update(int $driverId) {
        $driver = $this->updateDriversLastname->handle($driverId);

        dd($driver);
    }

    /**
    * @Route("/updateDriversCar/{driverId}", name="updateDriversCar")
    */
    public function updateCar(int $driverId) : Response {
        $result = $this->updateDriversCarHandler->handle("Peugeot", "107", 68, $driverId);
        
        $driver = $result[0];
        $car = $result[1];

        dd($driver, $car);
    }

    /**
    * @Route("/deleteDriver/{driverId}", name="deleteDriver")
    */
    public function deleteDriver(int $driverId) : Response {
        $driver = $this->DeleteDriverHandler->handle($driverId);

        dd($driver);
    }

    /**
    * @Route("/deleteCar/{carId}", name="deleteCar")
    */
    public function deleteCar(int $carId) : Response {
        $car = $this->deleteCarHandler->handle($carId);

        dd($car);
    }
}