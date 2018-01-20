<?php

namespace App\Dictionary;

use App\Service\Filter;
use App\Service\OrderCriterion;
use App\Dictionary\ModelDictionary;

abstract class BaseDictionary implements ModelDictionary
{
    
    public function orderCriterionFromDataTable($dataTableOrder) {
        $orderCriterion = new OrderCriterion();
        $dataTableFields = $this->getDataTableFields();
        $orderCriterion->setName($dataTableFields[$dataTableOrder[0]['column']]);
        $orderCriterion->setDirection($dataTableOrder[0]['dir']);
        
        return $orderCriterion;
    }
    
    public function filtersFromDataTable($dataTableSearch)
    {
        $filters = [];
        $searchString = $dataTableSearch['value'];
        if (!$searchString) {
            return $filters;
        }
            
        foreach ($this->getDataTableFields() as $field)
        {
            $filter = new Filter();
            $filter->setName($field);
            $filter->setOperator(Filter::OPERATOR_LIKE);
            $filter->setValue($searchString);
            $filters[] = $filter;
        }
        
        return $filters;
    }
    
    public function adaptDataTableResult($results, &$dataTableResult)
    {
        foreach ($results as $model)
        {
            $dataTableResult['data'][] = $this->adaptDataTableResultRow($model);
        }
    }
    
    protected abstract function getDataTableFields();
    
    protected abstract function adaptDataTableResultRow($model);
}
