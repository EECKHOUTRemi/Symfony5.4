<?php

namespace App\Controller\LaConsole;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @IsGranted("ROLE_USER")
 */
class RedirectionsController extends AbstractController{

    /**
     * @Route("/redirection", name="redirection_index")
     */
    public function redirection_index(): Response{
        return $this->render("redirection/redirection.html.twig", [
            'redirect_url' => $this->generateUrl('twig_index'),
            'delay' => 3
        ]);
    }
}