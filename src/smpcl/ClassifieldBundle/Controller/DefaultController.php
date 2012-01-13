<?php

namespace smpcl\ClassifieldBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use smpcl\ClassifieldBundle\Entity\Classifield as Classifield;
use smpcl\ClassifieldBundle\Entity\Category as Category;
use smpcl\UserBundle\Entity\User as User;

class DefaultController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('smpclClassifieldBundle:Default:index.html.twig', array('name' => 'joojo'));
    }
}
