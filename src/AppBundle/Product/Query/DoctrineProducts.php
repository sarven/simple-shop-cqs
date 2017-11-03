<?php

namespace AppBundle\Product\Query;

use AppBundle\Repository\Product\ProductRepository;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

/**
 * Class DoctrineProducts
 * @package AppBundle\Product\Query
 */
final class DoctrineProducts implements ProductQueryInterface
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * @var PaginatorInterface
     */
    private $paginator;

    /**
     * DoctrineProducts constructor.
     * @param ProductRepository $productRepository
     * @param PaginatorInterface $paginator
     */
    public function __construct(
        ProductRepository $productRepository,
        PaginatorInterface $paginator
    )
    {
        $this->productRepository = $productRepository;
        $this->paginator = $paginator;
    }

    /**
     * @param int $page
     * @param int $limit
     * @return PaginationInterface
     */
    public function getPaginated(int $page, int $limit = 10): PaginationInterface
    {
        $queryBuilder = $this->productRepository->createQueryBuilder('p');
        $queryBuilder = $this->productRepository->sortBy($queryBuilder, 'p.createdAt', 'DESC');

        return $this->paginator->paginate($queryBuilder, $page, $limit);
    }
}