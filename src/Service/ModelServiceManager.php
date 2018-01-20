<?php

namespace App\Service;

use App\Service\PersonaService;
use Doctrine\ORM\EntityManagerInterface;

class ModelServiceManager
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getModelService($modelKey)
    {
        return new PersonaService($this->entityManager);
    }

}
