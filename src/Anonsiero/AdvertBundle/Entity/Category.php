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
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;
    
    /**
     * @var Categpry $parent 
     * 
     * @ORM\ManyToOne(targetEntity="Anonsiero\AdvertBundle\Entity\Category", inversedBy="childrens")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    private $parent;
    
    /**
     * @var ArrayCollection $childrens 
     * 
     * @ORM\OneToMany(targetEntity="Anonsiero\AdvertBundle\Entity\Category", mappedBy="parent")
     */
    private $childrens;
    
    /**
     * @ORM\OneToMany(targetEntity="Anonsiero\AdvertBundle\Entity\Advert", mappedBy="category", cascade={"persist", "remove", "merge"})
     * @var ArrayCollection $adverts
     */
    private $adverts;
    
    /**
     * @ORM\ManyToMany(targetEntity="Anonsiero\AdvertBundle\Entity\Field", inversedBy="$categories")
     * @ORM\JoinTable(name="advert__categories_has_fields",
     *      joinColumns={@ORM\JoinColumn(name="field_id", referencedColumnName="id", nullable=false)},
     *      inverseJoinColumns={@ORM\JoinColumn(name="category_id", referencedColumnName="id", nullable=false)}
     *      )
     * @var ArrayCollection $fields
     */
    private $fields;


    public function __construct()
    {
        $this->childrens = new ArrayCollection();
        $this->adverts = new ArrayCollection();
        $this->fields = new ArrayCollection();
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
     * Set parent
     *
     * @param Anonsiero\AdvertBundle\Entity\Category $parent
     */
    public function setParent(\Anonsiero\AdvertBundle\Entity\Category $parent)
    {
        $this->parent = $parent;
    }

    /**
     * Get parent
     *
     * @return Anonsiero\AdvertBundle\Entity\Category 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add childrens
     *
     * @param Anonsiero\AdvertBundle\Entity\Category $childrens
     */
    public function addCategories(\Anonsiero\AdvertBundle\Entity\Category $childrens)
    {
        $this->childrens[] = $childrens;
    }

    /**
     * Get childrens
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getChildrens()
    {
        return $this->childrens;
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
     * Add fields
     *
     * @param Anonsiero\AdvertBundle\Entity\Field $fields
     */
    public function addField(\Anonsiero\AdvertBundle\Entity\Field $fields)
    {
        $this->fields[] = $fields;
    }

    /**
     * Get fields
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getFields()
    {
        return $this->fields;
    }

    public function __toString()
    {
        return (string)$this->name;
    }


    /**
     * Add childrens
     *
     * @param Anonsiero\AdvertBundle\Entity\Category $childrens
     */
    public function addCategory(\Anonsiero\AdvertBundle\Entity\Category $childrens)
    {
        $this->childrens[] = $childrens;
    }
}