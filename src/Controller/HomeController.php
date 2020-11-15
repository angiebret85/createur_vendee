<?php

namespace App\Controller;

use App\Repository\CreateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param CreateurRepository $repository
     */
    public function index(CreateurRepository $repository): Response
    {
        $createurs = $repository->findLatest();
        return $this->render('pages/home.html.twig', [
            'createurs' => $createurs
        ]);
    }
}
