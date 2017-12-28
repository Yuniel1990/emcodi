<?php

namespace comercial\ComercialBundle\Controller;

use comercial\ComercialBundle\Entity\TipoOperacion;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use comercial\ComercialBundle\Entity\Operacion;
use comercial\ComercialBundle\Form\OperacionType;

/**
 * Operacion controller.
 *
 * @Route("/operacion")
 */
class OperacionController extends Controller
{
    /**
     * Lists all Operacion entities.
     *
     * @Route("/", name="operacion_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $operacions = $em->getRepository('ComercialBundle:Operacion')->findAll();

        return $this->render('ComercialBundle:operacion:index.html.twig', array(
            'operacions' => $operacions,
        ));
    }

    /**
     * Lists all Operacion entities.
     *
     * @Route("/informe", name="operacion_informe")
     * @Method("GET")
     */
    public function informeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm('comercial\ComercialBundle\Form\RangoFechaType');
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

        }

        $operacion = $em->getRepository('ComercialBundle:Operacion')->findAll();


        return $this->render('ComercialBundle:operacion:informe.html.twig', array(
            'operacion' => $operacion,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new Operacion entity.
     *
     * @Route("/new", name="operacion_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $operacion = new Operacion();
        $form = $this->createForm('comercial\ComercialBundle\Form\OperacionType', $operacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $tipoOp = $operacion->getTipoOperacion();
            $totalR = $operacion->SacarVentaNeta($tipoOp->getDescuento());
            $operacion->setTotal($totalR);

            $em->persist($operacion);
            $em->flush();

            if ($request->get('GuardaCrear') !== null)
            {
                return $this->redirectToRoute('operacion_new');
            }
            return $this->redirectToRoute('operacion_index');

        }

        return $this->render('ComercialBundle:operacion:new.html.twig', array(
            'operacion' => $operacion,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Operacion entity.
     *
     * @Route("/{id}", name="operacion_show")
     * @Method("GET")
     */
    public function showAction(Operacion $operacion)
    {
        $deleteForm = $this->createDeleteForm($operacion);

        return $this->render('ComercialBundle:operacion:show.html.twig', array(
            'operacion' => $operacion,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Operacion entity.
     *
     * @Route("/{id}/edit", name="operacion_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Operacion $operacion)
    {
        $deleteForm = $this->createDeleteForm($operacion);
        $editForm = $this->createForm('comercial\ComercialBundle\Form\OperacionType', $operacion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $tipoOp = $operacion->getTipoOperacion();
            $totalR = $operacion->SacarVentaNeta($tipoOp->getDescuento());
            $operacion->setTotal($totalR);
            $em->persist($operacion);
            $em->flush();

            return $this->redirectToRoute('operacion_edit', array('id' => $operacion->getId()));
        }

        return $this->render('ComercialBundle:operacion:edit.html.twig', array(
            'operacion' => $operacion,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Operacion entity.
     *
     * @Route("/{id}", name="operacion_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Operacion $operacion)
    {
        $form = $this->createDeleteForm($operacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($operacion);
            $em->flush();
        }

        return $this->redirectToRoute('operacion_index');
    }

    /**
     * Creates a form to delete a Operacion entity.
     *
     * @param Operacion $operacion The Operacion entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Operacion $operacion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('operacion_delete', array('id' => $operacion->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
