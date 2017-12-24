<?php

namespace comercial\ComercialBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use comercial\ComercialBundle\Entity\TipoOperacion;
use comercial\ComercialBundle\Form\TipoOperacionType;

/**
 * TipoOperacion controller.
 *
 * @Route("/tipooperacion")
 */
class TipoOperacionController extends Controller
{
    /**
     * Lists all TipoOperacion entities.
     *
     * @Route("/", name="tipooperacion_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tipoOperacions = $em->getRepository('ComercialBundle:TipoOperacion')->findAll();

        return $this->render('ComercialBundle:tipooperacion:index.html.twig', array(
            'tipoOperacions' => $tipoOperacions,
        ));
    }

    /**
     * Creates a new TipoOperacion entity.
     *
     * @Route("/new", name="tipooperacion_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tipoOperacion = new TipoOperacion();
        $form = $this->createForm('comercial\ComercialBundle\Form\TipoOperacionType', $tipoOperacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipoOperacion);
            $em->flush();

            return $this->redirectToRoute('tipooperacion_show', array('id' => $tipoOperacion->getId()));
        }

        return $this->render('ComercialBundle:tipooperacion:new.html.twig', array(
            'tipoOperacion' => $tipoOperacion,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TipoOperacion entity.
     *
     * @Route("/{id}", name="tipooperacion_show")
     * @Method("GET")
     */
    public function showAction(TipoOperacion $tipoOperacion)
    {
        $deleteForm = $this->createDeleteForm($tipoOperacion);

        return $this->render('ComercialBundle:tipooperacion:show.html.twig', array(
            'tipoOperacion' => $tipoOperacion,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TipoOperacion entity.
     *
     * @Route("/{id}/edit", name="tipooperacion_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TipoOperacion $tipoOperacion)
    {
        $deleteForm = $this->createDeleteForm($tipoOperacion);
        $editForm = $this->createForm('comercial\ComercialBundle\Form\TipoOperacionType', $tipoOperacion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipoOperacion);
            $em->flush();

            return $this->redirectToRoute('tipooperacion_edit', array('id' => $tipoOperacion->getId()));
        }

        return $this->render('ComercialBundle:tipooperacion:edit.html.twig', array(
            'tipoOperacion' => $tipoOperacion,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TipoOperacion entity.
     *
     * @Route("/{id}", name="tipooperacion_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TipoOperacion $tipoOperacion)
    {
        $form = $this->createDeleteForm($tipoOperacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tipoOperacion);
            $em->flush();
        }

        return $this->redirectToRoute('tipooperacion_index');
    }

    /**
     * Creates a form to delete a TipoOperacion entity.
     *
     * @param TipoOperacion $tipoOperacion The TipoOperacion entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TipoOperacion $tipoOperacion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tipooperacion_delete', array('id' => $tipoOperacion->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
