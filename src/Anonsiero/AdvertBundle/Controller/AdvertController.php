<?php

namespace Anonsiero\AdvertBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Anonsiero\AdvertBundle\Form\AddForm;
use Anonsiero\AdvertBundle\Entity\Advert;

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
     * @Route("/category/{idCategory}", name="_adverts")
     * @Template()
     */
    public function advertsAction($idCategory)
    {
        $categories = $this->getDoctrine()->getRepository('AnonsieroAdvertBundle:Category')->getCategories();
        $categoriesTree = $this->makeTree($categories);
        $adverts = $this->getDoctrine()->getRepository('AnonsieroAdvertBundle:Advert')->getAdvertsOfCategory($idCategory, $this->getSubcategoriesID($idCategory, $categoriesTree));
        return array('adverts' => $adverts);
    }
    
    /**
     * @Route("/id/{idAdvert}", name="_advert")
     * @Template()
     */
    public function advertAction($idAdvert)
    {
        $advert = $this->getDoctrine()->getRepository('AnonsieroAdvertBundle:Advert')->getAdvert($idAdvert);
        return array('advert' => $advert);
    }
    
    /**
     * @Route("/add", name="_add")
     * @Template()
     */
    public function addAction()
    {
        $entity = new Advert();
        $form = $this->createForm(new AddForm(), $entity);
        return $this->render('AnonsieroAdvertBundle:Advert:add.html.twig');
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
    
    /**
     * Metoda pobiera id podkategorii danej kategorii.
     * @param id $id
     * @param array $array
     * @param array $ids
     * @return array 
     */
    public function getSubcategoriesID($id, $array, $ids = array()) {
        if (isset($array[$id]) && is_array($array[$id])) {
            foreach ($array[$id] as $sub) {
                $ids[] = $sub['id'];
                $ids = array_merge($ids, $this->getSubcategoriesID($sub['id'], $array, $ids));
            }
        }
        return array_unique($ids, 3);
    }
}
