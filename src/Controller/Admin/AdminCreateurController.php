<?php
namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Createur;
use App\Form\CreateurType;
use App\Repository\CreateurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminCreateurController extends AbstractController{
    
    /**
     * @var CreateurRepository
     */
    private $repository;

    /**
     * @var EntityManagerInterface
     */
    private $em;
        

    public function __construct(CreateurRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/admin", name="admin.createur.index")
     * @return Response
     */
    public function index(){
        $createurs = $this->repository->findAll();
        return $this->render('admin/createur/index.html.twig', compact('createurs'));
    }

    /**
     * @Route("/admin/createur/create", name="admin.createur.new")
     * @return Response
     */
    public function new(Request $request){
        $createur = new Createur();
        $form = $this->createForm(CreateurType::class, $createur);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->em->persist($createur);
            $this->em->flush();
            $this->addFlash('success', 'Créateur enregistré avec succés !');
            return $this->redirectToRoute('admin.createur.index');
        }
        return $this->render('admin/createur/new.html.twig', [
            'createur' => $createur,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/createur/{id}", name="admin.createur.edit", methods={"GET","POST"})
     */
    public function edit(Createur $createur, Request $request){
        $form = $this->createForm(CreateurType::class, $createur);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->em->flush();
            $this->addFlash('success', 'Créateur modifié avec succés !');
            return $this->redirectToRoute('admin.createur.index');
        }
        return $this->render('admin/createur/edit.html.twig', [
            'createur' => $createur,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/createur/{id}", name="admin.createur.delete", methods={"DELETE"})
     * @param Request $request
     * @param Createur $createur
     */
    public function delete(Createur $createur, Request $request)
    {
        if($this->isCsrfTokenValid('delete'.$createur->getId(),$request->get('_token'))){
            $this->em->remove($createur);
            $this->em->flush();
            $this->addFlash('success', 'Créateur supprimé avec succés !');
        }
        return $this->redirectToRoute('admin.createur.index');
    }
}