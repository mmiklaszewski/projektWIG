<?php

namespace PageBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class ContactRepository extends EntityRepository
{

    public function getContactBy($name, $surname, $group, $province, $city, $street, $home_number, $postal_code, $email, $phone)
    {

        $query = "SELECT c FROM PageBundle:Contact c ";
        $i = 0;
        if ($name != null) {
            if ($i == 0) {
                $query .= "WHERE";
                $i++;
            }
            $query .= "(c.contact_name LIKE :name)";
        }

        if ($surname != null) {
            if ($i == 0) {
                $query .= "WHERE";
                $i++;
            } else {
                $query .= "AND";
            }
            $query .= "(c.contact_surname LIKE :surname)";
        }

        if ($group != null) {
            if ($i == 0) {
                $query .= "WHERE";
                $i++;
            } else {
                $query .= "AND";
            }
            //$query .= "(c.group_id =". $group.")";
            $query .= "(c.group_id = :group)";
        }


        if ($province != null) {
            if ($i == 0) {
                $query .= "WHERE";
                $i++;
            } else {
                $query .= "AND";
            }
            $query .= "(c.contact_province LIKE :province)";
        }


        if ($city != null) {
            if ($i == 0) {
                $query .= "WHERE";
                $i++;
            } else {
                $query .= "AND";
            }
            $query .= "(c.contact_city LIKE :city)";
        }

        if ($street != null) {
            if ($i == 0) {
                $query .= "WHERE";
                $i++;
            } else {
                $query .= "AND";
            }
            $query .= "(c.contact_street LIKE :street)";
        }

        if ($home_number != null) {
            if ($i == 0) {
                $query .= "WHERE";
                $i++;
            } else {
                $query .= "AND";
            }
            $query .= "(c.contact_home_number LIKE :home_number)";
        }

        if ($postal_code != null) {
            if ($i == 0) {
                $query .= "WHERE";
                $i++;
            } else {
                $query .= "AND";
            }
            $query .= "(c.contact_postal_code LIKE :postal_code)";
        }

        if ($email != null) {
            if ($i == 0) {
                $query .= "WHERE";
                $i++;
            } else {
                $query .= "AND";
            }
            $query .= "(c.contact_email LIKE :email)";
        }
        if ($phone != null) {
            if ($i == 0) {
                $query .= "WHERE";
                $i++;
            } else {
                $query .= "AND";
            }
            $query .= "(c.contact_phone LIKE :phone)";
        }

        if ($i == 0) {
            $query .= "WHERE (c.contact_archive = :noArchive)";
        } else {
            $query .= "AND (c.contact_archive = :noArchive)";
        }


        $qb = $this->getEntityManager()
            ->createQuery($query);

        if ($name != null) {
            $qb->setParameter("name", "%".$name."%");
        }
        if ($surname != null){
            $qb->setParameter("surname", "%".$surname."%");
        }
        if ($group != null){
            $qb->setParameter("group", $group);
        }
        if ($province != null){
            $qb->setParameter("province", "%".$province."%");
        }
        if ($city != null){
            $qb->setParameter("city", "%".$city."%");
        }
        if ($street != null){
            $qb->setParameter("street", "%".$street."%");
        }
        if ($home_number != null){
            $qb->setParameter("home_number", "%".$home_number."%");
        }
        if ($postal_code != null){
            $qb->setParameter("postal_code", "%".$postal_code."%");
        }
        if ($email != null){
            $qb->setParameter("email", "%".$email."%");
        }
        if ($phone != null){
            $qb->setParameter("phone", "%".$phone."%");
        }
        $qb->setParameter("noArchive", 0);


//            ->setParameter("name", "%".$n."%")->setParameter("surname", "%".$s."%")
//            ->getResult();

        return $qb->getResult();
    }



}