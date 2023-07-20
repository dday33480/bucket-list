<?php

namespace App\Controller;

use App\Repository\WishRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class WishController extends AbstractController
{
    /**
     * @Route("/list", name="wish_list")
     */
    public function list(WishRepository $wishRepo): Response
    {
        $wishes = $wishRepo->listAll();
        return $this->render('wish/list.html.twig', [
            "wishes" => $wishes
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
