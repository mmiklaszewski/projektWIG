<?php
namespace UserBundle\Entity;


use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $question;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $answer;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $pass;

    /**
     * @return mixed
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param mixed $question
     * @return User
     */
    public function setQuestion($question)
    {
        $this->question = $question;
        return $this;
    }



    /**
     * @return mixed
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * @param mixed $answer
     * @return User
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param mixed $pass
     * @return User
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
        return $this;
    }



//    /**
//     * @ORM\OneToMany(targetEntity="PageBundle\Entity\Contact", mappedBy="user_id)
//     */
//    protected $contacts;
//
//    /**
//     * @return mixed
//     */
//    public function getContacts()
//    {
//        return $this->contacts;
//    }
//
//    /**
//     * @param mixed $contacts
//     * @return User
//     */
//    public function setContacts($contacts)
//    {
//        $this->contacts = $contacts;
//        return $this;
//    }




}