<?php

namespace App\Controller;

use App\Entity\Wish;
use App\Form\WishType;
use App\Repository\WishRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/wishes", name="wish_")
 */

class WishController extends AbstractController
{
    /**
     * @Route("/", name="list")
     */
    public function list(WishRepository $wishRepo): Response
    {
        $wishes = $wishRepo->listAll();
        return $this->render('wish/list.html.twig', [
            "wishes" => $wishes
        ]);


    }

    /**
     * @Route("/details/{id}", name="details")
     */
    public function details(int $id, WishRepository $wishRepo): Response
    {
        $wishes = $wishRepo->find($id);

        return $this->render('wish/details.html.twig',[
            'wish' => $wishes
        ]);
    }

/**
 * @Route("/create", name="create")
 */
    public function create(Request $request, EntityManagerInterface $em)
    {
        $wish = new Wish();
        $wish->setDateCreated(new \DateTime());
        $wish->setIsPublished(1);
        $wishCreateForm = $this->createForm(WishType::class, $wish);

        $wishCreateForm->handleRequest($request);

        if ($wishCreateForm->isSubmitted() && $wishCreateForm->isValid())
        {
            $em->persist($wish);
            $em->flush();

            $this->addFlash('success', 'New wish added to Bucket list');
            return $this->redirectToRoute('wish_list', ['id' => $wish->getId()]);
        }

        return $this->render('wish/create.html.twig', [
            'wishForm' => $wishCreateForm->createView()
        ]);
        
    }
}
