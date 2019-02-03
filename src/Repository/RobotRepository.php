<?php

namespace App\Repository;

use App\Entity\Robot;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Robot|null find($id, $lockMode = null, $lockVersion = null)
 * @method Robot|null findOneBy(array $criteria, array $orderBy = null)
 * @method Robot[]    findAll()
 * @method Robot[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RobotRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Robot::class);
    }

    // /**
    //  * @return Robot[] Returns an array of Robot objects
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
    public function findOneBySomeField($value): ?Robot
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
