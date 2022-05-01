<?php

namespace App\Controller;


use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfileController extends AbstractController
{
    #[Route('/user/profile', name: 'profile')]
    public function index(EntityManagerInterface $user , Security $security ): Response
    {
        $user = $security->getUser();
        return $this->render('profile/index.html.twig', [
            'user' => $user,
        ]);
    }
}
