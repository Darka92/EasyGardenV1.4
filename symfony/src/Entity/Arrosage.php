<?php
namespace App\Entity;

/* Doctrine */
use Doctrine\ORM\Mapping as ORM;



/**
 * @ORM\Entity(repositoryClass="App\Repository\ArrosageRepository")
 */
class Arrosage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private $arrosageId;

    /**
     * @ORM\Column(name="nom", type="string", length=45)
     */
    private $nom;

    /**
     * @ORM\Column(name="localisation", type="string", length=45)
     */
    private $localisation;

    /**
     * @ORM\Column(name="capteur_debit", type="float")
     */
    private $capteurDebit;

    /**
     * @ORM\Column(name="capteur_pression", type="float")
     */
    private $capteurPression;

    /**
     * @ORM\Column(name="statut", type="boolean")
     */
    private $statut;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Jardin", inversedBy="")
     * @ORM\JoinColumn(name="jardin", referencedColumnName="jardin_id", nullable=true)
     */
    private $jardin;



    public function getArrosageId(): ?int
    {
        return $this->arrosageId;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getCapteurDebit(): ?float
    {
        return $this->capteurDebit;
    }

    public function setCapteurDebit(float $capteurDebit): self
    {
        $this->capteurDebit = $capteurDebit;

        return $this;
    }

    public function getCapteurPression(): ?float
    {
        return $this->capteurPression;
    }

    public function setCapteurPression(float $capteurPression): self
    {
        $this->capteurPression = $capteurPression;

        return $this;
    }

    public function getStatut(): ?bool
    {
        return $this->statut;
    }

    public function setStatut(bool $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getJardin(): ?Jardin
    {
        return $this->jardin;
    }

    public function setJardin(?Jardin $jardin): self
    {
        $this->jardin = $jardin;

        return $this;
    }
}
