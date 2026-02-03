<?php

namespace App\Controller\LaConsole;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/render", name="render_")
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