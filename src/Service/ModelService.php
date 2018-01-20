<?php

namespace App\Service;

use App\Service\QueryData;

/**
 * ModelService Interface
 *
 * @author Massimo Biagioli
 */
interface ModelService
{
    
    public function count(QueryData $queryData);
    
    public function query(QueryData $queryData);
    
//    public function insert();
//    
//    public function update();
//    
//    public function delete();
    
}
