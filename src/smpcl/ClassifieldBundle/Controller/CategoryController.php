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

    public function showAction($id, $slug) {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('smpclClassifieldBundle:Category')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Category entity.');
        }

        if ($entity->getSlug() != $slug) {
            // validamos por si alguna vez cambiamos de titulo a la categoria, entonces los buscadores pueden renovar el index de la pagina
            return $this->redirect($this->generateUrl('category_show', array('id' => $entity->getId(), 'slug' => $entity->getSlug())));
        }

        $entities = $entity->getClassifields();
        $this->setFlash('warning', 'TODO: Estaria bueno ponerle un sluggable a la entidad asi queda una URL mas amistosa, con el stof doctrine extension que ya tenemos instalado');
        return $this->render('smpclClassifieldBundle:Category:show.html.twig', array(
                    'entity' => $entity,
                    'entities' => $entities,
                ));
    }

    protected function setFlash($action, $value) {
        $this->container->get('session')->setFlash($action, $value);
    }

}