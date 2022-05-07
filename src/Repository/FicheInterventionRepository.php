<?php

namespace App\Repository;

use App\Entity\FicheIntervention;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FicheIntervention>
 *
 * @method FicheIntervention|null find($id, $lockMode = null, $lockVersion = null)
 * @method FicheIntervention|null findOneBy(array $criteria, array $orderBy = null)
 * @method FicheIntervention[]    findAll()
 * @method FicheIntervention[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FicheInterventionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FicheIntervention::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(FicheIntervention $entity, bool $flush = false): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(FicheIntervention $entity, bool $flush = false): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

//    /**
//     * @return FicheIntervention[] Returns an array of FicheIntervention objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?FicheIntervention
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
