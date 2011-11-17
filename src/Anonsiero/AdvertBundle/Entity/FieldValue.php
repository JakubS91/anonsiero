<?php

namespace Anonsiero\AdvertBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Anonsiero\AdvertBundle\Entity\FieldValue
 *
 * @ORM\Table(name="advert__fields_value")
 * @ORM\Entity(repositoryClass="Anonsiero\AdvertBundle\Entity\FieldValueRepository")
 */
class FieldValue
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
     * @var string $value
     *
     * @ORM\Column(name="value", type="string", length=50)
     */
    private $value;
    
    /**
     * @var Field $field 
     * 
     * @ORM\ManyToOne(targetEntity="Anonsiero\AdvertBundle\Entity\Field", inversedBy="fieldValues")
     * @ORM\JoinColumn(name="field_id", referencedColumnName="id", nullable=false)
     */
    private $field;


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
     * Set value
     *
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set field
     *
     * @param Anonsiero\AdvertBundle\Entity\Field $field
     */
    public function setField(\Anonsiero\AdvertBundle\Entity\Field $field)
    {
        $this->field = $field;
    }

    /**
     * Get field
     *
     * @return Anonsiero\AdvertBundle\Entity\Field 
     */
    public function getField()
    {
        return $this->field;
    }
}