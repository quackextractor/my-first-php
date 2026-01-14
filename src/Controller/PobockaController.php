<?php

namespace App\Controller;

use App\Entity\Pobocka;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PobockaController extends AbstractController
{
    #[Route('/pobocka/create', name: 'create_pobocka')]
    public function createPobocka(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $pobocka = new Pobocka();
        $pobocka->setUlice('Ječná');
        $pobocka->setCisloPopisne('30');
        $pobocka->setMesto('Praha');
        $pobocka->setKodZeme('CZ');
        $pobocka->setJmenoVedouciho('Karel Vomáčka');

        // tell Doctrine you want to (eventually) save the Pobocka (no queries yet)
        $entityManager->persist($pobocka);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new pobocka with id ' . $pobocka->getIdPobocka());
    }
}
