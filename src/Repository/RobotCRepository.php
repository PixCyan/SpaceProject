<?php

namespace App\Repository;

use App\Entity\RobotC;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RobotC|null find($id, $lockMode = null, $lockVersion = null)
 * @method RobotC|null findOneBy(array $criteria, array $orderBy = null)
 * @method RobotC[]    findAll()
 * @method RobotC[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RobotCRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RobotC::class);
    }

    // /**
    //  * @return RobotC[] Returns an array of RobotC objects
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
    public function findOneBySomeField($value): ?RobotC
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
