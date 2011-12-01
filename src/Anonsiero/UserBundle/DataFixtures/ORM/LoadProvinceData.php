<?php
namespace Anonsiero\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Anonsiero\UserBundle\Entity\Province;

class LoadProvinceData extends AbstractFixture implements OrderedFixtureInterface 
{
    public function load($manager)
    {
        $provinces = array(
                array ('dolnośląskie', 'DS'),
                array ('kujawsko-pomorskie', 'KP'),
                array ('lubelskie', 'LU'),
                array ('lubuskie', 'LB'),
                array ('łódzkie', 'LD'),
                array ('małopolskie', 'MA'),
                array ('mazowieckie', 'MZ'),
                array ('opolskie', 'OP'),
                array ('podkarpackie', 'PK'),
                array ('podlaskie', 'PD'),
                array ('pomorskie', 'PM'),
                array ('śląskie', 'SL'),
                array ('świętokrzyskie', 'SK'),
                array ('warmińsko-mazurskie', 'WN'),
                array ('wielkopolskie', 'WP'),
                array ('zachodniopomorskie', 'ZP')
        );
        
        foreach ($provinces as $val) {
            $province = new Province();
            $province->setName($val[0]);
            $this->addReference($val[1].'-province', $province);
            $manager->persist($province);
        }
        
        $manager->flush();
    }
    
    public function getOrder()
    {
        return 1;
    }
}
