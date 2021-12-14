<?php

namespace App\Controller;

use App\Entity\Author;
use App\Repository\AuthorRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AuthorController extends AbstractController
{
    /**
     * @Route("/authors", name="author_index")
     */
    public function index(AuthorRepository $athrp): Response
    {
        return $this->render('author/index.html.twig', [
            'auteurs' => $athrp->findAll()
        ]);
    }

    /**
     * @Route("/authors/{id}", name="author_show")
     */
    public function show(Author $author): Response
    {
        return $this->render('author/show.html.twig', [
            'auteur' => $author
        ]);
    }
}
