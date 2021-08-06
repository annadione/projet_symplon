<?php

namespace App\Controller;

use App\Entity\Passager;
use App\Form\PassagerType;
use App\Repository\PassagerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/passager")
 */
class PassagerController extends AbstractController
{
    /**
     * @Route("/", name="passager_index", methods={"GET"})
     */
    public function index(PassagerRepository $passagerRepository): Response
    {
        return $this->render('passager/index.html.twig', [
            'passagers' => $passagerRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="passager_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $passager = new Passager();
        $form = $this->createForm(PassagerType::class, $passager);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($passager);
            $entityManager->flush();

            return $this->redirectToRoute('passager_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('passager/new.html.twig', [
            'passager' => $passager,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="passager_show", methods={"GET"})
     */
    public function show(Passager $passager): Response
    {
        return $this->render('passager/show.html.twig', [
            'passager' => $passager,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="passager_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Passager $passager): Response
    {
        $form = $this->createForm(PassagerType::class, $passager);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('passager_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('passager/edit.html.twig', [
            'passager' => $passager,
            'form' => $form,
        ]);
    }

    /** 
     * @Route("/{id}", name="passager_delete", methods={"POST"})
     */
    public function delete(Request $request, Passager $passager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$passager->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($passager);
            $entityManager->flush();
        }

        return $this->redirectToRoute('passager_index', [], Response::HTTP_SEE_OTHER);
    }
}
