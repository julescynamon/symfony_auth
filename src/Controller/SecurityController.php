<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    #[Route('/inscription', name: 'inscription')]
    public function index(): Response
    {
        return $this->render('security/inscription.html.twig', [
            'controller_name' => 'SecurityController',
        ]);
    }
}
