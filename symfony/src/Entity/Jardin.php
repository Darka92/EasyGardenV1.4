<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JardinRepository")
 */
class Jardin
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private $jardinId;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="jardins")
     * @ORM\JoinColumn(name="user", referencedColumnName="id", nullable=false)
     */
    private $user;


    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Bassin")
     * @ORM\JoinColumn(name="bassin", referencedColumnName="bassin_id", nullable=true)
     */
    private $bassin;



    public function getJardinId(): ?int
    {
        return $this->jardinId;
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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBassin()
    {
        return $this->bassin;
    }

    /**
     * @param mixed $bassin
     */
    public function setBassin($bassin): void
    {
        $this->bassin = $bassin;
    }







}
