<?php

namespace AppBundle\Repository\Product;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * Class ProductRepository
 * @package AppBundle\Repository\Product
 */
class ProductRepository extends EntityRepository
{
    /**
     * @param QueryBuilder $queryBuilder
     * @param string $sort
     * @param string $order
     * @return QueryBuilder
     */
    public function sortBy(QueryBuilder $queryBuilder, string $sort, string $order): QueryBuilder
    {
        return $queryBuilder->orderBy($sort, $order);
    }
}