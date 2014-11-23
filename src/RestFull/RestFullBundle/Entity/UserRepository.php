<?php

namespace RestFull\RestFullBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends EntityRepository
{

    public function getNumberOfUser() {

        $qb = $this->createQueryBuilder('c');
        $qb->select('COUNT(c)');
        die($qb->getQuery()->getSingleResult());
        return $qb->getQuery()->getSingleResult();
    }

    public function getLastUserId()
    {
        $qb = $this->createQueryBuilder('u');
        $qb->select('max(u.id)');
        
        return $qb->getQuery()->getSingleResult();
    }
    
    public function getUserByAttrib($aUserData) 
    {
        $attrib = "lastname";
        $qb = $this->createQueryBuilder('u');
        
        foreach ($aUserData as $sKey => $sUserAttrib)
        {
            if ("password" != $sKey) 
            {
                $qb->andWhere("u.".$sKey." = :attrib");
                $qb->setParameter("attrib", $sUserAttrib);
            }
            
        }
        
        //var_dump("<PRE>",$qb->getQuery()->getResult());die;
        
        /*
        $qb->andWhere("u.".$attrib." = :attrib");
        $qb->setParameter("attrib", "tutu");
                */
                
                
        
        
        
        return $qb->getQuery()->getSingleResult();
    }

    
}
