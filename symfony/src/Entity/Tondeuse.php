<?php
namespace App\Entity;

/* Doctrine */
use Doctrine\ORM\Mapping as ORM;



/**
 * @ORM\Entity(repositoryClass="App\Repository\TondeuseRepository")
 */
class Tondeuse
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private $tondeuseId;

    /**
     * @ORM\Column(name="nom", type="string", length=45)
     */
    private $nom;

    /**
     * @ORM\Column(name="capteur_batterie", type="integer")
     */
    private $capteurBatterie;

    /**
     * @ORM\Column(name="statut", type="boolean")
     */
    private $statut;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Jardin", inversedBy="")
     * @ORM\JoinColumn(name="jardin", referencedColumnName="jardin_id", nullable=true)
     */
    private $jardin;



    public function getTondeuseId(): ?int
    {
        return $this->tondeuseId;
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

    public function getCapteurBatterie(): ?int
    {
        return $this->capteurBatterie;
    }

    public function setCapteurBatterie(int $capteurBatterie): self
    {
        $this->capteurBatterie = $capteurBatterie;

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
