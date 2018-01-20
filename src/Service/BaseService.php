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

        return $repository->createQueryBuilder('m')
                ->select('count(m.id)')
                ->getQuery()
                ->getSingleScalarResult();
    }
    
    public function query(QueryData $queryData)
    {
        $repository = $this->getRepository();
        $queryBuilder = $repository->createQueryBuilder('m');
        
        
        // Filters
//            ->where('p.nominativo LIKE :nominativo')
//            ->setParameter('nominativo', '%adbe%')
        
        
        // Order Criterions
        foreach ($queryData->getOrderCriterions() as $orderCriterion)
        {
            $queryBuilder->orderBy('m.' . $orderCriterion->getName() , $orderCriterion->getDirection());
        }
        
        $query = $queryBuilder->setMaxResults($queryData->getLimit())
            ->setFirstResult($queryData->getOffset())
            ->getQuery();
        
        return $query->getResult();
    }
    
    private function getRepository() {
        return $this->entityManager->getRepository($this->getRepositoryClass());
    }
}
