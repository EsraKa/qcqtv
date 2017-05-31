<?php
/**
 * Created by PhpStorm.
 * User: Esra
 * Date: 29/05/2017
 * Time: 20:51
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Product;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Form\Type\VichImageType;


class AnnonceController extends Controller
{
    /**
     * @Route("add", name="addAnnonce")
     */
    public function addAnnonceAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createFormBuilder(new Product())
            ->add("name")
            ->add("price")
            ->add("imageFile", VichImageType::class)
            ->add("description",  CKEditorType::class)
            ->add("categories")
            ->add("submit", SubmitType::class, array('label' => 'Ajouter'))
            ->getForm();

        $form->handleRequest($request);


        if($form->isSubmitted()) {
            $item = $form->getData();
            $em->persist($item);
            $em->flush();

            return $this->redirectToRoute("homepage");
        }

        $categoryRepo = $em->getRepository("AppBundle:Category");
        $categories = $categoryRepo->findAll();

        return $this->render('Annonce/add.html.twig', array(
            'form' => $form->createView(),
            'categories'=> $categories
        ));

    }

}