<?php

namespace App\Controller\LaConsole;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RedirectionsController extends AbstractController{

    /**
     * @Route("/redirection", name="redirection_index")
     */
    public function reduirection_index() : RedirectResponse {
        return $this->redirectToRoute('test_index');
    }
}