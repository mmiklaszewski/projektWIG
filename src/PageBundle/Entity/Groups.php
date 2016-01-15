<?php
/**
 * Created by PhpStorm.
 * User: mmiklaszewski
 * Date: 2015-12-16
 * Time: 19:30
 */

namespace PageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 * @ORM\Table(name="groups")
 */
class Groups
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $group_id;

    /**
     * @ORM\Column(type="text")
     */
    private $group_name;

    /**
     * @ORM\OneToMany(targetEntity="Contact", mappedBy="group_id")
     */
    private $contacts;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user_id;

    /**
     * @ORM\Column(type="string", length=1, nullable=true)
     */
    protected $group_archive;


    /**
     * @return mixed
     */
    public function getGroupId()
    {
        return $this->group_id;
    }

    /**
     * @param mixed $group_id
     * @return Groups
     */
    public function setGroupId($group_id)
    {
        $this->group_id = $group_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGroupName()
    {
        return $this->group_name;
    }

    /**
     * @param mixed $group_name
     * @return Groups
     */
    public function setGroupName($group_name)
    {
        $this->group_name = $group_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * @param mixed $contacts
     * @return Groups
     */
    public function setContacts($contacts)
    {
        $this->contacts = $contacts;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     * @return Groups
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGroupArchive()
    {
        return $this->group_archive;
    }

    /**
     * @param mixed $group_archive
     * @return Groups
     */
    public function setGroupArchive($group_archive)
    {
        $this->group_archive = $group_archive;
        return $this;
    }






    public function __construct() {
        $this->contact = new ArrayCollection();
    }

    public function __toString()
    {
        return "{$this->getGroupName()}";
    }




}