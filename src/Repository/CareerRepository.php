<?php

namespace App\Repository;

use App\Entity\Career;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Career|null find($id, $lockMode = null, $lockVersion = null)
 * @method Career|null findOneBy(array $criteria, array $orderBy = null)
 * @method Career[]    findAll()
 * @method Career[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CareerRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Career::class);
    }

    // /**
    //  * @return Career[] Returns an array of Career objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Career
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
