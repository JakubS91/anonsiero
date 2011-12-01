<?php
namespace Anonsiero\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Anonsiero\UserBundle\Entity\User;
use Anonsiero\UserBundle\Entity\Group;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface 
{
    public function load($manager)
    {
        $groups = array('administratorzy' => array('ROLE_ADMIN'),
                        'firmy' => array('ROLE_USER'),
                        'prywatne' => array('ROLE_USER'));
        
        $users = array(
          'admin' => array('admin', 'admin@anonsiero.pl', 'administratorzy'),
          'firma' => array('firma', 'firma@anonsiero.pl', 'firmy'),
          'prywatna' => array('prywatna', 'prywatna@anonsiero.pl', 'prywatne'));
        
        foreach ($groups as $key => $val) {
            $group = new Group();
            $group->setName($key)         ;
            $group->setRoles($val);
            $this->addReference($key.'-group', $group);
            $manager->persist($group);
        }
        
        foreach ($users as $key => $val) {
            $user = new User();
            $user->setUsername($key);
            $user->setPlainPassword($val[0]);
            $user->setEmail($val[1]);
            $user->setEmailCanonical($val[1]);
            $user->setEnabled(true);
            $user->addGroup($manager->merge($this->getReference($val[2].'-group')));
            $this->addReference($key.'-user', $user);
            $manager->persist($user);
        }
        $manager->flush();
    }
    
    public function getOrder()
    {
        return 1;
    }
}

