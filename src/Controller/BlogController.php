<?php

namespace App\Controller;

use App\Entity\Blog;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    #[Route('/blog', name: 'blog')]
    public function index(): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    #[Route('/blog/edit/{id}', name: 'blog_edit')]
    #[IsGranted('ROLE_USER')]
    public function edit(Blog $blog): Response
    {

        $this->denyAccessUnlessGranted('BLOG_EDIT', $blog);

        // $user = $this->getUser();

        // if ($blog->getAuthor() === $user) {
        //     dump('You can edit this blog');
        // } else {
        //     dump('You can not edit this blog');
        // }

        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    #[Route('/test', name: 'test')]
    public function test(EntityManagerInterface $em, UserRepository $userRepository): Response
    {
        $blog = new Blog();
        $blog->setContent('test');
        $blog->setAuthor($userRepository->find(1));
        $em->persist($blog);
        $em->flush();


        return $this->redirectToRoute('home');
    }
}
