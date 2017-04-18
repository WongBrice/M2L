<?php

namespace M2L\PagesBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * FraisRepository
 *
 * Elle permet de récupérer les informations de notre entité Frais en DQL (Doctrine Query Language)
 * Cette classe enregistre notre reqête doctrine en Ajax pour l'entité Frais
 */
class FraisRepository extends EntityRepository
{
    public function search($user, $data, $page = 0, $max = NULL, $getResult = true) 
    { 
        $qb = $this->_em->createQueryBuilder(); 
        $query = isset($data['query']) && $data['query']?$data['query']:null; 
 
        $qb 
            ->select('f')
            ->from('M2LPagesBundle:Frais', 'f')
            ->innerJoin('f.user','u')
                ->where('f.id = :user')
                ->setParameter('user', '1')
        ; 
 
        if ($query) { 
            $qb 
                ->andWhere('f.user like :query') 
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
