<?php

namespace Anonsiero\AdvertBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Anonsiero\AdvertBundle\Form\AdvertType;
use Anonsiero\AdvertBundle\Entity\Advert;
use Anonsiero\UserBundle\Entity\User;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * @Route("/advert")
 */
class AdvertController extends Controller
{  
    /**
     * @Route("/{idCategory}", name="advert_index", defaults={"idCategory"="1"}, requirements={"idCategory"="\d+"})
     * @Template()
     */
    public function indexAction($idCategory) {
        $category = $this->getDoctrine()->getRepository('AnonsieroAdvertBundle:Category')->getCategories();
        $categoriesTree = $this->makeTree($category);
        $adverts = $this->getDoctrine()->getRepository('AnonsieroAdvertBundle:Advert')->getAdvertsOfCategory($idCategory, $this->getSubcategoriesID($idCategory, $categoriesTree));
        return array(
            'categoriesTree' => $categoriesTree,
            'adverts'        => $adverts
            );
    }
    
    /**
     * @Route("/show/{idAdvert}", name="advert_show")
     * @Template()
     */
    public function showAction($idAdvert) {
        $advert = $this->getDoctrine()->getRepository('AnonsieroAdvertBundle:Advert')->getAdvert($idAdvert);
        return array('advert' => $advert);
    }
    
    /**
     * @Route("/add", name="advert_add")
     * @Template()
     */
    public function addAction() {
        $user = $this->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof User) {
            throw new AccessDeniedException("This user does not have access to this section.");
        }
        $entity = new Advert();
        $form = $this->createForm(new AdvertType(), $entity);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            $entity->setUser($user);
            $entity->setDateAdded();
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($entity);
                $em->flush();
                return $this->redirect($this->generateUrl('homepage'));
            }
        }
        return $this->render('AnonsieroAdvertBundle:Advert:add.html.twig', array('form' => $form->createView()));
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
