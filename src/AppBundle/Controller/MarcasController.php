<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Marcas;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Marca controller.
 *
 */
class MarcasController extends Controller
{
    /**
     * Lists all marca entities.
     *
     * @Route("/marcas/index", name="marcas_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $marcas = $em->getRepository('AppBundle:Marcas')->findAll();

        return $this->render('marcas/index.html.twig', array(
            'marcas' => $marcas,
        ));
    }

    /**
     * Creates a new marca entity.
     *
     * @Route("/marcas/new", name="marcas_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $marca = new Marcas();
        $form = $this->createForm('AppBundle\Form\MarcasType', $marca);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($marca);
            $em->flush();

            return $this->redirectToRoute('marcas_show', array('idmarca' => $marca->getIdmarca()));
        }

        return $this->render('marcas/new.html.twig', array(
            'marca' => $marca,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a marca entity.
     *
     * @Route("/marcas/{idmarca}", name="marcas_show")
     * @Method("GET")
     */
    public function showAction(Marcas $marca)
    {
        $deleteForm = $this->createDeleteForm($marca);

        return $this->render('marcas/show.html.twig', array(
            'marca' => $marca,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing marca entity.
     *
     * @Route("/marcas/{idmarca}/edit", name="marcas_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Marcas $marca)
    {
        $deleteForm = $this->createDeleteForm($marca);
        $editForm = $this->createForm('AppBundle\Form\MarcasType', $marca);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('marcas_edit', array('idmarca' => $marca->getIdmarca()));
        }

        return $this->render('marcas/edit.html.twig', array(
            'marca' => $marca,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a marca entity.
     *
     * @Route("/marcas/{idmarca}", name="marcas_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Marcas $marca)
    {
        $form = $this->createDeleteForm($marca);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($marca);
            $em->flush();
        }

        return $this->redirectToRoute('marcas_index');
    }

    /**
     * Creates a form to delete a marca entity.
     *
     * @param Marcas $marca The marca entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Marcas $marca)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('marcas_delete', array('idmarca' => $marca->getIdmarca())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
