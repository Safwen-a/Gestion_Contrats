<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Projet;
use App\Entity\Client;
use App\Entity\FicheIntervention;
use App\Entity\Contrat;
class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(EntityManagerInterface $entityManager): Response
    {
                $users = $entityManager
            ->getRepository(User::class)
            ->findAll();
        // Calcul total projets 
        $projet = $entityManager
            ->getRepository(projet::class)
            ->findall();
        // Calcul total des Clients 
        $clients = $entityManager
            ->getRepository(Client::class)
            ->findAll();
        //Calcul total Intervention Par Expert Par An :
        $ficheInterventions = $entityManager
            ->getRepository(FicheIntervention::class)
            ->findAll();
        //nombre d'heure restant du totale (expertJours ) Par Contrat
        $contrats = $entityManager
            ->getRepository(Contrat::class)
            ->findAll();

        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController','projet'=>Count($projet),'client'=>Count($clients),'contrats'=>$contrats
        ]);
    }
    
}
