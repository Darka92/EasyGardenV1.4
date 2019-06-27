<?php

namespace App\Repository;

use App\Entity\Eclairage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Eclairage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Eclairage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Eclairage[]    findAll()
 * @method Eclairage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EclairageRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Eclairage::class);
    }

    // /**
    //  * @return Eclairage[] Returns an array of Eclairage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Eclairage
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
