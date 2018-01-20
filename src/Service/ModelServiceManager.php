<?php

namespace App\Service;

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
        try
        {
            $clazz = 'App\\Service\\' . ucwords($modelKey) . 'Service';
            return new $clazz($this->entityManager);
        } catch (Exception $ex)
        {
            return false;
        }
    }

}
