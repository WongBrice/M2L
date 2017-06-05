<?php

namespace M2L\PagesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Frais
 * Voici la classe qui donnera la table Frais.
 * 
 * @ORM\Table(name="frais")
 * @ORM\Entity(repositoryClass="M2L\PagesBundle\Repository\FraisRepository")
 */
class Frais
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
     * @ORM\Column(name="trajet", type="string", length=100)
     */
    private $trajet;
    
     /**
     * @var string
     *
     * @ORM\Column(name="motif", type="string", length=100)
     */
    private $motif;

    /**
     * @var int
     *
     * @ORM\Column(name="km", type="integer")
     */
    private $km;
    
    /**
     * @var float
     *
     * @ORM\Column(name="cout", type="float")
     */
    private $cout;

    /**
     * @var float
     *
     * @ORM\Column(name="peage", type="float")
     */
    private $peage;

    /**
     * @var float
     *
     * @ORM\Column(name="repas", type="float")
     */
    private $repas;

    /**
     * @var float
     *
     * @ORM\Column(name="heberg", type="float")
     */
    private $heberg;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;
    
    /**
     * @var array
     *
     * @ORM\Column(name="validate", type="array", length=255)
     */
    private $validate;
    
    /**
     * @ORM\ManyToOne(targetEntity="M2L\UserBundle\Entity\User", inversedBy="frais", cascade={"persist"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;
    
    public function __construct()
    {
        $this->createdAt = new \Datetime();
        
        $this->validate = 'En attente';
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
     * Set trajet
     *
     * @param string $trajet
     * @return Frais
     */
    public function setTrajet($trajet)
    {
        $this->trajet = $trajet;

        return $this;
    }

    /**
     * Get trajet
     *
     * @return string 
     */
    public function getTrajet()
    {
        return $this->trajet;
    }
    
    /**
     * Set motif
     *
     * @param string $motif
     * @return Frais
     */
    public function setMotif($motif)
    {
        $this->motif = $motif;

        return $this;
    }

    /**
     * Get motif
     *
     * @return string 
     */
    public function getMotif()
    {
        return $this->motif;
    }

    /**
     * Set km
     *
     * @param integer $km
     * @return Frais
     */
    public function setKm($km)
    {
        $this->km = $km;

        return $this;
    }

    /**
     * Get km
     *
     * @return integer 
     */
    public function getKm()
    {
        return $this->km;
    }
    
    /**
     * Set cout
     *
     * @param float $cout
     * @return Frais
     */
    public function setCout($cout)
    {
        $this->cout = $cout;

        return $this;
    }

    /**
     * Get cout
     *
     * @return float 
     */
    public function getCout()
    {
        return $this->cout;
    }

    /**
     * Set peage
     *
     * @param float $peage
     * @return Frais
     */
    public function setPeage($peage)
    {
        $this->peage = $peage;

        return $this;
    }

    /**
     * Get peage
     *
     * @return float 
     */
    public function getPeage()
    {
        return $this->peage;
    }

    /**
     * Set repas
     *
     * @param float $repas
     * @return Frais
     */
    public function setRepas($repas)
    {
        $this->repas = $repas;

        return $this;
    }

    /**
     * Get repas
     *
     * @return float 
     */
    public function getRepas()
    {
        return $this->repas;
    }

    /**
     * Set heberg
     *
     * @param float $heberg
     * @return Frais
     */
    public function setHeberg($heberg)
    {
        $this->heberg = $heberg;

        return $this;
    }

    /**
     * Get heberg
     *
     * @return float 
     */
    public function getHeberg()
    {
        return $this->heberg;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Frais
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    
    /**
     * Set validate
     *
     * @param array $validate
     * @return Frais
     */
    public function setValidate($validate)
    {
        $this->validate = $validate;

        return $this;
    }

    /**
     * Get validate
     *
     * @return array 
     */
    public function getValidate()
    {
        return $this->validate;
    }

    /**
     * Set user
     *
     * @param \M2L\UserBundle\Entity\User $user
     * @return Frais
     */
    public function setUser(\M2L\UserBundle\Entity\User $user)
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
