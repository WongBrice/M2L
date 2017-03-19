<?php

namespace M2L\PagesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Frais
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
     * @var int
     *
     * @ORM\Column(name="km", type="integer")
     */
    private $km;

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
    
    public function __construct()
    {
    $this->createdAt = new \Datetime();
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
}
