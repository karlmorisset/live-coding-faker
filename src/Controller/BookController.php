<?php

namespace App\Controller;

use App\Repository\BookRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BookController extends AbstractController
{
    /**
     * @Route("/books", name="book")
     */
    public function index(BookRepository $bkrp): Response
    {
        return $this->render('book/index.html.twig', [
            'books' => $bkrp->findAll(),
        ]);
    }
}
