<?php

namespace App\Controller;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;//Import annotation "Request"
use Doctrine\Persistence\ManagerRegistry;

class UserController extends AbstractController
{
  #[Route('/user', name: 'app_user')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UserController.php',
        ]);
    }


    #[Route('/user/listes_users', name: 'app_user_listesusers', methods: 'GET')]     // Juste un test 
    public function listesUsers(ManagerRegistry $doctrine)
    {
        $entityManager = $doctrine->getManager();

        $repository = $entityManager->getRepository(User::class); // requete pour lister les users 
        $users= $repository->findAll();
      
       
       
      return $this->render('./users/listes_users.html.twig', [ 'users' => $users ]);
    }




}
