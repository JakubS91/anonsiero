<?php

namespace Anonsiero\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class UserController extends Controller
{
    /**
     * @Route("/index", name="user_show")
     * @Template(AnonsieroUserBundle:User:index.html.twig)
     */
    public function indexAction() {
        $users = $this->getDoctrine()->getRepository('AnonsieroUserBundle:User')->findAll();
        return array('users' => $users);
    }
    
    /**
     * @Route("/{id}/show", name="user_show")
     * @Template("AnonsieroUserBundle:User:show.html.twig")
     */
    public function showAction($id) {
        $user = $this->getDoctrine()->getRepository('AnonsieroUserBundle:User')->find($id);
        return array('user' => $user);    
    }
}
