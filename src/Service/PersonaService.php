<?php

namespace App\Service;

use App\Entity\Persona;
use Doctrine\ORM\EntityManagerInterface;

class PersonaService
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function count()
    {
        $repo = $this->entityManager->getRepository(Persona::class);

        // Count
        $count = $repo->createQueryBuilder('p')
                ->select('count(p.id)')
                ->getQuery()
                ->getSingleScalarResult();

        return $count;
    }

}
