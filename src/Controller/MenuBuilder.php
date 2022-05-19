<?php
// src/Menu/MenuBuilder.php
// ...
namespace App\Controller;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Notification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Twig\Environment;



class MenuBuilder
{
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function createMainMenu(EntityManagerInterface $entityManager)
    {
        // $notification= $entityManager
        // ->getRepository(Notification::class)
        // ->findBy([
        //     'readed'=>0,
        //     'User'=>$this->getUser(),
        // ]);
        $menu = $this->factory->createItem('');

    
        // foreach ($notification as $notif) {
        //     $menu->addChild($notif->getMessage(), [
        //         'route' => ''
        //     ]);
    // }

    $htmlContents = $this->twig->render('product/index.html.twig', [
        'category' => '...',
        'promotions' => ['...', '...'],
    ]);





        
        
        // ... add more children

       
    }

}