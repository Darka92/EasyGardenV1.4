<?php

namespace App\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="`user`")
 */

class User extends BaseUser
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createTime;


    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->createTime = new \DateTime();
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

}
