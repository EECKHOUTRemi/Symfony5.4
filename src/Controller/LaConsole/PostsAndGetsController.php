<?php

namespace App\Controller\LaConsole;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("requetes", name="requetes_")
 */
class PostsAndGetsController{

    /**
     * @Route("/post", name="post")
     */
    public function addArticle(Request $request): Response {
        $title = $request->request->get('title');
        $content = $request->request->get('content');

        return new Response("Titre : $title\nContenu : $content");
    }

    /**
     * @Route("/get", name="get")
     */
    public function getArticle(Request $request): Response {
        $tag = $request->query->get("tag");
    
        return new Response("$tag");
    }
}