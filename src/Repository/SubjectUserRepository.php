<?php

namespace App\Repository;

use App\Entity\SubjectUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SubjectUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method SubjectUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method SubjectUser[]    findAll()
 * @method SubjectUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubjectUserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SubjectUser::class);
    }

    // /**
    //  * @return SubjectUser[] Returns an array of SubjectUser objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SubjectUser
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
