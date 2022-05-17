<?php

namespace App\Controller;

use App\Entity\FicheIntervention;
use App\Form\FicheInterventionType;
use App\Repository\FicheInterventionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Expert;


#[Route('/intervention')]
class InterventionController extends AbstractController
{
    #[Route('/', name: 'app_intervention_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $ficheInterventions = $entityManager
            ->getRepository(FicheIntervention::class)
            ->findAll();

        return $this->render('intervention/index.html.twig', [
            'fiche_interventions' => $ficheInterventions,
        ]);
    }

    #[Route('/new', name: 'app_intervention_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $ficheIntervention = new FicheIntervention();
        $form = $this->createForm(FicheInterventionType::class, $ficheIntervention);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $expert = $entityManager
            ->getRepository(Expert::class)
            ->findAll();
            foreach($expert as $ex){
                if($ex==$ficheIntervention->getExpert()){
                    $ex->setNombreHFait($ficheIntervention->getNombreHRealise()+$ex->getNombreHFait());
                    $expert=new Expert();
                    $expert=$ex;
                    $entityManager->persist($expert);
                    break;
                }
            }
            
            $entityManager->persist($ficheIntervention);
            $entityManager->flush();

            return $this->redirectToRoute('app_intervention_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('intervention/new.html.twig', [
            'fiche_intervention' => $ficheIntervention,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_intervention_show', methods: ['GET'])]
    public function show(FicheIntervention $ficheIntervention): Response
    {
        return $this->render('intervention/show.html.twig', [
            'fiche_intervention' => $ficheIntervention,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_intervention_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, FicheIntervention $ficheIntervention, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FicheInterventionType::class, $ficheIntervention);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_intervention_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('intervention/edit.html.twig', [
            'fiche_intervention' => $ficheIntervention,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_intervention_delete', methods: ['POST'])]
    public function delete(Request $request, FicheIntervention $ficheIntervention, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ficheIntervention->getId(), $request->request->get('_token'))) {
            $entityManager->remove($ficheIntervention);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_intervention_index', [], Response::HTTP_SEE_OTHER);
    }
}
