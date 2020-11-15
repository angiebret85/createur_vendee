<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateurController extends AbstractController
{
    /**
     * @Route("/createurs", name="createur.index")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('createur/index.html.twig', [
            'controller_name' => 'CreateurController',
        ]);
    }
}
