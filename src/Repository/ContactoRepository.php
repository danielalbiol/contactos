<?php

namespace App\Repository;

use App\Entity\Contacto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Contacto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contacto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contacto[]    findAll()
 * @method Contacto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Contacto::class);
    }

    public function findByName($text): array
    {
        $qb = $this->createQueryBuilder('c')
            ->andWhere('c.nombre LIKE :text')
            ->setParameter('text', '%' . $text . '%')
            ->getQuery();
        return $qb->execute();
    }

    // /**
    //  * @return Contacto[] Returns an array of Contacto objects
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
public function findOneBySomeField($value): ?Contacto
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
