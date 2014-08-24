<?php

namespace DD\ShopBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DD\ShopBundle\Entity\Resource;
use DD\ShopBundle\Form\ResourceType;

/**
 * Resource controller.
 *
 */
class ResourceController extends Controller
{

    /**
     * Lists all Resource entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DDShopBundle:Resource')->findAll();

        $paginator = $this->get('knp_paginator');
        $entities = $paginator->paginate(
            $entities,
            $this->get('request')->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );

        return $this->render('DDShopBundle:Resource:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Resource entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Resource();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('resource_show', array('id' => $entity->getId())));
        }

        return $this->render('DDShopBundle:Resource:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Resource entity.
     *
     * @param Resource $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Resource $entity)
    {
        $form = $this->createForm(new ResourceType(), $entity, array(
            'action' => $this->generateUrl('resource_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Resource entity.
     *
     */
    public function newAction()
    {
        $entity = new Resource();
        $form   = $this->createCreateForm($entity);

        return $this->render('DDShopBundle:Resource:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Resource entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DDShopBundle:Resource')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Resource entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DDShopBundle:Resource:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Resource entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DDShopBundle:Resource')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Resource entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DDShopBundle:Resource:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Resource entity.
    *
    * @param Resource $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Resource $entity)
    {
        $form = $this->createForm(new ResourceType(), $entity, array(
            'action' => $this->generateUrl('resource_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Resource entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DDShopBundle:Resource')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Resource entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('resource_edit', array('id' => $id)));
        }

        return $this->render('DDShopBundle:Resource:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Resource entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DDShopBundle:Resource')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Resource entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('resource'));
    }

    /**
     * Creates a form to delete a Resource entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('resource_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
