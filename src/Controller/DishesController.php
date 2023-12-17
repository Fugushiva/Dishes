<?php

namespace App\Controller;

use App\Entity\Dishes;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
            "food" => $entity[0],
            'title' => 'Liste des plats dans la DB',
        ]);
    }
}
