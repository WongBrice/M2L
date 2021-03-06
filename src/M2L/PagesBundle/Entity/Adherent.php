<?php

namespace M2L\PagesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Adherent
 *
 * @ORM\Table(name="adherent")
 * @ORM\Entity(repositoryClass="M2L\PagesBundle\Repository\AdherentRepository")
 */
class Adherent
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
     * @ORM\Column(name="adh_first_name", type="string", length=255)
     */
    private $adh_firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="adh_last_name", type="string", length=255)
     */
    private $adh_lastName;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="adh_birthdate", type="datetime")
     */
    private $adh_birthdate;

    /**
     * @var string
     *
     * @ORM\Column(name="adh_address", type="string", length=255)
     */
    private $adh_address;

    /**
     * @var string
     *
     * @ORM\Column(name="adh_city", type="string", length=255)
     */
    private $adh_city;

    /**
     * @var string
     *
     * @ORM\Column(name="adh_postal_code", type="string", length=255)
     */
    private $adh_postalCode;

    /**
     * @var string
     *
     * @ORM\Column(name="adh_phone", type="string", length=255)
     */
    private $adh_phone;
    
    /**
     * @var string
     *
     * @ORM\Column(name="adh_licence", type="string", length=255)
     */
    private $adh_licence;
    
    /**
     * @var array
     *
     * @ORM\Column(name="adh_ligue", type="array", length=255)
     */
    private $adh_ligue;
    
    /**
     * @ORM\ManyToOne(targetEntity="M2L\UserBundle\Entity\User", inversedBy="adherent", cascade={"persist"})
     * @ORM\JoinColumn(name="adh_user_id", referencedColumnName="id")
     */
    private $user;

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
     * Set adh_firstName
     *
     * @param string $adhFirstName
     * @return Adherent
     */
    public function setAdhFirstName($adhFirstName)
    {
        $this->adh_firstName = $adhFirstName;

        return $this;
    }

    /**
     * Get adh_firstName
     *
     * @return string 
     */
    public function getAdhFirstName()
    {
        return $this->adh_firstName;
    }

    /**
     * Set adh_lastName
     *
     * @param string $adhLastName
     * @return Adherent
     */
    public function setAdhLastName($adhLastName)
    {
        $this->adh_lastName = $adhLastName;

        return $this;
    }

    /**
     * Get adh_lastName
     *
     * @return string 
     */
    public function getAdhLastName()
    {
        return $this->adh_lastName;
    }

    /**
     * Set adh_birthdate
     *
     * @param \DateTime $adhBirthdate
     * @return Adherent
     */
    public function setAdhBirthdate($adhBirthdate)
    {
        $this->adh_birthdate = $adhBirthdate;

        return $this;
    }

    /**
     * Get adh_birthdate
     *
     * @return \DateTime 
     */
    public function getAdhBirthdate()
    {
        return $this->adh_birthdate;
    }

    /**
     * Set adh_address
     *
     * @param string $adhAddress
     * @return Adherent
     */
    public function setAdhAddress($adhAddress)
    {
        $this->adh_address = $adhAddress;

        return $this;
    }

    /**
     * Get adh_address
     *
     * @return string 
     */
    public function getAdhAddress()
    {
        return $this->adh_address;
    }

    /**
     * Set adh_city
     *
     * @param string $adhCity
     * @return Adherent
     */
    public function setAdhCity($adhCity)
    {
        $this->adh_city = $adhCity;

        return $this;
    }

    /**
     * Get adh_city
     *
     * @return string 
     */
    public function getAdhCity()
    {
        return $this->adh_city;
    }

    /**
     * Set adh_postalCode
     *
     * @param string $adhPostalCode
     * @return Adherent
     */
    public function setAdhPostalCode($adhPostalCode)
    {
        $this->adh_postalCode = $adhPostalCode;

        return $this;
    }

    /**
     * Get adh_postalCode
     *
     * @return string 
     */
    public function getAdhPostalCode()
    {
        return $this->adh_postalCode;
    }

    /**
     * Set adh_phone
     *
     * @param string $adhPhone
     * @return Adherent
     */
    public function setAdhPhone($adhPhone)
    {
        $this->adh_phone = $adhPhone;

        return $this;
    }

    /**
     * Get adh_phone
     *
     * @return string 
     */
    public function getAdhPhone()
    {
        return $this->adh_phone;
    }

    /**
     * Set adh_licence
     *
     * @param string $adhLicence
     * @return Adherent
     */
    public function setAdhLicence($adhLicence)
    {
        $this->adh_licence = $adhLicence;

        return $this;
    }

    /**
     * Get adh_licence
     *
     * @return string 
     */
    public function getAdhLicence()
    {
        return $this->adh_licence;
    }

    /**
     * Set adh_ligue
     *
     * @param array $adhLigue
     * @return Adherent
     */
    public function setAdhLigue($adhLigue)
    {
        $this->adh_ligue = $adhLigue;

        return $this;
    }

    /**
     * Get adh_ligue
     *
     * @return array 
     */
    public function getAdhLigue()
    {
        return $this->adh_ligue;
    }

    /**
     * Set user
     *
     * @param \M2L\UserBundle\Entity\User $user
     * @return Adherent
     */
    public function setUser(\M2L\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }
    
    /**
     * Get user
     *
     * @return \M2L\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
