<?php

namespace Anonsiero\AdvertBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/advert")
 */
class AdvertController extends Controller
{  
    /**
     * @Route()
     * @Template()
     */
    public function indexAction()
    {
        $categories = $this->getDoctrine()->getRepository('AnonsieroAdvertBundle:Category')->getCategories();
        $categoriesTree = $this->makeTree($categories);
        return array('categoriesTree' => $categoriesTree);
    }
    
    /**
     * @Route("/adverts/{id}", name="_adverts123")
     * @Template()
     */
    public function advertsAction($id)
    {
        $category = $this->getDoctrine()->getRepository('AnonsieroAdvertBundle:Category')->find($id);
        return array('category' => $category);
    }
    
    /**
     * Metoda tworzy strukturę drzewa.
     * @param array $array
     * @return array tablice która ma strukturę drzewa.
     */
    public function makeTree($array) {
        if (is_array($array)) {
            foreach($array as $value) {
                $tree[$value['parent_id']][$value['id']] = $value;  
            }
            return $tree;
        }
        return null;
    }
}
