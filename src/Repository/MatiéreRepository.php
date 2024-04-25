<?php

namespace App\Repository;

use App\Entity\Matiére;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Matiére>
 *
 * @method Matiére|null find($id, $lockMode = null, $lockVersion = null)
 * @method Matiére|null findOneBy(array $criteria, array $orderBy = null)
 * @method Matiére[]    findAll()
 * @method Matiére[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MatiéreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Matiére::class);
    }

//    /**
//     * @return Matiére[] Returns an array of Matiére objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Matiére
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
