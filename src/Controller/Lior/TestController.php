<?php

namespace App\Controller\Lior;

use App\Taxes\Calculator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
* @Route("/test", name="test_")
*/  
class TestController extends AbstractController{

    protected $calculator;

    public function __construct(Calculator $calculator){
        $this->calculator = $calculator;
    }

    /**
     * @Route("/", name="index")
     */
    public function index() 
    {
        $tva = $this->calculator->calcul(100);
        return new Response($tva);
    }

    /**
     * @Route("/{age}", name="age", requirements={"age"="\d+"})
     */
    public function test(Request $request, int $age = 0)
    {
        return new Response("Vous avez $age ans.");
    }
}