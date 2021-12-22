<?php

namespace App\Controller\Communication;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/communication')]
class CommunicationController extends AbstractController
{

    #[Route(path: '/instagramembed', name: 'communication.instagramembed')]
    public function instagramEmbed(): Response
    {
        return $this->render('communication/instaembed.html.twig', [
            'current_page' => ['communication', 'communication_instagramembed']
        ]);
    }

    #[Route(path: '/aloaembed', name: 'communication.aloaembed')]
    public function aloaEmbed(): Response
    {
        return $this->render('communication/aloaembed.html.twig', [
           'current_page' => ['widgets', 'widgets_aloaembed']
        ]);
    }

}