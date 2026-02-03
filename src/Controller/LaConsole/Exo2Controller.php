<?php

namespace App\Controller\LaConsole;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/exo2", name="exo2_")
 */
class Exo2Controller {

    /**
     * @Route("/page1", name="page1")
     */
    public function page1(){
        return new Response("Page 1");
    }
    
    /**
     * @Route("/page2", name="page2")
     */
    public function page2(){
        return new Response("Page 2");
    }
}