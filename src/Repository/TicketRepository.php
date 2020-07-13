<?php

namespace App\Repository;

use App\Entity\Ticket;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Ticket|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ticket|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ticket[]    findAll()
 * @method Ticket[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TicketRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ticket::class);
    }

     public function countClients($entreprise)
    {
        return $this->getEntityManager()->createQueryBuilder()
            ->select('count(distinct(u.id))')
            ->from("App:Ticket", 't')
            ->innerJoin("t.user", "u")
            ->andWhere("t.entreprise = :entreprise")
            ->setParameter("entreprise", $entreprise)
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function numServi($entreprise) {
        return $this->getEntityManager()->createQueryBuilder()
            ->select('count(t.id)')
            ->from("App:Ticket", 't')
            ->where("t.entreprise = :entreprise")
            ->setParameter("entreprise", $entreprise)
            ->getQuery()
            ->getSingleScalarResult();
    }
}
