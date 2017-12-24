<?php

namespace comercial\ComercialBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use comercial\ComercialBundle\Entity\Comprador;
use comercial\ComercialBundle\Form\CompradorType;

/**
 * Comprador controller.
 *
 * @Route("/comprador")
 */
class CompradorController extends Controller
{
    /**
     * Lists all Comprador entities.
     *
     * @Route("/", name="comprador_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $compradors = $em->getRepository('ComercialBundle:Comprador')->findAll();

        return $this->render('comprador/index.html.twig', array(
            'compradors' => $compradors,
        ));
    }

    /**
     * Creates a new Comprador entity.
     *
     * @Route("/new", name="comprador_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $comprador = new Comprador();
        $form = $this->createForm('comercial\ComercialBundle\Form\CompradorType', $comprador);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comprador);
            $em->flush();

            if ($request->get('GuardaCrear') !== null)
            {
                return $this->redirectToRoute('comprador_new');
            }
            return $this->redirectToRoute('comprador_index');

        }

        return $this->render('comprador/new.html.twig', array(
            'comprador' => $comprador,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Comprador entity.
     *
     * @Route("/{id}", name="comprador_show")
     * @Method("GET")
     */
    public function showAction(Comprador $comprador)
    {
        $deleteForm = $this->createDeleteForm($comprador);

        return $this->render('comprador/show.html.twig', array(
            'comprador' => $comprador,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Comprador entity.
     *
     * @Route("/{id}/edit", name="comprador_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Comprador $comprador)
    {
        $deleteForm = $this->createDeleteForm($comprador);
        $editForm = $this->createForm('comercial\ComercialBundle\Form\CompradorType', $comprador);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comprador);
            $em->flush();

            return $this->redirectToRoute('comprador_edit', array('id' => $comprador->getId()));
        }

        return $this->render('comprador/edit.html.twig', array(
            'comprador' => $comprador,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Comprador entity.
     *
     * @Route("/{id}", name="comprador_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Comprador $comprador)
    {
        $form = $this->createDeleteForm($comprador);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($comprador);
            $em->flush();
        }

        return $this->redirectToRoute('comprador_index');
    }

    /**
     * Creates a form to delete a Comprador entity.
     *
     * @param Comprador $comprador The Comprador entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Comprador $comprador)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('comprador_delete', array('id' => $comprador->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
