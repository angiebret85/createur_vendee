<?php

namespace App\Controller;

use App\Repository\CreateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GeolocalisationController extends AbstractController
{
    /**
     * @Route("/createurs/geolocalisation", name="createur.geolocalisation")
     * @param CreateurRepository $repository
     */
    public function index(CreateurRepository $repository): Response
    {
        $createurs = $repository->findLatest();
        return $this->render('createur/geolocalisation.html.twig', [
            'createurs' => $createurs
        ]);
    }
}
