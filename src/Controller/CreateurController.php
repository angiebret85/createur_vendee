<?php

namespace App\Controller;

use App\Repository\CreateurRepository;
use App\Entity\Createur;
use App\Entity\CreateurSearch;
use App\Form\CreateurSearchType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @var PaginatorInterface
     */
    private $paginator;


    public function __construct (CreateurRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/createurs", name="createur.index")
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    public function index(Request $request, PaginatorInterface $paginator): Response
    {
        $search = new CreateurSearch();
        $form = $this->createForm(CreateurSearchType::class, $search);
        $form->handleRequest($request);
        $createurs = $paginator->paginate($this->repository->findAllQuery($search),
        $request->query->getInt('page',1),30);
        return $this->render('createur/index.html.twig', [
            'current_menu' => 'createurs',
            'createurs' => $createurs,
            'form' => $form->createView()
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
