<?php

namespace App\Repository;

use App\Entity\Bassin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Bassin|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bassin|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bassin[]    findAll()
 * @method Bassin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BassinRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Bassin::class);
    }

    // /**
    //  * @return Bassin[] Returns an array of Bassin objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Bassin
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
