<?php

namespace Anonsiero\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Anonsiero\AdvertBundle\Entity\Advert;

/**
 * @ORM\Entity
 * @ORM\Table(name="user__users")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\OneToMany(targetEntity="Anonsiero\AdvertBundle\Entity\Advert", mappedBy="user", cascade={"persist", "remove", "merge"})
     * @var type 
     */
    private $adverts;

    public function __construct()
    {
        parent::__construct();
        $this->adverts = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add adverts
     *
     * @param Anonsiero\AdvertBundle\Entity\Advert $adverts
     */
    public function addAdvert(\Anonsiero\AdvertBundle\Entity\Advert $adverts)
    {
        $this->adverts[] = $adverts;
    }

    /**
     * Get adverts
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getAdverts()
    {
        return $this->adverts;
    }
}