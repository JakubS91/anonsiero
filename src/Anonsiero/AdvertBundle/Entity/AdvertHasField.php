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
     * @ORM\Column(name="value", type="string", length=100)
     */
    private $value;
    
    /**
     * @var string $category 
     * 
     * @ORM\ManyToOne(targetEntity="Anonsiero\AdvertBundle\Entity\Advert", inversedBy="advertHasFields")
     * @ORM\JoinColumn(name="advert_id", referencedColumnName="id")
     */
    private $advert;
    
    /**
     * @var string $category 
     * 
     * @ORM\ManyToOne(targetEntity="Anonsiero\AdvertBundle\Entity\Field", inversedBy="advertHasFields")
     * @ORM\JoinColumn(name="field_id", referencedColumnName="id")
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
}