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



class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $contrat= $entityManager
        ->getRepository(Contrat::class)
        ->findAll();
        $users= $entityManager
        ->getRepository(User::class)
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
            $notification= $entityManager
            ->getRepository(Notification::class)
            ->findAll();
            
        }
        
        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
            'notifications' => $notification
        ]);
    }
}
