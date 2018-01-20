<?php

namespace App\Service;

class Filter
{
    const OPERATOR_LIKE = 'LIKE';
    
    private $name;
    private $value;
    private $operator;
    
    public function getName()
    {
        return $this->name;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getOperator()
    {
        return $this->operator;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function setOperator($operator)
    {
        $this->operator = $operator;
    }

}
