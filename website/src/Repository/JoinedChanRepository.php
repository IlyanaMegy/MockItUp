<?php

namespace App\Repository;

use App\Entity\JoinedChan;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method JoinedChan|null find($id, $lockMode = null, $lockVersion = null)
 * @method JoinedChan|null findOneBy(array $criteria, array $orderBy = null)
 * @method JoinedChan[]    findAll()
 * @method JoinedChan[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JoinedChanRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JoinedChan::class);
    }

    // /**
    //  * @return JoinedChan[] Returns an array of JoinedChan objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?JoinedChan
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
