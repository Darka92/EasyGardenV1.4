<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BassinRepository")
 */
class Bassin
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private $bassinId;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $nom;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Jardin")
     * @ORM\JoinColumn(name="jardin", referencedColumnName="jardin_id", nullable=false)
     */
    private $jardin;



    public function getBassinId(): ?int
    {
        return $this->bassinId;
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

    public function getJardin(): ?Jardin
    {
        return $this->jardin;
    }

    public function setJardin(Jardin $jardin): self
    {
        $this->jardin = $jardin;

        return $this;
    }
}
