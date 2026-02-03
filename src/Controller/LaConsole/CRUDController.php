<?php

namespace App\Controller\LaConsole;

use dump;
use App\Entity\Driver;
use App\Entity\Cars;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
* @Route("/crud", name="crud_")
*/
class CRUDController extends AbstractController{

    /**
     * @Route("/read/{lastname?}", name="read")
     */
    public function read(EntityManagerInterface $em, ?string $lastname = null): Response
    {
        $repository = $em->getRepository(Driver::class);

        if ($lastname) {
            $drivers = $repository->findBy(['lastname' => $lastname]);
        } else {
            $drivers = $repository->findAll();
        }

        // dd($drivers);

        return $this->render('crud/read.html.twig', [
            'drivers' => $drivers
        ]);
    }

    /**
    * @Route("/createDriver", name="createDriver")
    */
    public function create(EntityManagerInterface $em) {
        $car = new Cars();
        $car->setBrand("Peugeot");
        $car->setModel("208 II");
        $car->setHorsepower(100);
        
        $driver = new Driver();
        $driver->setLastname("BOULONGNE");
        $driver->setFirstname("Alain");
        $driver->setAge(40);
        $driver->setEmail("a.boulongne@amiens-metropole.com");
        $driver->setCar($car);

        $car->setDriver($driver);

        $em->persist($driver);
        $em->flush();

        dd($driver, $car);
    }

    /**
    * @Route("/updateDriversLastname/{driverId}", name="updateDriversLastname")
    */
    public function update(EntityManagerInterface $em, int $driverId) {
        $repo = $em->getRepository(Driver::class);
        $driver = $repo->find($driverId);

        $driver->setLastname("BOULONGNE");
        $em->flush();

        dd($driver, $driverId, $repo);
    }

    /**
    * @Route("/updateDriversCar/{driverId}", name="updateDriversCar")
    */
    public function updateCar(EntityManagerInterface $em, int $driverId) : Response {
        $repo = $em->getRepository(Driver::class);
        $driver = $repo->find($driverId);
        
        $car = new Cars;
        $car->setBrand("Peugeot");
        $car->setModel("107");
        $car->setHorsepower(68);
        $car->setDriver($driver);

        $driver->setCar($car);

        $em->flush();
        
        dd($driver, $car);
    }

    /**
    * @Route("/deleteDriver/{driverId}", name="deleteDriver")
    */
    public function deleteDriver(EntityManagerInterface $em, int $driverId) : Response {
        $repo = $em->getRepository(Driver::class);
        $driver = $repo->find($driverId);
        $em->remove($driver);
        $em->flush();

        dd($driver);
    }

    /**
    * @Route("/deleteCar/{carId}", name="deleteCar")
    */
    public function deleteCar(EntityManagerInterface $em, int $carId) : Response {
        $repo = $em->getRepository(Cars::class);
        $car = $repo->find($carId);
        $em->remove($car);
        $em->flush();

        dd($car);
    }
}