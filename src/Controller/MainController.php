<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class MainController extends AbstractController
{
    /**
     * @Route("/home", name="main_home")
     */
    public function home()
    {
        return $this->render("main/home.html.twig");
    }

    /**
     * @Route("/about-us", name="about_us")
     */
    public function aboutUs(Request $request, SerializerInterface $serializer) 
    {
        $jsonData = file_get_contents('../team.json');
        
        $members = json_decode($jsonData, true);

        return $this->render('main/aboutUs.html.twig',[
            'teamMembers' => $members
        ]);
    }
}
