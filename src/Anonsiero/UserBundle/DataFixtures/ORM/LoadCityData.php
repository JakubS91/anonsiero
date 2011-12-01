<?php
namespace Anonsiero\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Anonsiero\UserBundle\Entity\City;
class LoadCityData extends AbstractFixture implements OrderedFixtureInterface 
{
    public function load($manager)
    {
        $cities = array(
                array('Szczecin', 'ZP'),
                array('Gdańsk', 'PM'),
                array('Elbląg', 'WN'),
                array('Białystok', 'PD'),
                array('Bydgoszcz', 'KP'),
                array('Warszawa', 'MZ'),
                array('Grodzisk Wielkopolski', 'LB'),
                array('Poznań', 'WP'),
                array('Łódź', 'LD'),
                array('Lublin', 'LU'),
                array('Wrocław', 'DS'),
                array('Opole', 'OP'),
                array('Katowice', 'SL'),
                array('Kraków', 'MA'),
                array('Kielce', 'SK'),
                array('Rzeszów', 'PK')
                );
        foreach($cities as $val) {
            $city = new City();
            $city->setName($val[0]);
            $city->setProvince($manager->merge($this->getReference($val[1].'-province')));
            $this->addReference($val[0].'-city', $city);
            $manager->persist($city);
        }
        $manager->flush();
    }
    
    public function getOrder()
    {
        return 2;
    }
}

?>
