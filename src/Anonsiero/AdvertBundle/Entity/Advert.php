<?php

namespace Anonsiero\AdvertBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Anonsiero\AdvertBundle\Entity\Advert
 *
 * @ORM\Table(name="advert__adverts")
 * @ORM\Entity(repositoryClass="Anonsiero\AdvertBundle\Entity\AdvertRepository")
 */
class Advert
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    
    /**
     * @var date $date_added
     *
     * @ORM\Column(name="date_added", type="datetime")
     */
    private $date_added;
    
    /**
     * @var string $short_desc
     *
     * @ORM\Column(name="short_desc", type="text")
     */
    private $short_desc;
    
    /**
     * @var string $description
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;
    
    /**
     * @var decimal $price
     *
     * @ORM\Column(name="price", type="decimal")
     */
    private $price;
    
    /**
     * @var boolean $price
     *
     * @ORM\Column(name="negotition", type="boolean")
     */
    private $negotition;
    
    /**
     * @var string $country
     *
     * @ORM\Column(name="country", type="string", length=50)
     */
    private $country;
    
    /**
     * @var string $province
     *
     * @ORM\Column(name="province", type="string", length=50)
     */
    private $province;
    
    /**
     * @var string $city
     *
     * @ORM\Column(name="city", type="string", length=50)
     */
    private $city;
    
    /**
     * @var string $user
     * 
     * @ORM\ManyToOne(targetEntity="Anonsiero\UserBundle\Entity\User", inversedBy="adverts")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;
    
    /**
     * @var string $category 
     * 
     * @ORM\ManyToOne(targetEntity="Anonsiero\AdvertBundle\Entity\Category", inversedBy="adverts")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;
    
    /**
     * @ORM\OneToMany(targetEntity="Anonsiero\AdvertBundle\Entity\AdvertHasField", mappedBy="advert")
     * @var type 
     */
    private $advertHasFields;

    public function __construct()
    {
        $this->advertHasFields = new ArrayCollection();
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
}