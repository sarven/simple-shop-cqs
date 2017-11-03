<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Form\Product\Type\CreateProductType;
use AppBundle\Product\Command\CreateProductCommand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ProductController
 * @package AppBundle\Controller\Admin
 */
class ProductController extends Controller
{
    /**
     * @param Request $request
     * @return Response|RedirectResponse
     *
     * @Route("/new-product", name="admin.create_product")
     */
    public function createAction(Request $request)
    {
        $createProductCommand = new CreateProductCommand();
        $form = $this->createForm(CreateProductType::class, $createProductCommand);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->get('tactician.commandbus')->handle($createProductCommand);
            return $this->redirectToRoute('shop.product_list');
        }

        return $this->render('product/create.html.twig', [
            'form' => $form->createView()
        ]);
    }
}