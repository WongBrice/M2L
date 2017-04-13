<?php

namespace M2L\PagesBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * FraisRepository
 *
 * Cette classe enregistre notre reqête doctrine en Ajax pour l'entité Frais
 * Elle permet également de récupérer les informations de notre entité Frais en DQL (Doctrine Query Language)
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
            ->where('f.user = :user')
                    ->setParameter('user', '2')
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
