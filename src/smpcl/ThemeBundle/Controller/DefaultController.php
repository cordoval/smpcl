<?php

namespace smpcl\ThemeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DefaultController extends Controller {

    public function indexAction() {
        $vars = array(
            'name' => 'index_page',
        );

        return $this->render('smpclThemeBundle:Default:index.html.twig', $vars);
    }

    public function staticAction($name) {
        $template = sprintf('smpclThemeBundle:Static:%s.html.twig', $name);

        if (!$this->get('templating')->exists($template)) {
            throw new NotFoundHttpException("The specified page could not be found.");
        }
        return $this->render($template);
    }

}
