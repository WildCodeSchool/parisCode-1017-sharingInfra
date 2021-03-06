<?php

namespace AppBundle\Repository;

/**
 * ReservationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ReservationRepository extends \Doctrine\ORM\EntityRepository
{
    public function findByOnlyDate($date, $advert){
        $qb = $this->createQueryBuilder('r');
        $qb->select('r')
            ->where('r.date BETWEEN :am AND :pm')
            ->join('r.advert', 'a')
            ->andWhere('a.id = :advert')
            ->setParameters(array(
                ':am' => $date->format('Y-m-d' . ' 00:00:00'),
                ':pm' => $date->format('Y-m-d' . ' 23:59:59'),
                ':advert' => $advert
            ));
        return $qb->getQuery()->getResult();
    }
}
