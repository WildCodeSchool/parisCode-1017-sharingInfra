<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Characteristic
 *
 * @ORM\Table(name="characteristic")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CharacteristicRepository")
 */
class Characteristic
{
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
     * @ORM\Column(name="equipments", type="string", length=100)
     */
    private $equipments;


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
     * Set equipments
     *
     * @param string $equipments
     *
     * @return Characteristic
     */
    public function setEquipments($equipments)
    {
        $this->equipments = $equipments;

        return $this;
    }

    /**
     * Get equipments
     *
     * @return string
     */
    public function getEquipments()
    {
        return $this->equipments;
    }
}

