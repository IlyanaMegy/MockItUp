<?php

namespace App\Repository;

use App\Entity\OwnedChan;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OwnedChan|null find($id, $lockMode = null, $lockVersion = null)
 * @method OwnedChan|null findOneBy(array $criteria, array $orderBy = null)
 * @method OwnedChan[]    findAll()
 * @method OwnedChan[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OwnedChanRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OwnedChan::class);
    }

    // /**
    //  * @return OwnedChan[] Returns an array of OwnedChan objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OwnedChan
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
