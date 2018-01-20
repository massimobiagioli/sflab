<?php

namespace App\Dictionary;

interface ModelDictionary
{

    public function orderCriterionFromDataTable($dataTableOrder);
    
    public function filtersFromDataTable($dataTableSearch);

    public function adaptDataTableResult($results, &$dataTableResult);
}
