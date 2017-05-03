<?php

namespace M2L\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="M2L\UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
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
     * @ORM\Column(name="first_name", type="string", length=255)
     */
    protected $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255)
     */
    protected $lastName;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthdate", type="datetime")
     */
    protected $birthdate;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    protected $address;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    protected $city;

    /**
     * @var string
     *
     * @ORM\Column(name="postal_code", type="string", length=255)
     */
    protected $postalCode;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255)
     */
    protected $phone;
    
    /**
     * @var string
     *
     * @ORM\Column(name="licence", type="string", length=255)
     */
    protected $licence;
    
    /**
     * @var array
     *
     * @ORM\Column(name="ligue", type="array", length=255)
     */
    protected $ligue;
    
    /**
     * @ORM\OneToMany(targetEntity="M2L\PagesBundle\Entity\Frais", mappedBy="user")
     */
    protected $frais;
    
    /**
     * @ORM\OneToMany(targetEntity="M2L\PagesBundle\Entity\Adherent", mappedBy="user")
     */
    protected $adherent;
    
    public function __construct()
    {
       parent::__construct();
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

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }
    
        /**
     * Set birthdate
     *
     * @param \DateTime $birthdate
     * @return User
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \Datetime 
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return User
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
     * Set city
     *
     * @param string $city
     * @return User
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set postalCode
     *
     * @param string $postalCode
     * @return User
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return string 
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set phone
     *
     * @param string $phone
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
     * Set licence
     *
     * @param string $licence
     * @return User
     */
    public function setLicence($licence)
    {
        $this->licence = $licence;

        return $this;
    }

    /**
     * Get licence
     *
     * @return string 
     */
    public function getLicence()
    {
        return $this->licence;
    }

    /**
     * Set ligue
     *
     * @param array $ligue
     * @return User
     */
    public function setLigue($ligue)
    {
        $this->ligue = $ligue;

        return $this;
    }

    /**
     * Get ligue
     *
     * @return array 
     */
    public function getLigue()
    {
        return $this->ligue;
    }

    /**
     * Get frais
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFrais()
    {
        return $this->frais;
    }

    /**
     * Add frais
     *
     * @param \M2L\PagesBundle\Entity\Frais $frais
     * @return User
     */
    public function addFrai(\M2L\PagesBundle\Entity\Frais $frais)
    {
        $this->frais[] = $frais;

        return $this;
    }

    /**
     * Remove frais
     *
     * @param \M2L\PagesBundle\Entity\Frais $frais
     */
    public function removeFrai(\M2L\PagesBundle\Entity\Frais $frais)
    {
        $this->frais->removeElement($frais);
    }
    
    /**
     * Get adherent
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAdherent()
    {
        return $this->adherent;
    }

    /**
     * Add adherent
     *
     * @param \M2L\PagesBundle\Entity\Adherent $adherent
     * @return User
     */
    public function addAdherent(\M2L\PagesBundle\Entity\Adherent $adherent)
    {
        $this->adherent[] = $adherent;

        return $this;
    }

    /**
     * Remove adherent
     *
     * @param \M2L\PagesBundle\Entity\Adherent $adherent
     */
    public function removeAdherent(\M2L\PagesBundle\Entity\Adherent $adherent)
    {
        $this->adherent->removeElement($adherent);
    }
}
