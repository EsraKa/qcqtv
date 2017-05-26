<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $categoryRepo = $em->getRepository("AppBundle:Category");
        $categories = $categoryRepo->findAll();

        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'categories' => $categories
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $categoryRepo = $em->getRepository("AppBundle:Category");
        $categories = $categoryRepo->findAll();

        return $this->render('default/contact.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'categories' => $categories
        ]);
    }

    /**
     * @Route("/transport", name="transport")
     */
    public function transportAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $categoryRepo = $em->getRepository("AppBundle:Category");
        $categories = $categoryRepo->findAll();

        return $this->render('default/transport.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'categories' => $categories
        ]);
    }
}
