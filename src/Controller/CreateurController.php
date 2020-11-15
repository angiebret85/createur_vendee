<?php

namespace App\Controller;

use App\Repository\CreateurRepository;
use App\Entity\Createur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateurController extends AbstractController
{
    /**
     * @var CreateurRepository
     */
    private $repository;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct (CreateurRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/createurs", name="createur.index")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('createur/index.html.twig', [
            'current_menu' => 'createurs'
        ]);
    }

    /**
     * @Route("/createurs/{slug}-{id}", name="createur.show", requirements={"slug": "[a-z0-9\-]*"})
     * @param Createur $createur
     * @return Response
     */
    public function show(Createur $createur, string $slug): Response
    {
        if ($createur->getSlug() !== $slug)
        {
            return $this->redirectToRoute('createur.show',[
                'id'=>$createur->getId(),
                'slug'=>$createur->getSlug()
            ], 301);
        }
        return $this->render('createur/show.html.twig', [
            'createur' => $createur,
            'current_menu' => 'createurs'
        ]);
    }
}
