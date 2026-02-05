<?php

namespace App\Controller\DataTables;

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
        return $this->render("datatables/array.html.twig");
    }
    
    /**
     * @Route("/object", name="object")
     */
    public function object(){
        return $this->render("datatables/object.html.twig");
    }
    
    /**
     * @Route("/instance", name="instance")
     */
    public function instance(){
        return $this->render("datatables/instance.html.twig");
    }
    
    /**
    * @Route("/bdd", name="bdd")
    */
    public function bdd(){
        return $this->render("datatables/bdd.html.twig");
    }
    
    /**
    * @Route("/bdd/data", name="bdd_data")
    */
    public function bddData(){
        // TODO : appeler readDriverHandler, utiliser AJAX pour l'envoyer dans jd/datatables/bdd/datatablesBdd.js, envoyer les données dans bdd.html.twig
    }
}