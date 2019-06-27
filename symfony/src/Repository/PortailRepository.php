<?php

namespace App\Repository;

use App\Entity\Portail;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Portail|null find($id, $lockMode = null, $lockVersion = null)
 * @method Portail|null findOneBy(array $criteria, array $orderBy = null)
 * @method Portail[]    findAll()
 * @method Portail[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PortailRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Portail::class);
    }

    // /**
    //  * @return Portail[] Returns an array of Portail objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Portail
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
