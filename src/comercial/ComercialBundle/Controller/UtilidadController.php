<?php

namespace comercial\ComercialBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use comercial\ComercialBundle\Entity\Utilidad;
use comercial\ComercialBundle\Form\UtilidadType;

/**
 * Utilidad controller.
 *
 * @Route("/utilidad")
 */
class UtilidadController extends Controller
{
    /**
     * Lists all Utilidad entities.
     *
     * @Route("/", name="utilidad_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $utilidads = $em->getRepository('ComercialBundle:Utilidad')->findAll();

        return $this->render('ComercialBundle:utilidad:index.html.twig', array(
            'utilidads' => $utilidads,
        ));
    }

    /**
     * Creates a new Utilidad entity.
     *
     * @Route("/new", name="utilidad_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $utilidad = new Utilidad();
        $form = $this->createForm('comercial\ComercialBundle\Form\UtilidadType', $utilidad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($utilidad);
            $em->flush();

            return $this->redirectToRoute('utilidad_show', array('id' => $utilidad->getId()));
        }

        return $this->render('ComercialBundle:utilidad:new.html.twig', array(
            'utilidad' => $utilidad,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Utilidad entity.
     *
     * @Route("/{id}", name="utilidad_show")
     * @Method("GET")
     */
    public function showAction(Utilidad $utilidad)
    {
        $deleteForm = $this->createDeleteForm($utilidad);

        return $this->render('ComercialBundle:utilidad:show.html.twig', array(
            'utilidad' => $utilidad,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Utilidad entity.
     *
     * @Route("/{id}/edit", name="utilidad_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Utilidad $utilidad)
    {
        $deleteForm = $this->createDeleteForm($utilidad);
        $editForm = $this->createForm('comercial\ComercialBundle\Form\UtilidadType', $utilidad);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($utilidad);
            $em->flush();

            return $this->redirectToRoute('utilidad_edit', array('id' => $utilidad->getId()));
        }

        return $this->render('ComercialBundle:utilidad:edit.html.twig', array(
            'utilidad' => $utilidad,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Utilidad entity.
     *
     * @Route("/{id}", name="utilidad_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Utilidad $utilidad)
    {
        $form = $this->createDeleteForm($utilidad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($utilidad);
            $em->flush();
        }

        return $this->redirectToRoute('utilidad_index');
    }

    /**
     * Creates a form to delete a Utilidad entity.
     *
     * @param Utilidad $utilidad The Utilidad entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Utilidad $utilidad)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('utilidad_delete', array('id' => $utilidad->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
