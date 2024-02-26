<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CarController extends AbstractController
{
//    #[Route('/car', name: 'app_car')]
//    public function index(): Response
//    {
//        return $this->render('car/index.html.twig', [
//            'controller_name' => 'CarController',
//        ]);
//    }

    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }


    #[Route('/', name: 'car_homepage')]
    public function homepage(): Response
    {
        if ($this->security->getUser()) {
            $username = $this->security->getUser()->getUsername();
        } else {
            $username = null;
        }
        return $this->render('car/homepage.html.twig', [
            'username' => $username,
        ]);
    }
}
