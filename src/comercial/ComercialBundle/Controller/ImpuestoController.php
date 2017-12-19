<?php

namespace comercial\ComercialBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use comercial\ComercialBundle\Entity\Impuesto;
use comercial\ComercialBundle\Form\ImpuestoType;

/**
 * Impuesto controller.
 *
 * @Route("/impuesto")
 */
class ImpuestoController extends Controller
{
    /**
     * Lists all Impuesto entities.
     *
     * @Route("/", name="impuesto_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $impuestos = $em->getRepository('ComercialBundle:Impuesto')->findAll();

        return $this->render('ComercialBundle:impuesto:index.html.twig', array(
            'impuestos' => $impuestos,
        ));
    }

    /**
     * Creates a new Impuesto entity.
     *
     * @Route("/new", name="impuesto_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $impuesto = new Impuesto();
        $form = $this->createForm('comercial\ComercialBundle\Form\ImpuestoType', $impuesto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($impuesto);
            $em->flush();

            return $this->redirectToRoute('impuesto_show', array('id' => $impuesto->getId()));
        }

        return $this->render('ComercialBundle:impuesto:new.html.twig', array(
            'impuesto' => $impuesto,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Impuesto entity.
     *
     * @Route("/{id}", name="impuesto_show")
     * @Method("GET")
     */
    public function showAction(Impuesto $impuesto)
    {
        $deleteForm = $this->createDeleteForm($impuesto);

        return $this->render('ComercialBundle:impuesto:show.html.twig', array(
            'impuesto' => $impuesto,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Impuesto entity.
     *
     * @Route("/{id}/edit", name="impuesto_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Impuesto $impuesto)
    {
        $deleteForm = $this->createDeleteForm($impuesto);
        $editForm = $this->createForm('comercial\ComercialBundle\Form\ImpuestoType', $impuesto);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($impuesto);
            $em->flush();

            return $this->redirectToRoute('impuesto_edit', array('id' => $impuesto->getId()));
        }

        return $this->render('ComercialBundle:impuesto:edit.html.twig', array(
            'impuesto' => $impuesto,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Impuesto entity.
     *
     * @Route("/{id}", name="impuesto_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Impuesto $impuesto)
    {
        $form = $this->createDeleteForm($impuesto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($impuesto);
            $em->flush();
        }

        return $this->redirectToRoute('impuesto_index');
    }

    /**
     * Creates a form to delete a Impuesto entity.
     *
     * @param Impuesto $impuesto The Impuesto entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Impuesto $impuesto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('impuesto_delete', array('id' => $impuesto->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
