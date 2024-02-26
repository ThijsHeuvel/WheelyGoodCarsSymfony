<?php

namespace App\Controller;

use Doctrine\Bundle\DoctrineBundle\DoctrineBundle;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class GrantRoleController extends AbstractController
{
    private ManagerRegistry $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    #[Route('debug/grantadmin', name: 'app_grant_role')]
    public function GrantAdmin(): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        $user->setRoles(['ROLE_ADMIN']);
        $this->doctrine->getManager()->flush();
        return $this->redirectToRoute('car_homepage');
    }
}
