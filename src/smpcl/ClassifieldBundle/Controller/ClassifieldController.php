<?php

namespace smpcl\ClassifieldBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use smpcl\ClassifieldBundle\Entity\Classifield;
use smpcl\ClassifieldBundle\Form\ClassifieldType;

/**
 * Classifield controller.
 *
 */
class ClassifieldController extends Controller {

    /**
     * Lists all Classifield entities.
     */
    public function indexAction() {
        $user = $this->get('security.context')->getToken()->getUser();
        
        if (!$user) {
            throw $this->createNotFoundException('You must be logged in to perform this action.');
        }

        $em = $this->get('doctrine')->getEntityManager();
        $entities = $em->getRepository('smpclClassifieldBundle:Classifield')->getClassifieldsByUser($user);

        return $this->render('smpclClassifieldBundle:Classifield:index.html.twig', array(
                    'entities' => $entities
                ));
    }

    /**
     * Finds and displays a Classifield entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getEntityManager();

//        $entity = $em->getRepository('smpclClassifieldBundle:Classifield')->find($id);
        $entity = $em->find('smpclClassifieldBundle:Classifield', $id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Classifield entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('smpclClassifieldBundle:Classifield:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),
                ));
    }

    /**
     * Displays a form to create a new Classifield entity.
     *
     */
    public function newAction() {
        $entity = new Classifield();
        $form = $this->createForm(new ClassifieldType(), $entity);

        return $this->render('smpclClassifieldBundle:Classifield:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView()
                ));
    }

    /**
     * Creates a new Classifield entity.
     *
     */
    public function createAction() {
        $entity = new Classifield();
        $request = $this->getRequest();
        $form = $this->createForm(new ClassifieldType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();

            $user = $this->get('security.context')->getToken()->getUser();

            if ($user) {
                $entity->setUser($user);
            }

            $em->persist($entity);
            $em->flush();
            $this->setFlash('success', 'Su aviso se ha cargado con éxito.');

            return $this->redirect($this->generateUrl('aviso_show', array('id' => $entity->getId())));
        }

        return $this->render('smpclClassifieldBundle:Classifield:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView()
                ));
    }

    /**
     * Displays a form to edit an existing Classifield entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('smpclClassifieldBundle:Classifield')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Classifield entity.');
        }

        $unvalid = $this->validateCanEdit($entity);
        if ($unvalid) {
            return $unvalid;
        }

        $editForm = $this->createForm(new ClassifieldType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('smpclClassifieldBundle:Classifield:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
                ));
    }

    /**
     * Edits an existing Classifield entity.
     *
     */
    public function updateAction($id) {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('smpclClassifieldBundle:Classifield')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Classifield entity.');
        }

        $unvalid = $this->validateCanEdit($entity);
        if ($unvalid) {
            return $unvalid;
        }

        $editForm = $this->createForm(new ClassifieldType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {

            if ($entity->getPublishedAt()) {
                $entity->setStatus(Classifield::STATUS_EDITED);
            }

            $em->persist($entity);
            $em->flush();
            $this->setFlash('success', 'Los cambios se han aplicado con éxito.');

            return $this->redirect($this->generateUrl('aviso_show', array('id' => $id)));
        }

        return $this->render('smpclClassifieldBundle:Classifield:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
                ));
    }

    /**
     * Deletes a Classifield entity.
     *
     */
    public function deleteAction($id) {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('smpclClassifieldBundle:Classifield')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Classifield entity.');
            }

            $unvalid = $this->validateCanEdit($entity);
            if ($unvalid) {
                return $unvalid;
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('aviso'));
    }

    private function createDeleteForm($id) {
        return $this->createFormBuilder(array('id' => $id))
                        ->add('id', 'hidden')
                        ->getForm()
        ;
    }

    /**
     * Return a redirect object if the user cannot edit the entity
     * 
     * @param user $entity
     * @return FALSE Or \Symfony\Component\HttpFoundation\RedirectResponse 
     */
    private function validateCanEdit($entity) {
        $user = $this->get('security.context')->getToken()->getUser();
        //@TODO: CHECK IF THE USER IS AN ADMIN TOO
        if (!$entity->canEdit($user)) {
            return $this->redirect($this->generateUrl('aviso'));
        }

        return FALSE;
    }

    protected function setFlash($action, $value) {
        $this->container->get('session')->setFlash($action, $value);
    }

}
