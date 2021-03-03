<?php

namespace App\Repository;

use App\Entity\Publicatie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Publicatie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Publicatie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Publicatie[]    findAll()
 * @method Publicatie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PublicatieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Publicatie::class);
    }

    // /**
    //  * @return Publicatie[] Returns an array of Publicatie objects
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
    public function findOneBySomeField($value): ?Publicatie
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
