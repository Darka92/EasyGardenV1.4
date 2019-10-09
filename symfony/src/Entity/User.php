<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="`user`")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */

class User extends BaseUser
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(name="create_time", type="datetime")
     */
    private $createTime;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Jardin", mappedBy="user")
     */
    private $jardins;


    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->createTime = new \DateTime();
        $this->jardins = new ArrayCollection();
    }

    public function getCreateTime()
    {
        return $this->createTime;
    }

    public function setCreateTime($createTime)
    {
        $this->createTime = $createTime;

        return $this;
    }

    /**
     * @return Collection|Jardin[]
     */
    public function getJardins(): Collection
    {
        return $this->jardins;
    }

    public function addJardin(Jardin $jardin): self
    {
        if (!$this->jardins->contains($jardin)) {
            $this->jardins[] = $jardin;
            $jardin->setUser($this);
        }

        return $this;
    }

    public function removeJardin(Jardin $jardin): self
    {
        if ($this->jardins->contains($jardin)) {
            $this->jardins->removeElement($jardin);
            // set the owning side to null (unless already changed)
            if ($jardin->getUser() === $this) {
                $jardin->setUser(null);
            }
        }

        return $this;
    }

}
