<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * Advert
 *
 * @ORM\Table(name="advert")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AdvertRepository")
 */
class Advert implements JsonSerializable
{
    /**
     * @return string
     */
    public function __toString()
    {
        return $this->title;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reservations = new \Doctrine\Common\Collections\ArrayCollection();
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->characteristics = new \Doctrine\Common\Collections\ArrayCollection();
        $this->pictures = new \Doctrine\Common\Collections\ArrayCollection();

        $reservation = new Reservation();
        $this->addReservation($reservation);
    }

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by json_encode,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return [
            "lat" => $this->latitude,
            "lng" => $this->longitude
        ];
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
     * @ORM\Column(name="title", type="string", length=45)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="latitude", type="float")
     */
    private $latitude;

    /**
     * @var float
     *
     * @ORM\Column(name="longitude", type="float")
     */
    private $longitude;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var int
     *
     * @ORM\Column(name="zipcode", type="integer")
     */
    private $zipcode;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer")
     */
    private $price;

    /**
     * Many adverts have one user
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="adverts")
     */
    private $user;

    /**
     * One advert has many reservations
     *
     * @ORM\OneToMany(targetEntity="Reservation", mappedBy="advert")
     */
    private $reservations;

    /**
     * One advert has many comments
     *
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="advert")
     */
    private $comments;

    /**
     * Many adverts have many characteristics
     *
     * @ORM\ManyToMany(targetEntity="Characteristic")
     */
    private $characteristics;

    /**
     * Many adverts have many pictures
     *
     * @ORM\ManyToMany(targetEntity="Picture", cascade={"all"})
     */
    private $pictures;

    /**
     * Many adverts have one type
     *
     * @ORM\ManyToOne(targetEntity="Type")
     */
    private $type;


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
     * Set title
     *
     * @param string $title
     *
     * @return Advert
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Advert
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
     * Set latitude
     *
     * @param float $latitude
     *
     * @return Advert
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     *
     * @return Advert
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Advert
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return Advert
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set user.
     *
     * @param \AppBundle\Entity\User|null $user
     *
     * @return Advert
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user.
     *
     * @return \AppBundle\Entity\User|null
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add reservation.
     *
     * @param \AppBundle\Entity\Reservation $reservation
     *
     * @return Advert
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
     * Add comment.
     *
     * @param \AppBundle\Entity\Comment $comment
     *
     * @return Advert
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
     * Add characteristic.
     *
     * @param \AppBundle\Entity\Characteristic $characteristic
     *
     * @return Advert
     */
    public function addCharacteristic(\AppBundle\Entity\Characteristic $characteristic)
    {
        $this->characteristics[] = $characteristic;

        return $this;
    }

    /**
     * Remove characteristic.
     *
     * @param \AppBundle\Entity\Characteristic $characteristic
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCharacteristic(\AppBundle\Entity\Characteristic $characteristic)
    {
        return $this->characteristics->removeElement($characteristic);
    }

    /**
     * Get characteristics.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCharacteristics()
    {
        return $this->characteristics;
    }

    /**
     * Add picture.
     *
     * @param \AppBundle\Entity\Picture $picture
     *
     * @return Advert
     */
    public function addPicture(\AppBundle\Entity\Picture $picture)
    {
        $this->pictures[] = $picture;

        return $this;
    }

    /**
     * Remove picture.
     *
     * @param \AppBundle\Entity\Picture $picture
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removePicture(\AppBundle\Entity\Picture $picture)
    {
        return $this->pictures->removeElement($picture);
    }

    /**
     * Get pictures.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPictures()
    {
        return $this->pictures;
    }

    /**
     * Set type.
     *
     * @param \AppBundle\Entity\Type|null $type
     *
     * @return Advert
     */
    public function setType(\AppBundle\Entity\Type $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type.
     *
     * @return \AppBundle\Entity\Type|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * @param int $zipcode
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

}
