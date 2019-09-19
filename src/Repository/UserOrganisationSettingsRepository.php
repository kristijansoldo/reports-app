<?php

namespace App\Repository;

use App\Entity\UserOrganisationSettings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UserOrganisationSettings|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserOrganisationSettings|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserOrganisationSettings[]    findAll()
 * @method UserOrganisationSettings[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserOrganisationSettingsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UserOrganisationSettings::class);
    }

    // /**
    //  * @return UserOrganisationSettings[] Returns an array of UserOrganisationSettings objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserOrganisationSettings
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
