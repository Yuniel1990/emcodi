<?php

namespace comercial\ComercialBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use comercial\ComercialBundle\Entity\Venta;
use comercial\ComercialBundle\Form\VentaType;

/**
 * Venta controller.
 *
 * @Route("/venta")
 */
class VentaController extends Controller
{
    /**
     * Lists all Venta entities.
     *
     * @Route("/", name="venta_index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $session = $request->getSession();

        dump($session->get('utilidades'));
        $session->remove('utilidades');
        $em = $this->getDoctrine()->getManager();

        $ventas = $em->getRepository('ComercialBundle:Venta')->findAll();

        return $this->render('ComercialBundle:venta:index.html.twig', array(
            'ventas' => $ventas,
        ));
    }

    /**
     * Creates a new Venta entity.
     *
     * @Route("/new", name="venta_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $venta = new Venta();
        //Capture el objeto de la session
        $session = $request->getSession();

        $form = $this->createForm('comercial\ComercialBundle\Form\VentaType', $venta);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $ventaT = $venta->SacarVentaNeta();
            $costoT = $venta->SacarCostoVenta();
            $ventaB = $ventaT + $costoT;
            $venta->setVentaTotal($ventaT);
            $venta->setCostoTotal($costoT);
            $venta->setUtilBrutaVenta($ventaB);
            $ventassumadas = $em->getRepository('ComercialBundle:Venta')->BuscarVentaDiarias();
            //seteo una variable de session llamada utilidades con el valor $ventassumadas[0]['utilidad']
            $session->set('utilidades',$ventassumadas[0]['utilidad']);



            $em->persist($venta);
            $em->flush();

            return $this->redirectToRoute('venta_show', array('id' => $venta->getId()));
        }

        return $this->render('ComercialBundle:venta:new.html.twig', array(
            'venta' => $venta,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Venta entity.
     *
     * @Route("/{id}", name="venta_show")
     * @Method("GET")
     */
    public function showAction(Venta $venta)
    {
        $deleteForm = $this->createDeleteForm($venta);

        return $this->render('ComercialBundle:venta:show.html.twig', array(
            'venta' => $venta,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Venta entity.
     *
     * @Route("/{id}/edit", name="venta_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Venta $venta)
    {
        $deleteForm = $this->createDeleteForm($venta);
        $editForm = $this->createForm('comercial\ComercialBundle\Form\VentaType', $venta);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($venta);
            $em->flush();

            return $this->redirectToRoute('venta_edit', array('id' => $venta->getId()));
        }

        return $this->render('ComercialBundle:venta:edit.html.twig', array(
            'venta' => $venta,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Venta entity.
     *
     * @Route("/{id}", name="venta_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Venta $venta)
    {
        $form = $this->createDeleteForm($venta);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($venta);
            $em->flush();
        }

        return $this->redirectToRoute('venta_index');
    }

    /**
     * Creates a form to delete a Venta entity.
     *
     * @param Venta $venta The Venta entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Venta $venta)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('venta_delete', array('id' => $venta->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
