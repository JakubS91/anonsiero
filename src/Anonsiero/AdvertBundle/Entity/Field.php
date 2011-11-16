<?php

namespace Anonsiero\AdvertBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(name="name", type="string", length=100)
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