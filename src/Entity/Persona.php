<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonaRepository")
 */
class Persona
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $nominativo;
    
    /**
     * @ORM\Column(type="string")
     */
    private $indirizzo;
    
    function getNominativo()
    {
        return $this->nominativo;
    }

    function getIndirizzo()
    {
        return $this->indirizzo;
    }

    function setNominativo($nominativo)
    {
        $this->nominativo = $nominativo;
    }

    function setIndirizzo($indirizzo)
    {
        $this->indirizzo = $indirizzo;
    }

}
