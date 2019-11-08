<?php
declare(strict_types=1);

namespace App\Repository;

use App\Entity\EntityTemplate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EntityTemplate|null find($id, $lockMode = null, $lockVersion = null)
 * @method EntityTemplate|null findOneBy(array $criteria, array $orderBy = null)
 * @method EntityTemplate[]    findAll()
 * @method EntityTemplate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EntityTemplateRepository extends ServiceEntityRepository
{
    /**
     * EntityTemplateRepository constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EntityTemplate::class);
    }

    // /**
    //  * @return EntityTemplate[] Returns an array of EntityTemplate objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EntityTemplate
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
