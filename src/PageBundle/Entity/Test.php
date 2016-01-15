<?php
/**
 * Created by PhpStorm.
 * User: mmiklaszewski
 * Date: 2016-01-08
 * Time: 15:16
 */

namespace PageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="test")
 * @ORM\Entity(repositoryClass="PageBundle\Entity\Repository\TestRepository")
 */

class Test
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $test_id;

    /**
     * @ORM\Column(type="text")
     */
    protected $test_name;

    /**
     * @ORM\Column(type="text")
     */
    protected $test_surname;

    /**
     * @ORM\Column(type="text")
     */
    protected $test_city;

    /**
     * @return mixed
     */
    public function getTestId()
    {
        return $this->test_id;
    }

    /**
     * @param mixed $test_id
     * @return Test
     */
    public function setTestId($test_id)
    {
        $this->test_id = $test_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTestName()
    {
        return $this->test_name;
    }

    /**
     * @param mixed $test_name
     * @return Test
     */
    public function setTestName($test_name)
    {
        $this->test_name = $test_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTestSurname()
    {
        return $this->test_surname;
    }

    /**
     * @param mixed $test_surname
     * @return Test
     */
    public function setTestSurname($test_surname)
    {
        $this->test_surname = $test_surname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTestCity()
    {
        return $this->test_city;
    }

    /**
     * @param mixed $test_city
     * @return Test
     */
    public function setTestCity($test_city)
    {
        $this->test_city = $test_city;
        return $this;
    }




}