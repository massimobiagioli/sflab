<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Service\ModelService;
use App\Service\QueryData;

/**
 * Base service
 *
 * @author Massimo Biagioli
 */
abstract class BaseService implements ModelService
{

    protected $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public abstract function getRepositoryClass();

    public function count(QueryData $queryData)
    {
        $repository = $this->getRepository();

        return $repository
                        ->createQueryBuilder('m')
                        ->select('count(m.id)')
                        ->getQuery()
                        ->getSingleScalarResult();
    }

    public function query(QueryData $queryData)
    {
        $repository = $this->getRepository();
        $queryBuilder = $repository->createQueryBuilder('m');

        // Filters
        $filters = $queryData->getFilters();
        if (count($filters) > 0)
        {
            $orx = $queryBuilder->expr()->orX();
            foreach ($filters as $filter)
            {
                $orx->add($queryBuilder->expr()->like('m.' . $filter->getName(), ':' . $filter->getName()));
            }
            
            $queryBuilder->andWhere($orx);
            
            foreach ($filters as $filter)
            {
                $queryBuilder->setParameter($filter->getName(), '%' . $filter->getValue() . '%');
            }
        }
        
        // Order Criterions
        foreach ($queryData->getOrderCriterions() as $orderCriterion)
        {
            $queryBuilder->orderBy('m.' . $orderCriterion->getName(), $orderCriterion->getDirection());
        }

        $query = $queryBuilder
                ->setMaxResults($queryData->getLimit())
                ->setFirstResult($queryData->getOffset())
                ->getQuery();

        return $query->getResult();
    }

    private function getRepository()
    {
        return $this->entityManager->getRepository($this->getRepositoryClass());
    }

}
