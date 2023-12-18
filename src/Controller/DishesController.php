<?php

namespace App\Controller;

use App\Entity\Dishes;
use App\Form\DishesType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DishesController extends AbstractController
{
    #[Route('/dishes', name: 'app_dishes')]
    public function index(EntityManagerInterface $em): Response
    {

        $repository = $em->getRepository(Dishes::class);
        $entity = $repository->findAll();







        return $this->render('dishes/index.html.twig', [
            "foods" => $entity,
            'title' => 'Liste des plats dans la DB',
        ]);
    }

    #[Route('/dishes/new', name: 'app_dishes_new')]
    public function new(EntityManagerInterface $em, Request $request): Response
    {
        $dishe = new Dishes();

        $form = $this->createForm(DishesType::class, $dishe);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $dishes = $form->getData();

            $em->persist($dishe);

            $em->flush();

            if ($dishes->getId()) {
                return $this->redirectToRoute('app_dishes');
            }
        }


        return $this->render('dishes/new.html.twig', [
            'title' => "Ajouter un plat",
            'form' => $form
        ]);
    }
}
