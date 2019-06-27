<?php

namespace App\Repository;

use App\Entity\Tondeuse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Tondeuse|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tondeuse|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tondeuse[]    findAll()
 * @method Tondeuse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TondeuseRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Tondeuse::class);
    }

    // /**
    //  * @return Tondeuse[] Returns an array of Tondeuse objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Tondeuse
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
