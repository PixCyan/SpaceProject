<?php

namespace App\Repository;

use App\Entity\RobotA;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RobotA|null find($id, $lockMode = null, $lockVersion = null)
 * @method RobotA|null findOneBy(array $criteria, array $orderBy = null)
 * @method RobotA[]    findAll()
 * @method RobotA[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RobotARepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RobotA::class);
    }

    // /**
    //  * @return RobotA[] Returns an array of RobotA objects
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
    public function findOneBySomeField($value): ?RobotA
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
