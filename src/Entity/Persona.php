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
    
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function getNominativo()
    {
        return $this->nominativo;
    }

    public function getIndirizzo()
    {
        return $this->indirizzo;
    }

    public function setNominativo($nominativo)
    {
        $this->nominativo = $nominativo;
    }

    public function setIndirizzo($indirizzo)
    {
        $this->indirizzo = $indirizzo;
    }

}
