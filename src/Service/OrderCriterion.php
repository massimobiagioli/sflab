<?php

namespace App\Service;

class OrderCriterion
{
    private $name;
    private $direction;
    
    public function getName()
    {
        return $this->name;
    }

    public function getDirection()
    {
        return $this->direction;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setDirection($direction)
    {
        $this->direction = $direction;
    }

}
