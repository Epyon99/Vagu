<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Items;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Item controller.
 *
 */
class ItemsController extends Controller
{
    /**
     * Lists all item entities.
     *
     * @Route("/items/index", name="items_index")
     * @Method("GET")
     */
    public function indexAction()
    {
		if (!$isset($_COOKIE[$cookie_name]))
		{
			// return to Login Controller
		}
		
        $em = $this->getDoctrine()->getManager();

        $items = $em->getRepository('AppBundle:Items')->findAll();

        return $this->render('items/index.html.twig', array(
            'items' => $items,
        ));
    }

    /**
     * Creates a new item entity.
     *
     * @Route("/items/new", name="items_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $item = new Items();
        $form = $this->createForm('AppBundle\Form\ItemsType', $item,array('allow_extra_fields' =>true));
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $marcas = $em->getRepository('AppBundle:Marcas')->findAll();

        if ($form->isSubmitted() && $form->isValid()) {
			$item->setIdmarca($request->get("idmarca"));
            $em = $this->getDoctrine()->getManager();
            $em->persist($item);
            $em->flush();

            return $this->redirectToRoute('items_show', array('iditem' => $item->getIditem()));
        }

        return $this->render('items/new.html.twig', array(
            'item' => $item,
            'form' => $form->createView(),
			'marcas' => $marcas,
        ));
    }

    /**
     * Finds and displays a item entity.
     *
     * @Route("/items/{iditem}", name="items_show")
     * @Method("GET")
     */
    public function showAction(Items $item)
    {
        $deleteForm = $this->createDeleteForm($item);

        return $this->render('items/show.html.twig', array(
            'item' => $item,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing item entity.
     *
     * @Route("/items/{iditem}/edit", name="items_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Items $item)
    {
        $deleteForm = $this->createDeleteForm($item);
        $editForm = $this->createForm('AppBundle\Form\ItemsType', $item);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('items_edit', array('iditem' => $item->getIditem()));
        }

        return $this->render('items/edit.html.twig', array(
            'item' => $item,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a item entity.
     *
     * @Route("/items/{iditem}", name="items_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Items $item)
    {
        $form = $this->createDeleteForm($item);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($item);
            $em->flush();
        }

        return $this->redirectToRoute('items_index');
    }

    /**
     * Creates a form to delete a item entity.
     *
     * @param Items $item The item entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Items $item)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('items_delete', array('iditem' => $item->getIditem())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
