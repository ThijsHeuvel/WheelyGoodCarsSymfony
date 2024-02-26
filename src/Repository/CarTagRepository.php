<?php

namespace App\Repository;

use App\Entity\CarTag;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CarTag>
 *
 * @method CarTag|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarTag|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarTag[]    findAll()
 * @method CarTag[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarTagRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarTag::class);
    }

//    /**
//     * @return CarTag[] Returns an array of CarTag objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CarTag
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
