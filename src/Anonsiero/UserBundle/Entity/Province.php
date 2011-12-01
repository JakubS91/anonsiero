<?php

namespace Anonsiero\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Anonsiero\UserBundle\Entity\Province;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="provinces")
 */
class Province
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string", nullable=false)
     * @var type 
     */
    private $name;
    
    /**
     * @ORM\OneToMany(targetEntity="City", mappedBy="province")
     * @var type 
     */
    private $cities;
    
    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="province")
     * @var type 
     */
    private $users;
    
    /**
     * @ORM\OneToMany(targetEntity="Anonsiero\AdvertBundle\Entity\Advert", mappedBy="province")
     */
    private $adverts;
    
    public function __construct()
    {
        $this->cities = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add cities
     *
     * @param Anonsiero\UserBundle\Entity\City $cities
     */
    public function addCity(\Anonsiero\UserBundle\Entity\City $cities)
    {
        $this->cities[] = $cities;
    }

    /**
     * Get cities
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getCities()
    {
        return $this->cities;
    }

    /**
     * Add users
     *
     * @param Anonsiero\UserBundle\Entity\User $users
     */
    public function addUser(\Anonsiero\UserBundle\Entity\User $users)
    {
        $this->users[] = $users;
    }

    /**
     * Get users
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
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