<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Type
 *
 * @ORM\Table(name="type")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TypeRepository")
 */
class Type
{
    /**
     * @return string
     */
    public function __toString()
    {
        return $this->gearType;
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="gear_type", type="string", length=255)
     */
    private $gearType;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set gearType
     *
     * @param string $gearType
     *
     * @return Type
     */
    public function setGearType($gearType)
    {
        $this->gearType = $gearType;

        return $this;
    }

    /**
     * Get gearType
     *
     * @return string
     */
    public function getGearType()
    {
        return $this->gearType;
    }
}

