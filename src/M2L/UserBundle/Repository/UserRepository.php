<?php

namespace M2L\UserBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * UserRepository
 *
 * Elle permet de récupérer les informations de notre entité Frais en DQL (Doctrine Query Language)
 * Cette classe enregistre notre reqête doctrine en Ajax pour l'entité Frais
 */
class UserRepository extends EntityRepository
{
    public function search($data, $page = 0, $max = NULL, $getResult = true) 
    { 
        $qb = $this->_em->createQueryBuilder(); 
        $query = isset($data['query']) && $data['query']?$data['query']:null; 
 
        $qb 
            ->select('u') 
            ->from('M2LUserBundle:User', 'u') 
        ; 
 
        if ($query) { 
            $qb 
                ->andWhere('u.username like :query') 
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
