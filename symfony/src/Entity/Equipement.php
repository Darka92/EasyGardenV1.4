<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EquipementRepository")
 */
class Equipement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private $equipementId;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $nom;

    /**
     * @ORM\Column(type="boolean")
     */
    private $statut;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Bassin", inversedBy="")
     * @ORM\JoinColumn(name="bassin", referencedColumnName="bassin_id", nullable=false)
     */
    private $bassin;



    public function getEquipementId(): ?int
    {
        return $this->equipementId;
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

    public function getStatut(): ?bool
    {
        return $this->statut;
    }

    public function setStatut(bool $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getBassin(): ?Bassin
    {
        return $this->bassin;
    }

    public function setBassin(?Bassin $bassin): self
    {
        $this->bassin = $bassin;

        return $this;
    }
}
