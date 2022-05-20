<?php

namespace App\Controller;

use App\Entity\Contrat;
use App\Entity\Notification;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
<<<<<<< HEAD
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
=======
use App\Controller\NavbarController;



class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user=$this->getUser();
        $contrat= $entityManager
        ->getRepository(Contrat::class)
        ->findAll();
        
        foreach($contrat as $c){
            if($c->getEnd()<new \DateTime('now')&&!$c->isAddToNotification()){
                $notification=new Notification();
                $notification->setMessage('le contrat num '.$c->getNumContrat().' est fini');
                $notification->setDateNotification(new \DateTime('now'));
                $notification->setReaded(0);
                $c->setAddToNotification(true);
                $entityManager->persist($c);
                $entityManager->persist($notification);
                foreach($users as $user){
                    $user->setUnreadNotification($user->getUnreadNotification()+1);
                    $entityManager->persist($user);
                }
                $entityManager->flush();
            }    
        }
        
        $notification= $entityManager
            ->getRepository(Notification::class)
            //->leftJoin('id')
            //->join('Id','WITH','notification_id')
            ->findBy(
                ['readed'=>0,
                //'user'=>$user
                ]
                //[]
            );
        
        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
            'notifications' => $notification,
            
>>>>>>> a6841854b257afd9aa5628e68e041d8907e7e9f3
        ]);
    }
    
}
