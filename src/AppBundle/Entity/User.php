<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{

    public function setEmail($email)
    {
        parent::setEmail($email);
        $this->username = $email;
        $this->usernameCanonical = strtolower($email);
    }

    public function __construct()
    {
        parent::__construct();
        $this->adverts = new ArrayCollection();
        $this->comments = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->firstname . " " . $this->name;
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=45)
     */
    protected $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=45, nullable=true)
     */
    protected $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    protected $description;

    /**
     * One user has many reservations
     *
     * @ORM\OneToMany(targetEntity="Reservation", mappedBy="user")
     */
    protected $reservations;

    /**
     * One user has many adverts
     *
     * @ORM\OneToMany(targetEntity="Advert", mappedBy="user")
     */
    protected $adverts;

    /**
     * One user has many comments
     *
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="user")
     */
    protected $comments;

    /**
     * One user has one picture
     *
     * @ORM\OneToOne(targetEntity="Picture", cascade={"persist"})
     */
    protected $picture;


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
     * Set name
     *
     * @param string $name
     *
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
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
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
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
     * Set phone
     *
     * @param string $phone
     *
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return User
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add reservation.
     *
     * @param \AppBundle\Entity\Reservation $reservation
     *
     * @return User
     */
    public function addReservation(\AppBundle\Entity\Reservation $reservation)
    {
        $this->reservations[] = $reservation;

        return $this;
    }

    /**
     * Remove reservation.
     *
     * @param \AppBundle\Entity\Reservation $reservation
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeReservation(\AppBundle\Entity\Reservation $reservation)
    {
        return $this->reservations->removeElement($reservation);
    }

    /**
     * Get reservations.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReservations()
    {
        return $this->reservations;
    }

    /**
     * Add advert.
     *
     * @param \AppBundle\Entity\Advert $advert
     *
     * @return User
     */
    public function addAdvert(\AppBundle\Entity\Advert $advert)
    {
        $this->adverts[] = $advert;

        return $this;
    }

    /**
     * Remove advert.
     *
     * @param \AppBundle\Entity\Advert $advert
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeAdvert(\AppBundle\Entity\Advert $advert)
    {
        return $this->adverts->removeElement($advert);
    }

    /**
     * Get adverts.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAdverts()
    {
        return $this->adverts;
    }

    /**
     * Add comment.
     *
     * @param \AppBundle\Entity\Comment $comment
     *
     * @return User
     */
    public function addComment(\AppBundle\Entity\Comment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment.
     *
     * @param \AppBundle\Entity\Comment $comment
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeComment(\AppBundle\Entity\Comment $comment)
    {
        return $this->comments->removeElement($comment);
    }

    /**
     * Get comments.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set picture.
     *
     * @param \AppBundle\Entity\Picture|null $picture
     *
     * @return User
     */
    public function setPicture(Picture $picture = null)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture.
     *
     * @return \AppBundle\Entity\Picture|null
     */
    public function getPicture()
    {
        return $this->picture;
    }
}
