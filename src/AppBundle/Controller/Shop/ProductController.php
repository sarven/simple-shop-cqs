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
     * @Route("/{page}", requirements={"page" = "\d"}, defaults={"page" = 1})
     */
    public function indexAction(int $page): Response
    {
        $pagination = $this->get('knp_paginator')->paginate(
            $this->get('repository.product')->createQueryBuilder('p'),
            $page
        );

        return $this->render('product/index.html.twig', [
            'pagination' => $pagination
        ]);
    }
}