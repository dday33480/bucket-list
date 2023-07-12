<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WishController extends AbstractController
{
    /**
     * @Route("/list", name="wish_list")
     */
    public function list(): Response
    {
        return $this->render('wish/list.html.twig', [
            
        ]);
    }

    /**
     *  @Route("/details", name="list_details")
     */
    public function details(int $id): Response
    {
        return $this->render('wish/details.html.twig',[
            
        ]);
    }
}
