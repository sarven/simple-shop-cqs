<?php

namespace AppBundle\Controller\Shop;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ProductController
 * @package AppBundle\Controller\Shop
 */
class ProductController extends Controller
{
    /**
     * @param int $page
     * @return Response
     *
     * @Route("/{page}", requirements={"page" = "\d"}, defaults={"page" = 1}, name="shop.product_list")
     */
    public function indexAction(int $page): Response
    {
        return $this->render('product/index.html.twig', [
            'pagination' => $this->get('query.doctrine_products')->getPaginated($page, 10)
        ]);
    }
}