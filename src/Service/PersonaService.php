<?php

namespace App\Service;

use App\Service\BaseService;
use App\Service\ModelService;
use App\Entity\Persona;

class PersonaService extends BaseService implements ModelService
{
    public function getRepositoryClass()
    {
        return Persona::class;
    }

}
