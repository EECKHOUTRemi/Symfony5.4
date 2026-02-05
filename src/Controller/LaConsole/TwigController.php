<?php

namespace App\Controller\LaConsole;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/twig", name="twig_")
 * @IsGranted("ROLE_USER")
 */
class TwigController extends AbstractController {

    /**
     * @Route("/", name="index")
     */
    public function index() : Response{
        return $this->render('index.html.twig');
    }

    /**
     * @Route("/path", name="path")
     */
    public function path() : Response{
        return $this->render('paths/path.html.twig');
    }

    /**
     * @Route("/heritage", name="heritage")
     */
    public function heritage() : Response {
        return $this->render('heritage/enfant.html.twig');
    }

    /**
    * @Route("/loop", name="loop")
    */
    public function loop() : Response {
        return $this->render('algo/loop.html.twig');
    }
}