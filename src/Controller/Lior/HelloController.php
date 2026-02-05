<?php

namespace App\Controller\Lior;

use App\Taxes\Calculator;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * IsGranted("ROLE_USER")
 */
class HelloController extends AbstractController{

    protected $calculator;

    public function __construct(Calculator $calculator){
        $this->calculator = $calculator;
    }

    /**
     * @Route("/hello/{name}", name="hello")
     */
    public function hello($name = "World", Calculator $calculator)
    {
        $tva = $calculator->calcul(100);
        var_dump($tva);
        return new Response("Hello $name !");
    }
}