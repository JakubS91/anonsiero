<?php
namespace Anonsiero\AdvertBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Anonsiero\AdvertBundle\Entity\Category;
use Anonsiero\AdvertBundle\Entity\Advert;

class LoadAdvertData extends AbstractFixture implements OrderedFixtureInterface {
    
    public function load($manager) {
        $categories = array(
            'glowna' => array(null, 'Główna'),
            'kat1' => array('glowna', 'kat1'),
            'kat11' => array('kat1', 'kat11'),
            'kat12' => array('kat1', 'kat12'),
            'kat121' => array('kat12', 'kat121'),
            'kat122' => array('kat12', 'kat122'),
            'kat13' => array('kat1', 'kat13'),
            'kat131' => array('kat13', 'kat131')
        );
        
        $adverts = array(
            'advert_122_1' => array('advert_122_1', 'krótki opis advert_122_1', 'długi opis advert_122_1', '2000', 0, 'kat122', 'prywatna', 0),
            'advert_122_2' => array('advert_122_2', 'krótki opis advert_122_2', 'długi opis advert_122_2', '4500', 1, 'kat122', 'firma', 0),
            'advert_121_1' => array('advert_121_1', 'krótki opis advert_121_1', 'długi opis advert_121_1', '1800', 0, 'kat121', 'firma', 0),
            'advert_121_2' => array('advert_121_2', 'krótki opis advert_121_2', 'długi opis advert_121_2', '650', 1, 'kat121', 'prywatna', 0),
            'advert_121_3' => array('advert_121_3', 'krótki opis advert_121_3', 'długi opis advert_121_3', '650', 1, 'kat121', 'prywatna', 1, 'KP', 'Bydgoszcz', '11-111', 'Fordońska 123', '123123123'),
            'advert_131_1' => array('advert_131_1', 'krótki opis advert_131_1', 'długi opis advert_131_1', '400', 0, 'kat131', 'prywatna', 0)
        );

        foreach ($categories as $key => $val) {
            $category = new Category();
            $category->setName($val[1]);
            if (!is_null($val[0])) {
                $category->setParent($manager->merge($this->getReference($val[0].'-category')));
            }
            $this->addReference($key.'-category', $category);
            $manager->persist($category);
        }
        
        foreach ($adverts as $key => $val) {
            $advert = new Advert();
            $advert->setName($val[0]);
            $advert->setShortDesc($val[1]);
            $advert->setDescription($val[2]);
            $advert->setPrice($val[3]);
            $advert->setNegotiation($val[4]);
            $advert->setCategory($manager->merge($this->getReference($val[5].'-category')));
            $advert->setUser($manager->merge($this->getReference($val[6].'-user')));
            $advert->setDateAdded();
            $advert->setOtherAdress($val[7]);
            if ($val[7] == 1) {
                $advert->setProvince($manager->merge($this->getReference($val[8].'-province')));
                $advert->setCity($manager->merge($this->getReference($val[9].'-city')));
                $advert->setPostcode($val[10]);
                $advert->setStreet($val[11]);
                $advert->setPhone($val[12]);
            }
            $manager->persist($advert);
        }
        $manager->flush();
    }
    
    public function getOrder()
    {
        return 3;
    }
}

?>
