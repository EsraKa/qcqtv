<?php


namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ProfileController extends Controller
{
    /**
     * @Route("/profileuser", name="profileUser")
     */
    public function profileAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $categoryRepo = $em->getRepository("AppBundle:Category");
        $categories = $categoryRepo->findAll();

        $productRepo = $em->getRepository("AppBundle:Product");
        $products = $productRepo->findAll();

        return $this->render('Profile/profile.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'categories' => $categories,
            'products' => $products
        ]);
    }

}