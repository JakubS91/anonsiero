<?php

namespace Anonsiero\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Anonsiero\AdvertBundle\Entity\Advert;
use Symfony\Component\Validator\Constraints as Assert;

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
     */
    private $adverts;
    
    /**
     * @ORM\Column(name="firstname", type="string", nullable="true")
     */
    private $firstname;
    
    /**
     * @ORM\Column(name="lastname", type="string", nullable="true")
     */
    private $lastname;
    
    /**
     * @ORM\Column(name="street", type="string", nullable="true")
     */
    private $street;
    
    /**
     * @ORM\Column(name="home_numbe", type="integer", nullable="true")
     */
    private $home_number;
    
    /**
     * @ORM\Column(name="local_number", type="integer", nullable="true")
     */
    private $local_number;
    
    /**
     * @ORM\Column(name="phone", type="bigint", nullable="true")
     * @Assert\Regex(pattern="/^[0-9]{9}$/", message="Nieprawidłowy numer telefonu")
     */
    private $phone;
    
    /**
     * @ORM\Column(name="company_name", type="string", nullable="true")
     */
    private $company_name;
    
    /**
     * @ORM\Column(name="nip", type="string", nullable="true")
     * @Assert\Regex(pattern="/^[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}$/", message="Nieprawidłowy numer telefonu")
     */
    private $nip;
    
    /**
     * @ORM\Column(name="regon", type="string", nullable="true")
     * @Assert\Regex(pattern="/^[0-9]{9}$/", message="Nieprawidłowy numer telefonu")
     */
    private $regon;
    
    /**
     * @ORM\ManyToOne(targetEntity="City", inversedBy="users")
     */
    private $city;
    
    /**
     * @ORM\ManyToOne(targetEntity="Province", inversedBy="users")
     */
    private $province;
    
    /**
     * @ORM\Column(name="postcode", type="string", nullable="true")
     * @Assert\Regex(pattern="/^[0-9]{2}-[0-9]{3}$/", message="Nieprawidłowy kod pocztowy")
     */
    private $postcode;
    
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

    /**
     * Set firstname
     *
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
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

    /**
     * Set home_number
     *
     * @param integer $homeNumber
     */
    public function setHomeNumber($homeNumber)
    {
        $this->home_number = $homeNumber;
    }

    /**
     * Get home_number
     *
     * @return integer 
     */
    public function getHomeNumber()
    {
        return $this->home_number;
    }

    /**
     * Set local_number
     *
     * @param integer $localNumber
     */
    public function setLocalNumber($localNumber)
    {
        $this->local_number = $localNumber;
    }

    /**
     * Get local_number
     *
     * @return integer 
     */
    public function getLocalNumber()
    {
        return $this->local_number;
    }

    /**
     * Set phone
     *
     * @param phone $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * Get phone
     *
     * @return phone 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set company_name
     *
     * @param string $companyName
     */
    public function setCompanyName($companyName)
    {
        $this->company_name = $companyName;
    }

    /**
     * Get company_name
     *
     * @return string 
     */
    public function getCompanyName()
    {
        return $this->company_name;
    }

    /**
     * Set nip
     *
     * @param string $nip
     */
    public function setNip($nip)
    {
        $this->nip = $nip;
    }

    /**
     * Get nip
     *
     * @return string 
     */
    public function getNip()
    {
        return $this->nip;
    }

    /**
     * Set regon
     *
     * @param string $regon
     */
    public function setRegon($regon)
    {
        $this->regon = $regon;
    }

    /**
     * Get regon
     *
     * @return string 
     */
    public function getRegon()
    {
        return $this->regon;
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
     * Set city
     *
     * @param Anonsiero\UserBundle\Entity\City $city
     */
    public function setCity(\Anonsiero\UserBundle\Entity\City $city)
    {
        $this->city = $city;
    }

    /**
     * Get city
     *
     * @return Anonsiero\UserBundle\Entity\City 
     */
    public function getCity()
    {
        return $this->city;
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
}