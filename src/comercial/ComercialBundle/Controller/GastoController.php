<?php

namespace comercial\ComercialBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use comercial\ComercialBundle\Entity\Gasto;
use comercial\ComercialBundle\Form\GastoType;

/**
 * Gasto controller.
 *
 * @Route("/gasto")
 */
class GastoController extends Controller
{
    /**
     * Lists all Gasto entities.
     *
     * @Route("/", name="gasto_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $gastos = $em->getRepository('ComercialBundle:Gasto')->findAll();

        return $this->render('ComercialBundle:gasto:index.html.twig', array(
            'gastos' => $gastos,
        ));
    }

    /**
     * Creates a new Gasto entity.
     *
     * @Route("/new", name="gasto_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $gasto = new Gasto();
        $form = $this->createForm('comercial\ComercialBundle\Form\GastoType', $gasto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($gasto);
            $em->flush();

            return $this->redirectToRoute('gasto_show', array('id' => $gasto->getId()));
        }

        return $this->render('ComercialBundle:gasto:new.html.twig', array(
            'gasto' => $gasto,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Gasto entity.
     *
     * @Route("/{id}", name="gasto_show")
     * @Method("GET")
     */
    public function showAction(Gasto $gasto)
    {
        $deleteForm = $this->createDeleteForm($gasto);

        return $this->render('ComercialBundle:gasto:show.html.twig', array(
            'gasto' => $gasto,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Gasto entity.
     *
     * @Route("/{id}/edit", name="gasto_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Gasto $gasto)
    {
        $deleteForm = $this->createDeleteForm($gasto);
        $editForm = $this->createForm('comercial\ComercialBundle\Form\GastoType', $gasto);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($gasto);
            $em->flush();

            return $this->redirectToRoute('gasto_edit', array('id' => $gasto->getId()));
        }

        return $this->render('ComercialBundle:gasto:edit.html.twig', array(
            'gasto' => $gasto,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Gasto entity.
     *
     * @Route("/{id}", name="gasto_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Gasto $gasto)
    {
        $form = $this->createDeleteForm($gasto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($gasto);
            $em->flush();
        }

        return $this->redirectToRoute('gasto_index');
    }

    /**
     * Creates a form to delete a Gasto entity.
     *
     * @param Gasto $gasto The Gasto entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Gasto $gasto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('gasto_delete', array('id' => $gasto->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
