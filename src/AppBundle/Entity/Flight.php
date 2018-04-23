<?php

namespace AppBundle\Entity;

use AppBundle\Entity\PlaneModel;
use AppBundle\Entity\Reservation;
use AppBundle\Entity\Site;
use AppBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Flight
 *
 * @ORM\Table(name="flight")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FlightRepository")
 */
class Flight
{
    public function __construct()
    {
        $this->flight = new ArrayCollection();
        $this->arrival = new ArrayCollection();
        $this->pilot = new ArrayCollection();
        $this->departure = new ArrayCollection();
    }

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Site", inversedBy="arrivals")
     * @ORM\JoinColumn(nullable=false)
     */
    private $arrival;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\PlaneModel", inversedBy="planes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $plane;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="pilots")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pilot;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Site", inversedBy="departures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $departure;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Reservation", mappedBy="flights")
     */
    private $flight;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="nbFreeSeats", type="smallint")
     */
    private $nbFreeSeats;

    /**
     * @var float
     *
     * @ORM\Column(name="seatPrice", type="float")
     */
    private $seatPrice;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="takeOffTime", type="datetime")
     */
    private $takeOffTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="publicationDate", type="datetime")
     */
    private $publicationDate;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="wasDone", type="boolean")
     */
    private $wasDone;

    public function __toString()
    {
        return $this->departure . " " . $this->arrival;
    }

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
     * Set nbFreeSeats
     *
     * @param integer $nbFreeSeats
     *
     * @return Flight
     */
    public function setNbFreeSeats($nbFreeSeats)
    {
        $this->nbFreeSeats = $nbFreeSeats;

        return $this;
    }

    /**
     * Get nbFreeSeats
     *
     * @return int
     */
    public function getNbFreeSeats()
    {
        return $this->nbFreeSeats;
    }

    /**
     * Set seatPrice
     *
     * @param float $seatPrice
     *
     * @return Flight
     */
    public function setSeatPrice($seatPrice)
    {
        $this->seatPrice = $seatPrice;

        return $this;
    }

    /**
     * Get seatPrice
     *
     * @return float
     */
    public function getSeatPrice()
    {
        return $this->seatPrice;
    }

    /**
     * Set takeOffTime
     *
     * @param \DateTime $takeOffTime
     *
     * @return Flight
     */
    public function setTakeOffTime($takeOffTime)
    {
        $this->takeOffTime = $takeOffTime;

        return $this;
    }

    /**
     * Get takeOffTime
     *
     * @return \DateTime
     */
    public function getTakeOffTime()
    {
        return $this->takeOffTime;
    }

    /**
     * Set publicationDate
     *
     * @param \DateTime $publicationDate
     *
     * @return Flight
     */
    public function setPublicationDate($publicationDate)
    {
        $this->publicationDate = $publicationDate;

        return $this;
    }

    /**
     * Get publicationDate
     *
     * @return \DateTime
     */
    public function getPublicationDate()
    {
        return $this->publicationDate;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Flight
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
     * Set wasDone
     *
     * @param boolean $wasDone
     *
     * @return Flight
     */
    public function setWasDone($wasDone)
    {
        $this->wasDone = $wasDone;

        return $this;
    }

    /**
     * Get wasDone
     *
     * @return bool
     */
    public function getWasDone()
    {
        return $this->wasDone;
    }


    /**
     * Set departure
     *
     * @param Site $departure
     *
     * @return Flight
     */
    public function setDeparture(Site $departure)
    {
        $this->departure = $departure;

        return $this;
    }

    /**
     * Get departure
     *
     * @return Site
     */
    public function getDeparture()
    {
        return $this->departure;
    }

    /**
     * Set arrival
     *
     * @param Site $arrival
     *
     * @return Flight
     */
    public function setArrival(Site $arrival)
    {
        $this->arrival = $arrival;

        return $this;
    }

    /**
     * Get arrival
     *
     * @return Site
     */
    public function getArrival()
    {
        return $this->arrival;
    }

    /**
     * Set plane
     *
     * @param PlaneModel $plane
     *
     * @return Flight
     */
    public function setPlane(PlaneModel $plane)
    {
        $this->plane = $plane;

        return $this;
    }

    /**
     * Get plane
     *
     * @return PlaneModel
     */
    public function getPlane()
    {
        return $this->plane;
    }

    /**
     * Set pilot
     *
     * @param User $pilot
     *
     * @return Flight
     */
    public function setPilot(User $pilot)
    {
        $this->pilot = $pilot;

        return $this;
    }

    /**
     * Get pliot
     *
     * @return User
     */
    public function getPilot()
    {
        return $this->pilot;
    }

    /**
     * Add flight
     *
     * @param Reservation $flight
     *
     * @return Flight
     */
    public function addFlight(Reservation $flight)
    {
        $this->flight[] = $flight;

        return $this;
    }

    /**
     * Remove flight
     *
     * @param Reservation $flight
     */
    public function removeFlight(Reservation $flight)
    {
        $this->flight->removeElement($flight);
    }

    /**
     * Get flight
     *
     * @return Collection
     */
    public function getFlight()
    {
        return $this->flight;
    }
}
