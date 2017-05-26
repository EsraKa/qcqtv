<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


/**
 * Product Controller
 * @Route("/product")
 */
class ProductController extends Controller
{
    /**
     * @Route("/", name="allProduct")
     */
    public function allAction()
    {
        $em = $this->getDoctrine()->getManager();

        $productRepo = $em->getRepository("AppBundle:Product");
        $products = $productRepo->findAll();

        $categoryRepo = $em->getRepository("AppBundle:Category");
        $categories = $categoryRepo->findAll();

        return $this->render('Product/all.html.twig', array(
            'products' => $products,
            'categories' => $categories,
        ));
    }

    /**
     * @Route("/{id}", name="detailItem")
     */
    public function detailAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $productRepo = $em->getRepository("AppBundle:Product");
        $product = $productRepo->find($id);


        $productRepo = $em->getRepository("AppBundle:Product");
        $products = $productRepo->findAll();

        $categoryRepo = $em->getRepository("AppBundle:Category");
        $categories = $categoryRepo->findAll();

        return $this->render('Product/detail.html.twig', array(
            'product' => $product,
            'products'=> $products,
            'categories' => $categories
        ));

    }

}
