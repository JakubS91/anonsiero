<?php

namespace Anonsiero\AdvertBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Anonsiero\AdvertBundle\Entity\AdvertHasField
 *
 * @ORM\Table(name="advert__adverts_has_fields")
 * @ORM\Entity(repositoryClass="Anonsiero\AdvertBundle\Entity\AdvertHasFieldRepository")
 */
class AdvertHasField
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
     * @var Advert $advert 
     * 
     * @ORM\ManyToOne(targetEntity="Anonsiero\AdvertBundle\Entity\Advert", inversedBy="advertHasFields")
     * @ORM\JoinColumn(name="advert_id", referencedColumnName="id", nullable=false)
     */
    private $advert;
    
    /**
     * @var Field $field 
     * 
     * @ORM\ManyToOne(targetEntity="Anonsiero\AdvertBundle\Entity\Field", inversedBy="advertHasFields")
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
     * Set advert
     *
     * @param Anonsiero\AdvertBundle\Entity\Advert $advert
     */
    public function setAdvert(\Anonsiero\AdvertBundle\Entity\Advert $advert)
    {
        $this->advert = $advert;
    }

    /**
     * Get advert
     *
     * @return Anonsiero\AdvertBundle\Entity\Advert 
     */
    public function getAdvert()
    {
        return $this->advert;
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