<?php

namespace smpcl\ThemeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    public function indexAction() {
        $vars = array(
            'name' => 'index_page',
        );

        return $this->render('smpclThemeBundle:Default:index.html.twig', $vars);
    }

    public function staticAction($name) {
        
        return $this->render("smpclThemeBundle:Static:{$name}.html.twig");
        
    }

}
