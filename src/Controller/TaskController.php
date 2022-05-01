<?php

namespace App\Controller;

use App\Repository\TaskRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TaskController extends AbstractController
{
    #[Route('/user/task', name: 'task')]
    public function viewAll(TaskRepository $repo, Request $request): Response
    {
       $tasks = $repo->findAll();

        return $this->render('task/homeTask.html.twig', [
            "task" => $tasks,
        ]);
    }
}
