<?php

namespace smpcl\ClassifieldBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use smpcl\ClassifieldBundle\Entity\Category;

class CategoryController extends Controller {

    public function sidebarListingAction() {

        $em = $this->getDoctrine()->getEntityManager();
        $entities = $em->getRepository('smpclClassifieldBundle:Category')->findBy(array(), array('title' => 'ASC'));

        return $this->render('smpclClassifieldBundle:Category:sidebar_listing.html.twig', array(
                    'entities' => $entities,
                ));
    }

    public function showAction($slug) {
        
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('smpclClassifieldBundle:Category')->findOneBySlug($slug);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Category entity.');
        }

//        $entities = $entity->getClassifields();
        $entities = $em->getRepository('smpclClassifieldBundle:Category')->getClassififields($entity->getId());
        
        return $this->render('smpclClassifieldBundle:Category:show.html.twig', array(
                    'entity' => $entity,
                    'entities' => $entities,
                ));
    }

    protected function setFlash($action, $value) {
        $this->container->get('session')->setFlash($action, $value);
    }

}