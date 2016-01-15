<?php

namespace PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/")
 */
class TemplateController extends Controller
{

    /**
     * @Route(name="home_route")
     *
     * @Template("PageBundle:Page:home.html.twig")
     */
    public function homeAction(){

        return array(
            'test' => 'home',
        );

    }

}