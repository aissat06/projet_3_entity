<?php

namespace App\Controller;

use App\Entity\Agences;
use App\Entity\Villes;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AgenceController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/agence", name="agence")
     */
    public function index(): Response
    {
        $agence = new Agences();
        $ville = new Villes();
        $ville->setNom('Nancy');
        $ville->setCodePostal('54000');
        $id = $ville->getId();
        //$ville->setAgence();

        $agence->setName('MAAF Assurance');
        $agence->setAdress('Nancy 54000, France');
        $agence->setDate(new \DateTime('25-08-2021'));
        $agence->setVille($ville);

        //$this->entityManager->persist($ville);
        //$this->entityManager->persist($agence);
        //$this->entityManager->flush();

        //$agences = $this->entityManager->getRepository(Agences::class)->findAll();
        //$villes = $this->entityManager->getRepository(Villes::class)->findAll();

        return $this->render('agence/index.html.twig', [
            'villes' => $villes,
            'agences' => $agences,
        ]);
    }

    /**
     * @Route("/agence", name="agence")
     */
    public function listAgences(): Response
    {
        
        $agences = $this->entityManager->getRepository(Agences::class)->findAll();
        
        return $this->render('agence/index.html.twig', [
            'agences' => $agences, 
        ]);
    }
}
