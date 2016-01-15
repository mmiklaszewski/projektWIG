<?php

namespace PageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="contact")
 * @ORM\Entity(repositoryClass="PageBundle\Entity\Repository\ContactRepository")
 */
class Contact
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $contact_id;

    /**
     * @ORM\ManyToOne(targetEntity="Groups", inversedBy="contacts")
     * @ORM\JoinColumn(name="group_id", referencedColumnName="group_id")
     */
    protected $group_id;

    /**
     * @ORM\Column(type="text")
     */
    protected $contact_name;

    /**
     * @ORM\Column(type="text")
     */
    protected $contact_surname;

    /**
     * @ORM\Column(type="text")
     */
    protected $contact_city;

    /**
     * @ORM\Column(type="text")
     */
    protected $contact_street;

    /**
     * @ORM\Column(type="text")
     */
    protected $contact_home_number;

    /**
     * @ORM\Column(type="text")
     */
    protected $contact_postal_code;

    /**
     * @ORM\Column(type="text")
     */
    protected $contact_email;

    /**
     * @ORM\Column(type="text")
     */
    protected $contact_phone;

    /**
     * @ORM\Column(type="text")
     */
    protected $contact_province;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user_id;

    /**
     * @ORM\Column(type="string", length=1, nullable=true)
     */
    protected $contact_archive;

    /**
     * @return mixed
     */
    public function getContactId()
    {
        return $this->contact_id;
    }

    /**
     * @param mixed $contact_id
     * @return Contact
     */
    public function setContactId($contact_id)
    {
        $this->contact_id = $contact_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGroupId()
    {
        return $this->group_id;
    }

    /**
     * @param mixed $group_id
     * @return Contact
     */
    public function setGroupId($group_id)
    {
        $this->group_id = $group_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContactName()
    {
        return $this->contact_name;
    }

    /**
     * @param mixed $contact_name
     * @return Contact
     */
    public function setContactName($contact_name)
    {
        $this->contact_name = $contact_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContactSurname()
    {
        return $this->contact_surname;
    }

    /**
     * @param mixed $contact_surname
     * @return Contact
     */
    public function setContactSurname($contact_surname)
    {
        $this->contact_surname = $contact_surname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContactCity()
    {
        return $this->contact_city;
    }

    /**
     * @param mixed $contact_city
     * @return Contact
     */
    public function setContactCity($contact_city)
    {
        $this->contact_city = $contact_city;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContactStreet()
    {
        return $this->contact_street;
    }

    /**
     * @param mixed $contact_street
     * @return Contact
     */
    public function setContactStreet($contact_street)
    {
        $this->contact_street = $contact_street;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContactHomeNumber()
    {
        return $this->contact_home_number;
    }

    /**
     * @param mixed $contact_home_number
     * @return Contact
     */
    public function setContactHomeNumber($contact_home_number)
    {
        $this->contact_home_number = $contact_home_number;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContactPostalCode()
    {
        return $this->contact_postal_code;
    }

    /**
     * @param mixed $contact_postal_code
     * @return Contact
     */
    public function setContactPostalCode($contact_postal_code)
    {
        $this->contact_postal_code = $contact_postal_code;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContactEmail()
    {
        return $this->contact_email;
    }

    /**
     * @param mixed $contact_email
     * @return Contact
     */
    public function setContactEmail($contact_email)
    {
        $this->contact_email = $contact_email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContactPhone()
    {
        return $this->contact_phone;
    }

    /**
     * @param mixed $contact_phone
     * @return Contact
     */
    public function setContactPhone($contact_phone)
    {
        $this->contact_phone = $contact_phone;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContactProvince()
    {
        return $this->contact_province;
    }

    /**
     * @param mixed $contact_province
     * @return Contact
     */
    public function setContactProvince($contact_province)
    {
        $this->contact_province = $contact_province;
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
     * @return Contact
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContactArchive()
    {
        return $this->contact_archive;
    }

    /**
     * @param mixed $contact_archive
     * @return Contact
     */
    public function setContactArchive($contact_archive)
    {
        $this->contact_archive = $contact_archive;
        return $this;
    }






}