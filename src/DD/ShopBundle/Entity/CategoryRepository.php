<?php

namespace DD\ShopBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * CategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoryRepository extends EntityRepository
{
    public function getHighCategory($level , $resource)
    {
        $query = $this->getEntityManager()
            ->createQuery("SELECT c FROM DDShopBundle:Category
            c WHERE c.resource = :resource AND c.level < :level ORDER BY c.level ASC ")
            ->setParameters(array('level'=>$level, 'resource'=>$resource));


        return $query->getResult();
    }

    public function getLowCategory($level , $resource)
    {
        $query = $this->getEntityManager()
            ->createQuery("SELECT c FROM DDShopBundle:Category
            c WHERE c.resource = :resource AND c.level > :level ORDER BY c.level DESC")
            ->setParameters(array('level'=>$level, 'resource'=>$resource));

        return $query->getResult();
    }
    public function getAscCategory($resource)
    {
        $query = $this->getEntityManager()
            ->createQuery("SELECT c FROM DDShopBundle:Category
            c WHERE c.resource = :resource ORDER BY c.level ASC ")
            ->setParameters(array('resource'=>$resource));


        return $query->getResult();
    }
}
