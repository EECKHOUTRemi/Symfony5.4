<?php

namespace App\Controller\LaConsole;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/render", name="render_")
 * @IsGranted("ROLE_USER")
 */
class RenderController extends AbstractController {

    /**
     * @Route("/", name="index")
     */
    public function index() : Response{
        return $this->render('render/exemple.html.twig');
    }

    /**
     * @Route("/{slug}", name="slug")
     */
    public function slug(string $slug) : Response{
        return $this->render('render/slug.html.twig', ['slug' => $slug]);
    }
}