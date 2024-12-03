<?php

namespace App\Repository;

use App\Entity\ArticlesExclusive;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ArticlesExclusive>
 *
 * @method ArticlesExclusive|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArticlesExclusive|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArticlesExclusive[]    findAll()
 * @method ArticlesExclusive[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticlesExclusiveRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArticlesExclusive::class);
    }

//    /**
//     * @return ArticlesExclusive[] Returns an array of ArticlesExclusive objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ArticlesExclusive
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
