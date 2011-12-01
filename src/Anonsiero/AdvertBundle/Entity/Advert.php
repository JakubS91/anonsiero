<?php

namespace Anonsiero\AdvertBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @ORM\Column(name="name", type="string", length=50)
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
     * @Assert\Regex(
     *     pattern="/^[0-9]+(\.[0-9]{1,2}){0,1}$/",
     *     message="Podana cena jest nieprawidłowa."
     * )
     * @ORM\Column(name="price", type="decimal", scale=2)
     */
    private $price;
    
    /**
     * @var boolean $negotiation
     * @ORM\Column(name="negotiation", type="boolean")
     */
    private $negotiation;
    
    /**
     * @var boolean $deleted
     *
     * @ORM\Column(name="deleted", type="boolean", nullable=true)
     */
    private $deleted;
    
    /**
     * @var string $country
     *
     * @ORM\Column(name="country", type="string", length=50, nullable=true)
     */
    private $country;
    
    /**
     * @var string $province
     *
     * @ORM\Column(name="province", type="string", length=50, nullable=true)
     */
    private $province;
    
    /**
     * @var string $city
     *
     * @ORM\Column(name="city", type="string", length=50, nullable=true)
     */
    private $city;
    
    /**
     * @var string $postcode
     *
     * @Assert\Regex(
     *     pattern="/^[0-9]{2}-[0-9]{3}$/",
     *     message="Podana kod pocztowy jest nieprawidłowy."
     * )
     * @ORM\Column(name="postcode", type="string", length=6, nullable=true)
     */
    private $postcode;
    
    /**
     * @var string $street
     *
     * @ORM\Column(name="street", type="string", length=50, nullable=true)
     */
    private $street;
    
    /**
     * @var User $user
     * 
     * @ORM\ManyToOne(targetEntity="Anonsiero\UserBundle\Entity\User", inversedBy="adverts")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    private $user;
    
    /**
     * @var Category $category 
     * 
     * @ORM\ManyToOne(targetEntity="Anonsiero\AdvertBundle\Entity\Category", inversedBy="adverts")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id", nullable=false)
     */
    private $category;
    
    /**
     * @ORM\OneToMany(targetEntity="Anonsiero\AdvertBundle\Entity\AdvertHasField", mappedBy="advert",  cascade={"persist", "remove", "merge"})
     * @var ArrayCollection $advertHasFields
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
     * Set date_added
     *
     * @param datetime $dateAdded
     */
    public function setDateAdded()
    {
        $this->date_added = new \DateTime('now');
    }

    /**
     * Get date_added
     *
     * @return datetime 
     */
    public function getDateAdded()
    {
        return $this->date_added;
    }

    /**
     * Set short_desc
     *
     * @param text $shortDesc
     */
    public function setShortDesc($shortDesc)
    {
        $this->short_desc = $shortDesc;
    }

    /**
     * Get short_desc
     *
     * @return text 
     */
    public function getShortDesc()
    {
        return $this->short_desc;
    }

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set price
     *
     * @param decimal $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Get price
     *
     * @return decimal 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set negotition
     *
     * @param boolean $negotition
     */
    public function setNegotiation($negotition)
    {
        $this->negotiation = $negotition;
    }

    /**
     * Get negotition
     *
     * @return boolean 
     */
    public function getNegotiation()
    {
        return $this->negotiation;
    }

    /**
     * Set country
     *
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set province
     *
     * @param string $province
     */
    public function setProvince($province)
    {
        $this->province = $province;
    }

    /**
     * Get province
     *
     * @return string 
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Set city
     *
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set user
     *
     * @param Anonsiero\UserBundle\Entity\User $user
     */
    public function setUser(\Anonsiero\UserBundle\Entity\User $user)
    {
        $this->user = $user;
    }

    /**
     * Get user
     *
     * @return Anonsiero\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set category
     *
     * @param Anonsiero\AdvertBundle\Entity\Category $category
     */
    public function setCategory(\Anonsiero\AdvertBundle\Entity\Category $category)
    {
        $this->category = $category;
    }

    /**
     * Get category
     *
     * @return Anonsiero\AdvertBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add advertHasFields
     *
     * @param Anonsiero\AdvertBundle\Entity\AdvertHasField $advertHasFields
     */
    public function addAdvertHasField(\Anonsiero\AdvertBundle\Entity\AdvertHasField $advertHasFields)
    {
        $this->advertHasFields[] = $advertHasFields;
    }

    /**
     * Get advertHasFields
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getAdvertHasFields()
    {
        return $this->advertHasFields;
    }

    /**
     * Set status
     *
     * @param boolean $status
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getDeleted()
    {
        return $this->deleted;
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
     * Set street
     *
     * @param string $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * Get street
     *
     * @return string 
     */
    public function getStreet()
    {
        return $this->street;
    }
}