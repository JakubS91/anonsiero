<?php

namespace Anonsiero\AdvertBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Anonsiero\AdvertBundle\Entity\Category
 *
 * @ORM\Table(name="advert__categories")
 * @ORM\Entity(repositoryClass="Anonsiero\AdvertBundle\Entity\CategoryRepository")
 */
class Category
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
     * @var integer $owner 
     * 
     * @ORM\ManyToOne(targetEntity="Anonsiero\AdvertBundle\Entity\Categories", inversedBy="childrens")
     */
    private $parent;
    
    /**
     * @var string $owner 
     * 
     * @ORM\OneToMany(targetEntity="Anonsiero\AdvertBundle\Entity\Categories", mappedBy="parent")
     */
    private $childrens;
    
    /**
     * @ORM\OneToMany(targetEntity="Anonsiero\AdvertBundle\Entity\Advert", mappedBy="category")
     * @var type 
     */
    private $adverts;

    public function __construct()
    {
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
}