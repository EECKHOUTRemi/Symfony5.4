<?php

namespace App\Controller\DataTables;

use App\Entity\Cars;
use App\Entity\Driver;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Handler\DataTables\DatatablesCarHandler;
use App\Handler\DataTables\DatatablesDriverHandler;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
* @Route("/datatables", name="datatables_")
* @IsGranted("ROLE_USER")
*/
class DataTablesController extends AbstractController{

    /** @var DatatablesDriverHandler */
    private $datatablesDriverHandler;

    /** @var DatatablesCarHandler */
    private $datatablesCarHandler;

    public function __construct(
        DatatablesDriverHandler $datatablesDriverHandler,
        DatatablesDriverHandler $datatablesCarHandler
    )
    {
        $this->datatablesDriverHandler = $datatablesDriverHandler;
        $this->datatablesCarHandler = $datatablesCarHandler;
    }

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
    * @Route("/bdd/dataDriver", name="bdd_data_driver")
    */
    public function bddDataDriver(EntityManagerInterface $em){

        $dataDriver = $this->datatablesDriverHandler->handle();
        
        return $this->json(['dataDriver' => $dataDriver]);
    }
    
    /**
     * @Route("/bdd/dataCar", name="bdd_data_car")
     */
    public function bddDataCar(EntityManagerInterface $em){
        
        $dataCar = $this->datatablesCarHandler->handle();

        return $this->json(['dataCar' => $dataCar]);
    }
}