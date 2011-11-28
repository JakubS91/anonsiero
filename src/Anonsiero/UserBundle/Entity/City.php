<?php

namespace Anonsiero\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Anonsiero\UserBundle\Entity\Province;
use Anonsiero\UserBundle\Entity\User;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="cities")
 */
class City
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(name="name", type="string")
     */
    private $name;
    
    /**
     * @ORM\Column(name="postcode", type="string")
     * @Assert\Regex(pattern="/^\d{2}-\d{3}/", message="Nieprawidłowy kod pocztowy")
     */
    private $postcode;
    
    /**
     * @ORM\ManyToOne(targetEntity="Province", inversedBy="cities")
     */
    private $province;
    
    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="city")
     */
    private $users;
    
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
     * Set postcode
     *
     * @param string $postcode
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
    }

    /**
     * Get postcode
     *
     * @return string 
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Set province
     *
     * @param Anonsiero\UserBundle\Entity\Province $province
     */
    public function setProvince(\Anonsiero\UserBundle\Entity\Province $province)
    {
        $this->province = $province;
    }

    /**
     * Get province
     *
     * @return Anonsiero\UserBundle\Entity\Province 
     */
    public function getProvince()
    {
        return $this->province;
    }
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
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
}