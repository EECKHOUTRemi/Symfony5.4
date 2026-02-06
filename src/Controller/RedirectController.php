<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class RedirectController extends AbstractController{

    /**
    * @Route("/", name="index")
    */
    public function index(): RedirectResponse{
        return new RedirectResponse('admin');
    }
}