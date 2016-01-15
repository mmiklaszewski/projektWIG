<?php

namespace PageBundle\Entity\Repository;
use Doctrine\ORM\EntityRepository;

class TestRepository extends EntityRepository
{

    public function getTestByName($name, $surname, $city)
    {

        $query = "SELECT m FROM PageBundle:Test m ";
        $i = 0;
        if ($name != null) {
            if ($i == 0) {
                $query .= "WHERE";
                $i++;
            }
            $query .= "(m.test_name LIKE :name)";
        }

        if ($surname != null) {
            if ($i == 0) {
                $query .= "WHERE";
                $i++;
            } else {
                $query .= "AND";
            }
            $query .= "(m.test_surname LIKE :surname)";
        }

        if ($city != null) {
            if ($i == 0) {
                $query .= "WHERE";
                $i++;
            } else {
                $query .= "AND";
            }
            $query .= "(m.test_city LIKE :city)";
        }

         $qb = $this->getEntityManager()
            ->createQuery($query);

        if ($name != null) {
            $qb->setParameter("name", "%".$name."%");
        }
        if ($surname != null){
            $qb->setParameter("surname", "%".$surname."%");
        }
        if ($city != null){
            $qb->setParameter("city", "%".$city."%");
        }

//            ->setParameter("name", "%".$n."%")->setParameter("surname", "%".$s."%")
//            ->getResult();

        return $qb->getResult();
    }



}