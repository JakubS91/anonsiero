<?php

namespace Anonsiero\AdvertBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Anonsiero\AdvertBundle\Entity\Field
 *
 * @ORM\Table(name="advert__fields")
 * @ORM\Entity(repositoryClass="Anonsiero\AdvertBundle\Entity\FieldRepository")
 */
class Field
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
     * @var string $type
     *
     * @ORM\Column(name="type", type="string", length=50)
     */
    private $type;

    /**
     * @var string $mask
     *
     * @ORM\Column(name="mask", type="string", length=255)
     */
    private $mask;
    
    /**
     * @ORM\OneToMany(targetEntity="Anonsiero\AdvertBundle\Entity\AdvertHasField", mappedBy="field", cascade={"persist", "remove", "merge"})
     * @var ArrayCollection $advertHasFields
     */
    private $fieldHasAdverts;
    
    /**
     * @ORM\OneToMany(targetEntity="Anonsiero\AdvertBundle\Entity\FieldValue", mappedBy="field", cascade={"persist", "remove", "merge"})
     * @var ArrayCollection $fieldValues
     */
    private $fieldValues;
    
    /**
     * @ORM\ManyToMany(targetEntity="Anonsiero\AdvertBundle\Entity\Category", mappedBy="fields", cascade={"persist", "remove", "merge"})
     * @var ArrayCollection $categories
     */
    private $categories;
    

    public function __construct()
    {
        $this->advertHasFields = new ArrayCollection();
        $this->fieldValues = new ArrayCollection();
        $this->categories = new ArrayCollection();
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
     * Set type
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set mask
     *
     * @param string $mask
     */
    public function setMask($mask)
    {
        $this->mask = $mask;
    }

    /**
     * Get mask
     *
     * @return string 
     */
    public function getMask()
    {
        return $this->mask;
    }

    /**
     * Add fieldHasAdverts
     *
     * @param Anonsiero\AdvertBundle\Entity\AdvertHasField $fieldHasAdverts
     */
    public function addAdvertHasField(\Anonsiero\AdvertBundle\Entity\AdvertHasField $fieldHasAdverts)
    {
        $this->fieldHasAdverts[] = $fieldHasAdverts;
    }

    /**
     * Get fieldHasAdverts
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getFieldHasAdverts()
    {
        return $this->fieldHasAdverts;
    }

    /**
     * Add fieldValues
     *
     * @param Anonsiero\AdvertBundle\Entity\FieldValue $fieldValues
     */
    public function addFieldValue(\Anonsiero\AdvertBundle\Entity\FieldValue $fieldValues)
    {
        $this->fieldValues[] = $fieldValues;
    }

    /**
     * Get fieldValues
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getFieldValues()
    {
        return $this->fieldValues;
    }

    /**
     * Add categories
     *
     * @param Anonsiero\AdvertBundle\Entity\Category $categories
     */
    public function addCategory(\Anonsiero\AdvertBundle\Entity\Category $categories)
    {
        $this->categories[] = $categories;
    }

    /**
     * Get categories
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getCategories()
    {
        return $this->categories;
    }
}