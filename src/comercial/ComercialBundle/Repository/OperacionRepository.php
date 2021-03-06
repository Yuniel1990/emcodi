<?php

namespace comercial\ComercialBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * OperacionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class OperacionRepository extends EntityRepository
{
    public function findVentaDiarias(\DateTime $date = null)
    {
        
    }

    public function findCostoDiario(\DateTime $date = null)
    {
        if ($date == null)$date = new \DateTime('now');
        $query = $this->_em->createQuery('SELECT SUM(c.total-(c.costoMN+c.costoCUC)) as utilBruta FROM ComercialBundle:Operacion c WHERE c.fecha = :Fecha')
            ->setParameter('Fecha', $date->format('y-m-d'));

        return $query->getResult();
    }
}
