<?php

namespace App\Repository;

use App\Entity\RobotB;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RobotB|null find($id, $lockMode = null, $lockVersion = null)
 * @method RobotB|null findOneBy(array $criteria, array $orderBy = null)
 * @method RobotB[]    findAll()
 * @method RobotB[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RobotBRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RobotB::class);
    }

    // /**
    //  * @return RobotB[] Returns an array of RobotB objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RobotB
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
