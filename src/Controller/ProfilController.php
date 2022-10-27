<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class ProfilController extends AbstractController
{
    #[Route('/profile', name: 'profile')]
    #[IsGranted('ROLE_USER')]
    public function index(): Response
    {
        // on verifie si l'utilisateur est connecté si non on redirige vers la page de connexion    
        // $this->denyAccessUnlessGranted('ROLE_USER');
        // on recupere l'utilisateur connecté si il est pas connecter il renvoie false on peut donc definir un comportement souhaite avec un if
        // if ($this->isGranted('ROLE_USER')) {
        //     dump('user connecté');
        // } else {
        //     dump('user non connecté');
        // }

        // $user = $security->getUser();

        return $this->render('profil/index.html.twig');
    }
}
