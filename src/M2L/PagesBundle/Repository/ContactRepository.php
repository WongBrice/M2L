<?php

namespace M2L\PagesBundle\Repository;

/**
 * ContactRepository
 *
 * Elle permet de récupérer les informations de notre entité Contact en DQL (Doctrine Query Language).
 */
class ContactRepository extends \Doctrine\ORM\EntityRepository
{
    public function search($data, $page = 0, $max = NULL, $getResult = true) 
    { 
        $qb = $this->_em->createQueryBuilder(); 
        $query = isset($data['query']) && $data['query']?$data['query']:null; 
 
        $qb 
            ->select('c') 
            ->from('M2LPagesBundle:Contact', 'c') 
        ; 
 
        if ($query) { 
            $qb 
                ->andWhere('c.name like :query') 
                ->setParameter('query', "%".$query."%") 
            ; 
        } 
 
        if ($max) { 
            $preparedQuery = $qb->getQuery() 
                ->setMaxResults($max) 
                ->setFirstResult($page * $max) 
            ; 
        } else { 
            $preparedQuery = $qb->getQuery(); 
        } 
 
        return $getResult?$preparedQuery->getResult():$preparedQuery; 
    }
}
