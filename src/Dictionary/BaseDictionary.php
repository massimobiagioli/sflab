<?php

namespace App\Dictionary;

use App\Service\OrderCriterion;
use App\Dictionary\ModelDictionary;

abstract class BaseDictionary implements ModelDictionary
{
    public abstract function getDataTableFields();
    
    public function dataTableToOrderCriterion($dataTableOrder) {
        $orderCriterion = new OrderCriterion();
        $dataTableFields = $this->getDataTableFields();
        $orderCriterion->setName($dataTableFields[$dataTableOrder[0]['column']]);
        $orderCriterion->setDirection($dataTableOrder[0]['dir']);
        
        return $orderCriterion;
    }
}
