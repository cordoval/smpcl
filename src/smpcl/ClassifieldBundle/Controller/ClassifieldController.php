<?php

namespace smpcl\ClassifieldBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use smpcl\ClassifieldBundle\Entity\Classifield;
use smpcl\ClassifieldBundle\Form\ClassifieldType;

/**
 * Classifield controller.
 *
 */
class ClassifieldController extends Controller
{
    /**
     * Lists all Classifield entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('smpclClassifieldBundle:Classifield')->findAll();

        return $this->render('smpclClassifieldBundle:Classifield:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Classifield entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('smpclClassifieldBundle:Classifield')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Classifield entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('smpclClassifieldBundle:Classifield:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new Classifield entity.
     *
     */
    public function newAction()
    {
        $entity = new Classifield();
        $form   = $this->createForm(new ClassifieldType(), $entity);

        return $this->render('smpclClassifieldBundle:Classifield:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Classifield entity.
     *
     */
    public function createAction()
    {
        $entity  = new Classifield();
        $request = $this->getRequest();
        $form    = $this->createForm(new ClassifieldType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('aviso_show', array('id' => $entity->getId())));
            
        }

        return $this->render('smpclClassifieldBundle:Classifield:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Classifield entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('smpclClassifieldBundle:Classifield')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Classifield entity.');
        }

        $editForm = $this->createForm(new ClassifieldType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('smpclClassifieldBundle:Classifield:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Classifield entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('smpclClassifieldBundle:Classifield')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Classifield entity.');
        }

        $editForm   = $this->createForm(new ClassifieldType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('aviso_edit', array('id' => $id)));
        }

        return $this->render('smpclClassifieldBundle:Classifield:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Classifield entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('smpclClassifieldBundle:Classifield')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Classifield entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('aviso'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
