<?php

namespace smpcl\ClassifieldBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;
use smpcl\ClassifieldBundle\Entity\Classifield;

class ClassifieldAdminController extends Controller {

    public function batchActionEnable($query) {
        $em = $this->getDoctrine()->getEntityManager();
        // you can use a modelmanager instead of the entitymanager, but let's keep this simple

        foreach ($query->getQuery()->iterate() as $entity) {


            $entity[0]->setStatus(Classifield::STATUS_ENABLED);

            if ($entity[0]->getPublishedAt() == NULL) {
                $published_at = new \DateTime;
                $entity[0]->setPublishedAt($published_at);
            }
            
            $em->persist($entity[0]);
            //@TODO: SEND AN EMAIL AFTER VALIDATION
        }
        $em->flush();

        return $this->redirect($this->admin->generateUrl('list'));
    }

    public function batchActionDisable($query) {
        $em = $this->getDoctrine()->getEntityManager();
        // you can use a modelmanager instead of the entitymanager, but let's keep this simple

        foreach ($query->getQuery()->iterate() as $entity) {
            $entity[0]->setStatus(Classifield::STATUS_DISABLED);
            $em->persist($entity[0]);
            //@TODO: SEND AN EMAIL AFTER VALIDATION
        }
        $em->flush();

        return $this->redirect($this->admin->generateUrl('list'));
    }

}