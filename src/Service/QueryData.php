<?php

namespace App\Service;

class QueryData
{
    private $limit;
    private $offset;
    private $filters;
    private $orderCriterions;
    
    public function __construct()
    {
        $this->clearFilters();
        $this->clearOrderCriterions();
    }
    
    public function getLimit()
    {
        return $this->limit;
    }

    public function getOffset()
    {
        return $this->offset;
    }

    public function setLimit($limit)
    {
        $this->limit = $limit;
    }

    public function setOffset($offset)
    {
        $this->offset = $offset;
    }
    
    public function clearFilters()
    {
        $this->filters = [];
    }
    
    public function addFilter($filter)
    {
        $this->filters[] = $filter;
    }
    
    public function getFilters()
    {
        return $this->filters;
    }
    
    public function clearOrderCriterions()
    {
        $this->orderCriterions = [];
    }
    
    public function addOrderCriterion($orderCriterion)
    {
        $this->orderCriterions[] = $orderCriterion;
    }
    
    public function getOrderCriterions()
    {
        return $this->orderCriterions;
    }

}
